<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Datum\Datum;
use PHPCoord\Point\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function abs;

class OSTNOSGM15Grid extends Grid
{
    use BilinearInterpolation;

    private const ITERATION_CONVERGENCE = 0.0001;

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);

        $this->startX = 0;
        $this->startY = 0;
        $this->columnGridInterval = 1000;
        $this->rowGridInterval = 1000;
        $this->numberOfColumns = 700;
        $this->numberOfRows = 1250;
    }

    public function applyForwardHorizontalAdjustment(ProjectedPoint $point): ProjectedPoint
    {
        $adjustment = $this->getValues($point->getEasting()->asMetres()->getValue(), $point->getNorthing()->asMetres()->getValue());

        $easting = $point->getEasting()->add($adjustment[0]);
        $northing = $point->getNorthing()->add($adjustment[1]);

        return ProjectedPoint::createFromEastingNorthing(Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID), $easting, $northing, $point->getCoordinateEpoch());
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

        $adjustment = [new Metre(0), new Metre(0)];
        $easting = $point->getEasting();
        $northing = $point->getNorthing();

        do {
            $prevAdjustment = $adjustment;
            $adjustment = $this->getValues($easting->asMetres()->getValue(), $northing->asMetres()->getValue());
            $easting = $point->getEasting()->subtract($adjustment[0]);
            $northing = $point->getNorthing()->subtract($adjustment[1]);
        } while (abs($adjustment[0]->subtract($prevAdjustment[0])->getValue()) > self::ITERATION_CONVERGENCE && abs($adjustment[1]->subtract($prevAdjustment[1])->getValue()) > self::ITERATION_CONVERGENCE);

        return ProjectedPoint::createFromEastingNorthing($etrs89NationalGrid, $easting, $northing, $point->getCoordinateEpoch());
    }

    public function getHeightAdjustment(ProjectedPoint $point): Metre
    {
        $adjustment = $this->getValues($point->getEasting()->asMetres()->getValue(), $point->getNorthing()->asMetres()->getValue());

        return $adjustment[2];
    }

    /**
     * @return Metre[]
     */
    public function getValues(float $x, float $y): array
    {
        $offsets = $this->interpolate($x, $y);

        return [new Metre($offsets[0]), new Metre($offsets[1]), new Metre($offsets[2])];
    }

    private function getRecord(int $eastIndex, int $northIndex): GridValues
    {
        $record = $northIndex * 701 + $eastIndex + 1;

        $this->gridFile->seek($record);
        /** @var array<int, string> $rawData */
        $rawData = $this->gridFile->fgetcsv();

        return new GridValues((float) $rawData[1], (float) $rawData[2], [(float) $rawData[3], (float) $rawData[4], (float) $rawData[5]]);
    }
}
