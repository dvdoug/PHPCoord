<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use PHPCoord\Exception\InvalidGeometryException;

use function count;
use function reset;
use function end;

/**
 * @internal
 */
class LinearRing extends LineString
{
    public function __construct(Position ...$coordinates)
    {
        parent::__construct(...$coordinates);
        if (count($this->coordinates) < 4) {
            throw new InvalidGeometryException('Linear Rings must have 4 or more elements');
        }

        if (reset($coordinates) != end($coordinates)) {
            throw new InvalidGeometryException('A Linear Ring must be closed (first and last elements equal)');
        }
    }
}
