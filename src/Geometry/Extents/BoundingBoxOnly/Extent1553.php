<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Ethiopia - east of 42°E.
 * @internal
 */
class Extent1553
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [47.988243103027, 11.097082138062], [42, 11.097082138062], [42, 4.1155343139083], [47.988243103027, 4.1155343139083], [47.988243103027, 11.097082138062],
                ],
            ],
            [
                [
                    [42.399719238281, 12.847382934769], [42, 12.847382934769], [42, 11.890388217025], [42.399719238281, 11.890388217025], [42.399719238281, 12.847382934769],
                ],
            ],
        ];
    }
}
