<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - Zaporizhzhia oblast.
 * @internal
 */
class Extent4646
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [36.807831967, 46.706539867], [36.800858688, 46.706539867], [36.800858688, 46.677996148], [36.807831967, 46.677996148], [36.807831967, 46.706539867],
                ],
            ],
            [
                [
                    [37.244683, 48.143195], [34.171016, 48.143195], [34.171016, 46.076679412], [37.244683, 46.076679412], [37.244683, 48.143195],
                ],
            ],
        ];
    }
}
