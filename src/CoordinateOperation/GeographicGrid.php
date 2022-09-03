<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;

use function abs;

abstract class GeographicGrid extends Grid
{
    protected const ITERATION_CONVERGENCE = 0.0001;

    public function applyForwardAdjustment(GeographicPoint $point, Geographic2D|Geographic3D $to): GeographicPoint
    {
        $shifts = $this->getValues($point->getLongitude()->getValue(), $point->getLatitude()->getValue());

        $latitude = $point->getLatitude()->add($shifts[0]);
        $longitude = $point->getLongitude()->add($shifts[1]);
        $height = $point->getHeight() && $shifts[2] ? $point->getHeight()->add($shifts[2]) : null;

        return GeographicPoint::create($to, $latitude, $longitude, $height, $point->getCoordinateEpoch());
    }

    public function applyReverseAdjustment(GeographicPoint $point, Geographic2D|Geographic3D $to): GeographicPoint
    {
        $shifts = [new ArcSecond(0), new ArcSecond(0)];
        $latitude = $point->getLatitude();
        $longitude = $point->getLongitude();

        do {
            $prevShifts = $shifts;
            $shifts = $this->getValues($longitude->getValue(), $latitude->getValue());
            $latitude = $point->getLatitude()->subtract($shifts[0]);
            $longitude = $point->getLongitude()->subtract($shifts[1]);
        } while (abs($shifts[0]->subtract($prevShifts[0])->getValue()) > self::ITERATION_CONVERGENCE && abs($shifts[1]->subtract($prevShifts[1])->getValue()) > self::ITERATION_CONVERGENCE);

        $height = $point->getHeight() && $shifts[2] ? $point->getHeight()->subtract($shifts[2]) : null;

        return GeographicPoint::create($to, $latitude, $longitude, $height, $point->getCoordinateEpoch());
    }
}
