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
use PHPCoord\Point\GeographicPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function abs;

class IGNFGeocentricTranslationGrid extends GeographicGrid
{
    use IGNFGrid;

    public function applyForwardAdjustment(GeographicPoint $point, Geographic2D|Geographic3D $to): GeographicPoint
    {
        [$tx, $ty, $tz] = $this->getValues($point->getLongitude()->asDegrees()->getValue(), $point->getLatitude()->asDegrees()->getValue());

        return $point->geocentricTranslation(
            $to,
            $tx,
            $ty,
            $tz,
        );
    }

    public function applyReverseAdjustment(GeographicPoint $point, Geographic2D|Geographic3D $to): GeographicPoint
    {
        $adjustment = [new Metre(0), new Metre(0), new Metre(0)];
        $latitude = $point->getLatitude();
        $longitude = $point->getLongitude();

        do {
            $prevAdjustment = $adjustment;
            $adjustment = $this->getValues($longitude->asDegrees()->getValue(), $latitude->asDegrees()->getValue());
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
    public function getValues(float $x, float $y): array
    {
        $offsets = $this->interpolate($x, $y);

        return [new Metre($offsets[0]), new Metre($offsets[1]), new Metre($offsets[2])];
    }
}
