<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 120°E to 126°E onshore.
 * @internal
 */
class Extent1780
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, 73.99720954895], [120, 73.99720954895], [120, 51.519757904383], [126, 51.519757904383], [126, 73.99720954895],
                ],
            ],
            [
                [
                    [126, 52.670574229352], [125.97297096252, 52.670574229352], [125.97297096252, 52.574374342872], [126, 52.574374342872], [126, 52.670574229352],
                ],
            ],
        ];
    }
}
