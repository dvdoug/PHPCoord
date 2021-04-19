<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 44°N to 44°40'N; 144°E to 145°E.
 * @internal
 */
class Extent2432
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [145, 44.154004215117], [144.8194639652, 44.154004215117], [144.8194639652, 43.999866666667], [145, 43.999866666667], [145, 44.154004215117],
                ],
            ],
            [
                [
                    [144.39318118596, 44.182433687721], [144, 44.182433687721], [144, 43.999866666667], [144.39318118596, 43.999866666667], [144.39318118596, 44.182433687721],
                ],
            ],
        ];
    }
}
