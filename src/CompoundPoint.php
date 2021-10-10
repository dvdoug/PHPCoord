<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\CoordinateOperation\AutoConversion;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateOperation\GeographicGeoidHeightGrid;
use PHPCoord\CoordinateOperation\OSTNOSGM15Grid;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
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
        return new static($crs, $horizontalPoint, $verticalPoint, $epoch);
    }

    public function getHorizontalPoint(): Point
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

    public function convert(CoordinateReferenceSystem $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        try {
            return $this->autoConvert($to, $ignoreBoundaryRestrictions);
        } catch (UnknownConversionException $e) {
            if ($this->getHorizontalPoint() instanceof ConvertiblePoint) {
                // if 2D target, try again with just the horizontal component
                if (($to instanceof Geographic2D || $to instanceof Projected)) {
                    return $this->getHorizontalPoint()->convert($to, $ignoreBoundaryRestrictions);
                }

                // try separate horizontal + vertical conversions and stitch results together
                if ($to instanceof Compound) {
                    $newHorizontalPoint = $this->getHorizontalPoint()->convert($to->getHorizontal());

                    if ($this->getCRS()->getVertical()->getSRID() !== $to->getVertical()->getSRID()) {
                        $path = $this->findOperationPath($this->getCRS()->getVertical(), $to->getVertical(), $ignoreBoundaryRestrictions);

                        if ($path) {
                            $newVerticalPoint = $this->getVerticalPoint();
                            foreach ($path as $step) {
                                $target = CoordinateReferenceSystem::fromSRID($step['in_reverse'] ? $step['source_crs'] : $step['target_crs']);
                                $newVerticalPoint = $newVerticalPoint->performOperation($step['operation'], $target, $step['in_reverse'], ['horizontalPoint' => $newHorizontalPoint]);
                            }

                            return static::create($to, $newHorizontalPoint, $newVerticalPoint, $this->epoch);
                        }
                    }
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
        $toLatitude = $this->getHorizontalPoint()->getLatitude()->add($latitudeOffset);
        $toLongitude = $this->getHorizontalPoint()->getLongitude()->add($longitudeOffset);
        $toHeight = $this->getVerticalPoint()->getHeight()->add($geoidUndulation);

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
        return GeographicPoint::create(
            $to,
            $this->horizontalPoint->getLatitude(),
            $this->horizontalPoint->getLongitude(),
            $this->verticalPoint->getHeight()->add($geoidHeightCorrectionModelFile->getHeightAdjustment($this->horizontalPoint)),
            $this->getCoordinateEpoch()
        );
    }
}
