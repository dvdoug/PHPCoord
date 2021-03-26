<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 180° to 174°W onshore.
 * @internal
 */
class Extent1790
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-174, 69.040736], [-180, 69.040736], [-180, 64.359564982928], [-174, 64.359564982928], [-174, 69.040736],
                ],
            ],
            [
                [
                    [-177.287626, 71.64345], [-180, 71.64345], [-180, 70.85927], [-177.287626, 70.85927], [-177.287626, 71.64345],
                ],
            ],
        ];
    }
}
