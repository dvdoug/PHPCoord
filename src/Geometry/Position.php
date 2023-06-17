<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use JsonSerializable;

use function array_filter;

/**
 * @internal
 */
class Position implements JsonSerializable
{
    public function __construct(
        public float $x,
        public float $y,
        public ?float $z = null,
        public ?float $m = null,
    ) {
    }

    /**
     * @return float[]
     */
    public function jsonSerialize(): array
    {
        return array_filter([$this->x, $this->y, $this->z, $this->m], fn (?float $v) => $v !== null);
    }
}
