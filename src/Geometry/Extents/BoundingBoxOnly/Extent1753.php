<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Peru - west of 79°W.
 * @internal
 */
class Extent1753
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-79, -3.3805160522461], [-81.404005050659, -3.3805160522461], [-81.404005050659, -8.3179168701172], [-79, -8.3179168701172], [-79, -3.3805160522461],
                ],
            ],
        ];
    }
}
