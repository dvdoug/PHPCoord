<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 6°W to 0°W and ETRS89 by country.
 * @internal
 */
class Extent2124
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-2.6351795352638, 35.429626830951], [-2.9701587589999, 35.429626830951], [-2.9701587589999, 35.265663028], [-2.6351795352638, 35.265663028], [-2.6351795352638, 35.429626830951],
                ],
            ],
            [
                [
                    [0, 45.356451107837], [-5.9999999999999, 45.356451107837], [-5.9999999999999, 35.662753149], [0, 35.662753149], [0, 45.356451107837],
                ],
            ],
            [
                [
                    [-5.2416665049994, 53.931747393812], [-5.9999999999999, 53.931747393812], [-5.9999999999999, 51.806999969042], [-5.2416665049994, 51.806999969042], [-5.2416665049994, 53.931747393812],
                ],
            ],
            [
                [
                    [0, 65.694080176966], [-5.9999999999999, 65.694080176966], [-5.9999999999999, 60.251078582347], [0, 60.251078582347], [0, 65.694080176966],
                ],
            ],
            [
                [
                    [0, 74.363028185025], [-5.9999999999999, 74.363028185025], [-5.9999999999999, 67.668148032958], [0, 67.668148032958], [0, 74.363028185025],
                ],
            ],
            [
                [
                    [1.7053025658242E-13, 80.489344496333], [-3.3437137437567, 80.489344496333], [-3.3437137437567, 76.169853022562], [1.7053025658242E-13, 76.169853022562], [1.7053025658242E-13, 80.489344496333],
                ],
            ],
        ];
    }
}