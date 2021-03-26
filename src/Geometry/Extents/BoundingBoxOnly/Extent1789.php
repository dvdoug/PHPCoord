<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 174°E to 180°E onshore.
 * @internal
 */
class Extent1789
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, 69.950304031372], [174, 69.950304031372], [174, 61.657513760632], [180, 61.657513760632], [180, 69.950304031372],
                ],
            ],
            [
                [
                    [180, 71.585364782873], [178.46650123596, 71.585364782873], [178.46650123596, 70.750387191772], [180, 70.750387191772], [180, 71.585364782873],
                ],
            ],
        ];
    }
}
