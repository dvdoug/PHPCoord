<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function abs;
use const PHP_MAJOR_VERSION;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Datum\Datum;
use PHPCoord\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;
use SplFileObject;

class OSTNOSGM15Grid extends SplFileObject
{
    private const GRID_SIZE = 1000;

    private const ITERATION_CONVERGENCE = 0.0001;

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
        $eastIndex = (int) ($easting->getValue() / self::GRID_SIZE);
        $northIndex = (int) ($northing->getValue() / self::GRID_SIZE);

        $corner0 = $this->getRecord($eastIndex, $northIndex);
        $corner1 = $this->getRecord($eastIndex + 1, $northIndex);
        $corner2 = $this->getRecord($eastIndex + 1, $northIndex + 1);
        $corner3 = $this->getRecord($eastIndex, $northIndex + 1);

        $dx = $easting->getValue() - $corner0[1];
        $dy = $northing->getValue() - $corner0[2];

        $t = $dx / self::GRID_SIZE;
        $u = $dy / self::GRID_SIZE;

        $se = (1 - $t) * (1 - $u) * $corner0[3] + ($t) * (1 - $u) * $corner1[3] + ($t) * ($u) * $corner2[3] + (1 - $t) * ($u) * $corner3[3];
        $sn = (1 - $t) * (1 - $u) * $corner0[4] + ($t) * (1 - $u) * $corner1[4] + ($t) * ($u) * $corner2[4] + (1 - $t) * ($u) * $corner3[4];
        $sh = (1 - $t) * (1 - $u) * $corner0[5] + ($t) * (1 - $u) * $corner1[5] + ($t) * ($u) * $corner2[5] + (1 - $t) * ($u) * $corner3[5];

        return [$se, $sn, $sh];
    }

    private function getRecord(int $eastIndex, int $northIndex): array
    {
        $record = $northIndex * 701 + $eastIndex + 1;

        // https://bugs.php.net/bug.php?id=62004
        if (PHP_MAJOR_VERSION < 8) {
            --$record;
        }

        $this->seek($record);

        return $this->fgetcsv();
    }
}
