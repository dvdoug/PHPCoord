<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan excluding northern main province.
 * @internal
 */
class Extent4163
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [157.641166647, 27.630262142], [150.31583464, 27.630262142], [150.31583464, 20.949639135], [157.641166647, 20.949639135], [157.641166647, 27.630262142],
                ],
            ],
            [
                [
                    [147.859705638, 46.048717159], [122.382001614, 46.048717159], [122.382001614, 17.091340132], [147.859705638, 17.091340132], [147.859705638, 46.048717159],
                ],
            ],
        ];
    }
}
