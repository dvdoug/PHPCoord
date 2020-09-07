<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

class Compound extends CoordinateReferenceSystem
{
    /**
     * @var Geocentric|Geographic|Projected
     */
    private $horizontal;

    /**
     * @var Vertical
     */
    private $vertical;

    /**
     * Compound constructor.
     * @param Geocentric|Geographic|Projected $horizontal
     */
    public function __construct(
        int $epsgCode,
        CoordinateReferenceSystem $horizontal,
        Vertical $vertical
    ) {
        $this->epsgCode = $epsgCode;
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
    }

    public function getHorizontal(): CoordinateReferenceSystem
    {
        return $this->horizontal;
    }

    public function getVertical(): Vertical
    {
        return $this->vertical;
    }
}
