<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Bangladesh - onshore east of 90°E.
 * @internal
 */
class Extent1675
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [92.669342041016, 25.283138275147], [90, 25.283138275147], [90, 20.523005946139], [92.669342041016, 20.523005946139], [92.669342041016, 25.283138275147],
                ],
            ],
            [
                [
                    [91.622152239155, 22.672392204355], [91.348913527782, 22.672392204355], [91.348913527782, 22.295853673039], [91.622152239155, 22.295853673039], [91.622152239155, 22.672392204355],
                ],
            ],
        ];
    }
}
