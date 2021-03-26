<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 25.5°E to 28.5°E onshore and S-42(58) by country.
 * @internal
 */
class Extent3587
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [28.5, 48.263885498047], [25.5, 48.263885498047], [25.5, 41.288568470444], [28.5, 41.288568470444], [28.5, 48.263885498047],
                ],
            ],
        ];
    }
}
