<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - onshore north of 21°N and east of 82°E.
 * @internal
 */
class Extent1678
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [97.415161132813, 29.463344573975], [82, 29.463344573975], [82, 21], [97.415161132813, 21], [97.415161132813, 29.463344573975],
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
