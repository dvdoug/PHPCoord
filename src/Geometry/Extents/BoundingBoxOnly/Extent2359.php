<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Vietnam - 14°N to 18°N onshore.
 * @internal
 */
class Extent2359
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [109.35049777907, 18], [105.612792969, 18], [105.612792969, 14], [109.35049777907, 14], [109.35049777907, 18],
                ],
            ],
            [
                [
                    [107.40060589858, 17.216443483983], [107.27870616036, 17.216443483983], [107.27870616036, 17.099388322168], [107.40060589858, 17.099388322168], [107.40060589858, 17.216443483983],
                ],
            ],
            [
                [
                    [108.75024536121, 15.868144256744], [108.63886934969, 15.868144256744], [108.63886934969, 15.761178487191], [108.75024536121, 15.761178487191], [108.75024536121, 15.868144256744],
                ],
            ],
            [
                [
                    [109.19467197331, 15.48311145708], [109.02558580704, 15.48311145708], [109.02558580704, 15.318885212706], [109.19467197331, 15.318885212706], [109.19467197331, 15.48311145708],
                ],
            ],
        ];
    }
}