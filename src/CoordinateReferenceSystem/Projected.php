<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\CoordinateSystem\CoordinateSystem;

class Projected extends CoordinateReferenceSystem
{
    public function __construct(
        int $epsgCode,
        CoordinateSystem $coordinateSystem,
        CoordinateReferenceSystem $baseCRS
    ) {
        $this->epsgCode = $epsgCode;
        $this->coordinateSystem = $coordinateSystem;
        $this->baseCRS = $baseCRS;
        $this->datum = $baseCRS->getDatum();
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
    }

    public function getCoordinateSystem(): CoordinateSystem
    {
        return $this->coordinateSystem;
    }

    public function getBaseCRS(): CoordinateReferenceSystem
    {
        return $this->baseCRS;
    }
}
