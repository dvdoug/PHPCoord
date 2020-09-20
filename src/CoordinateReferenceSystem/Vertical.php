<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\Datum\Datum;

class Vertical extends CoordinateReferenceSystem
{
    public function __construct(
        int $epsgCode,
        CoordinateSystem $coordinateSystem,
        Datum $datum
    ) {
        $this->epsgCode = $epsgCode;
        $this->coordinateSystem = $coordinateSystem;
        $this->datum = $datum;

        assert(count($coordinateSystem->getAxes()) === 1);
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
    }

    public function getCoordinateSystem(): CoordinateSystem
    {
        return $this->coordinateSystem;
    }

    public function getDatum(): Datum
    {
        return $this->datum;
    }
}
