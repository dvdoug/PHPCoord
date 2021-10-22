<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function abs;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;

class IGNFGeocentricTranslationGrid extends IGNFGrid
{
    private const ITERATION_CONVERGENCE = 0.0001;

    public function applyForwardAdjustment(GeographicPoint $point, Geographic $to): GeographicPoint
    {
        [$tx, $ty, $tz] = $this->getAdjustment($point->getLatitude()->asDegrees(), $point->getLongitude()->asDegrees());

        return $point->geocentricTranslation(
            $to,
            $tx,
            $ty,
            $tz,
        );
    }

    public function applyReverseAdjustment(GeographicPoint $point, Geographic $to): GeographicPoint
    {
        $adjustment = [new Metre(0), new Metre(0), new Metre(0)];
        $latitude = $point->getLatitude();
        $longitude = $point->getLongitude();

        do {
            $prevAdjustment = $adjustment;
            $adjustment = $this->getAdjustment($latitude->asDegrees(), $longitude->asDegrees());
            $newPoint = $point->geocentricTranslation(
                $to,
                $adjustment[0]->multiply(-1),
                $adjustment[1]->multiply(-1),
                $adjustment[2]->multiply(-1),
            );

            $latitude = $newPoint->getLatitude();
            $longitude = $newPoint->getLongitude();
        } while (abs($adjustment[0]->subtract($prevAdjustment[0])->getValue()) > self::ITERATION_CONVERGENCE && abs($adjustment[1]->subtract($prevAdjustment[1])->getValue()) > self::ITERATION_CONVERGENCE && abs($adjustment[2]->subtract($prevAdjustment[2])->getValue()) > self::ITERATION_CONVERGENCE);

        return $newPoint;
    }

    /**
     * @return Metre[]
     */
    private function getAdjustment(Degree $latitude, Degree $longitude): array
    {
        $offsets = $this->interpolateBilinear($longitude->getValue(), $latitude->getValue());

        return [new Metre($offsets[0]), new Metre($offsets[1]), new Metre($offsets[2])];
    }
}
