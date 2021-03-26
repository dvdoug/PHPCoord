<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 96°E to 102°E.
 * @internal
 */
class Extent1591
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [96.471102932796, 29.056639269481], [96.470956351992, 29.056639269481], [96.470956351992, 29.056435117342], [96.471102932796, 29.056435117342], [96.471102932796, 29.056639269481],
                ],
            ],
            [
                [
                    [102, 43.172536696153], [96, 43.172536696153], [96, 21.139492034913], [102, 21.139492034913], [102, 43.172536696153],
                ],
            ],
        ];
    }
}
