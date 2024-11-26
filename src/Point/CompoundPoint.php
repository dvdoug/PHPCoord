<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\CoordinateOperation\AutoConversion;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateOperation\GeographicGeoidHeightGrid;
use PHPCoord\CoordinateOperation\OSTNOSGM15Grid;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use Throwable;

use function assert;

/**
 * Coordinate representing a point expressed in 2 different CRSs (2D horizontal + 1D Vertical).
 */
class CompoundPoint extends Point implements ConvertiblePoint
{
    use AutoConversion {
        convert as protected autoConvert;
    }

    /**
     * Horizontal point.
     */
    protected GeographicPoint|ProjectedPoint $horizontalPoint;

    /**
     * Vertical point.
     */
    protected VerticalPoint $verticalPoint;

    /**
     * Coordinate reference system.
     */
    protected Compound $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected ?DateTimeImmutable $epoch;

    protected function __construct(Compound $crs, GeographicPoint|ProjectedPoint $horizontalPoint, VerticalPoint $verticalPoint, ?DateTimeInterface $epoch = null)
    {
        $this->horizontalPoint = $horizontalPoint;
        $this->verticalPoint = $verticalPoint;
        $this->crs = $crs;

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;
    }

    public static function create(Compound $crs, GeographicPoint|ProjectedPoint $horizontalPoint, VerticalPoint $verticalPoint, ?DateTimeInterface $epoch = null): self
    {
        return new self($crs, $horizontalPoint, $verticalPoint, $epoch);
    }

    public function getHorizontalPoint(): GeographicPoint|ProjectedPoint
    {
        return $this->horizontalPoint;
    }

    public function getVerticalPoint(): VerticalPoint
    {
        return $this->verticalPoint;
    }

    public function getCRS(): Compound
    {
        return $this->crs;
    }

    public function getCoordinateEpoch(): ?DateTimeImmutable
    {
        return $this->epoch;
    }

    /**
     * Calculate distance between two points.
     */
    public function calculateDistance(Point $to): Length
    {
        try {
            if ($to instanceof ConvertiblePoint) {
                $to = $to->convert($this->horizontalPoint->getCRS());
            }
        } finally {
            if ($to->getCRS()->getSRID() !== $this->horizontalPoint->getCRS()->getSRID()) {
                throw new InvalidCoordinateReferenceSystemException('Can only calculate distances between two points in the same CRS');
            }

            /* @var CompoundPoint $to */
            return $this->horizontalPoint->calculateDistance($to);
        }
    }

    public function convert(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        try {
            return $this->autoConvert($to, $ignoreBoundaryRestrictions);
        } catch (UnknownConversionException $e) {
            // if 2D target, try again with just the horizontal component
            if ($to instanceof Geographic2D || $to instanceof Projected) {
                return $this->horizontalPoint->convert($to, $ignoreBoundaryRestrictions);
            }

            // try separate horizontal + vertical conversions and stitch results together
            if ($to instanceof Compound) {
                /** @var GeographicPoint|ProjectedPoint $newHorizontalPoint */
                $newHorizontalPoint = $this->horizontalPoint->convert($to->getHorizontal());

                if ($this->getCRS()->getVertical()->getSRID() !== $to->getVertical()->getSRID()) {
                    $path = $this->findOperationPath($this->getCRS()->getVertical(), $to->getVertical(), $ignoreBoundaryRestrictions);

                    if ($path) {
                        $newVerticalPoint = $this->verticalPoint;
                        foreach ($path as $step) {
                            $target = CoordinateReferenceSystem::fromSRID($step['in_reverse'] ? $step['source_crs'] : $step['target_crs']);
                            /** @var VerticalPoint $newVerticalPoint */
                            $newVerticalPoint = $newVerticalPoint->performOperation($step['operation'], $target, $step['in_reverse'], ['horizontalPoint' => $newHorizontalPoint]);
                        }

                        return static::create($to, $newHorizontalPoint, $newVerticalPoint, $this->epoch);
                    }
                }
            }
            // try converting to any/all of the other Compound CRSs that include the same vertical CRS, where the
            // horizontal CRS has a 3D equivalent. From there, try converting using the usual mechanisms
            $candidateIntermediates = Compound::findFromVertical($this->verticalPoint->getCRS());
            unset($candidateIntermediates[$this->getCRS()->getSRID()]);

            foreach ($candidateIntermediates as $candidateIntermediate) {
                try {
                    if ($candidateIntermediate->getHorizontal() instanceof Geographic2D && $candidateIntermediate->getHorizontal()->getBaseCRS() instanceof Geographic3D) {
                        /** @var GeographicPoint|ProjectedPoint $candidateHorizontalPoint */
                        $candidateHorizontalPoint = $this->horizontalPoint->convert($candidateIntermediate->getHorizontal());
                        $candidateIntermediatePoint = self::create(
                            $candidateIntermediate,
                            $candidateHorizontalPoint,
                            $this->verticalPoint,
                            $this->epoch,
                        );

                        /** @var GeographicPoint $candidateBaseCRSPoint */
                        $candidateBaseCRSPoint = $candidateIntermediatePoint->convert($candidateIntermediate->getHorizontal()->getBaseCRS());

                        return $candidateBaseCRSPoint->convert($to);
                    }
                } catch (Throwable) {
                }
            }
            throw $e;
        }
    }

    public function __toString(): string
    {
        return "({$this->horizontalPoint}, {$this->verticalPoint})";
    }

    /**
     * Geographic2D with Height Offsets.
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public function geographic2DWithHeightOffsets(
        Geographic3D $to,
        Angle $latitudeOffset,
        Angle $longitudeOffset,
        Length $geoidUndulation
    ): GeographicPoint {
        assert($this->horizontalPoint instanceof GeographicPoint);
        $horizontalPoint = $this->horizontalPoint;
        $toLatitude = $horizontalPoint->getLatitude()->add($latitudeOffset);
        $toLongitude = $horizontalPoint->getLongitude()->add($longitudeOffset);
        $toHeight = $this->verticalPoint->getHeight()->add($geoidUndulation);

        return GeographicPoint::create($to, $toLatitude, $toLongitude, $toHeight, $this->epoch);
    }

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (OSGM-GB).
     * Uses ETRS89 / National Grid as an intermediate coordinate system for bi-linear interpolation of gridded grid
     * coordinate differences.
     */
    public function geographic3DTo2DPlusGravityHeightOSGM15(
        Geographic3D $to,
        OSTNOSGM15Grid $geoidHeightCorrectionModelFile
    ): GeographicPoint {
        assert($this->horizontalPoint instanceof GeographicPoint);
        $osgb36NationalGrid = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
        $etrs89NationalGrid = new Projected(
            'ETRS89 / National Grid',
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            Datum::fromSRID(Datum::EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE),
            $osgb36NationalGrid->getBoundingArea()
        );

        $projected = $this->horizontalPoint->transverseMercator($etrs89NationalGrid, new Degree(49), new Degree(-2), new Unity(0.9996012717), new Metre(400000), new Metre(-100000));

        return GeographicPoint::create(
            $to,
            $this->horizontalPoint->getLatitude(),
            $this->horizontalPoint->getLongitude(),
            $this->verticalPoint->getHeight()->add($geoidHeightCorrectionModelFile->getHeightAdjustment($projected)),
            $this->getCoordinateEpoch()
        );
    }

    /**
     * Geog3D to Geog2D+GravityRelatedHeight.
     */
    public function geographic3DTo2DPlusGravityHeightFromGrid(
        Geographic3D $to,
        GeographicGeoidHeightGrid $geoidHeightCorrectionModelFile
    ): GeographicPoint {
        assert($this->horizontalPoint instanceof GeographicPoint);

        return GeographicPoint::create(
            $to,
            $this->horizontalPoint->getLatitude(),
            $this->horizontalPoint->getLongitude(),
            $this->verticalPoint->getHeight()->add($geoidHeightCorrectionModelFile->getHeightAdjustment($this->horizontalPoint)),
            $this->getCoordinateEpoch()
        );
    }
}
