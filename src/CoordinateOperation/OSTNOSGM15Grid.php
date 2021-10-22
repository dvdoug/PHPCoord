<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function abs;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Datum\Datum;
use PHPCoord\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;
use SplFileObject;

class OSTNOSGM15Grid extends SplFileObject
{
    use BilinearInterpolation;

    private const ITERATION_CONVERGENCE = 0.0001;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $this->startX = 0;
        $this->startY = 0;
        $this->columnGridInterval = 1000;
        $this->rowGridInterval = 1000;
        $this->numberOfColumns = 700;
        $this->numberOfRows = 1250;
    }

    public function applyForwardHorizontalAdjustment(ProjectedPoint $point): ProjectedPoint
    {
        $adjustment = $this->getAdjustment($point->getEasting()->asMetres(), $point->getNorthing()->asMetres());

        $easting = $point->getEasting()->add(new Metre($adjustment[0]));
        $northing = $point->getNorthing()->add(new Metre($adjustment[1]));

        return ProjectedPoint::createFromEastingNorthing($easting, $northing, Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), $point->getCoordinateEpoch());
    }

    public function applyReverseHorizontalAdjustment(ProjectedPoint $point): ProjectedPoint
    {
        $osgb36NationalGrid = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
        $etrs89NationalGrid = new Projected(
            'ETRS89 / National Grid',
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            Datum::fromSRID(Datum::EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE),
            $osgb36NationalGrid->getBoundingArea()
        );

        $adjustment = [0, 0];
        $easting = $point->getEasting();
        $northing = $point->getNorthing();

        do {
            $prevAdjustment = $adjustment;
            $adjustment = $this->getAdjustment($easting->asMetres(), $northing->asMetres());
            $easting = $point->getEasting()->subtract(new Metre($adjustment[0]));
            $northing = $point->getNorthing()->subtract(new Metre($adjustment[1]));
        } while (abs($adjustment[0] - $prevAdjustment[0]) > self::ITERATION_CONVERGENCE && abs($adjustment[1] - $prevAdjustment[1]) > self::ITERATION_CONVERGENCE);

        return ProjectedPoint::createFromEastingNorthing($easting, $northing, $etrs89NationalGrid, $point->getCoordinateEpoch());
    }

    public function getVerticalAdjustment(ProjectedPoint $point): Metre
    {
        $adjustment = $this->getAdjustment($point->getEasting()->asMetres(), $point->getNorthing()->asMetres());

        return new Metre($adjustment[2]);
    }

    private function getAdjustment(Metre $easting, Metre $northing): array
    {
        $offsets = $this->interpolateBilinear($easting->getValue(), $northing->getValue());

        return $offsets;
    }

    private function getRecord(int $eastIndex, int $northIndex): GridValues
    {
        $record = $northIndex * 701 + $eastIndex + 1;

        $this->seek($record);
        $rawData = $this->fgetcsv();

        return new GridValues((float) $rawData[1], (float) $rawData[2], [(float) $rawData[3], (float) $rawData[4], (float) $rawData[5]]);
    }
}
