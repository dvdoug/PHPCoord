<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - onshore 84°E to 90°E.
 * @internal
 */
class Extent1682
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [90, 28.130968093872], [84, 28.130968093872], [84, 18.187905138983], [90, 18.187905138983], [90, 28.130968093872],
                ],
            ],
            [
                [
                    [88.675971984864, 24.3155002594], [88.674819946289, 24.3155002594], [88.674819946289, 24.314569473267], [88.675971984864, 24.314569473267], [88.675971984864, 24.3155002594],
                ],
            ],
        ];
    }
}
