<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - Middle East - Qatar offshore and UAE west of 54°E.
 * @internal
 */
class Extent1749
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [50.807496927995, 25.58611114], [50.557395547001, 25.58611114], [50.557395547001, 24.794965400524], [50.807496927995, 24.794965400524], [50.807496927995, 25.58611114],
                ],
            ],
            [
                [
                    [54, 27.043114141001], [50.815833547001, 27.043114141001], [50.815833547001, 22.769686468669], [54, 22.769686468669], [54, 27.043114141001],
                ],
            ],
        ];
    }
}
