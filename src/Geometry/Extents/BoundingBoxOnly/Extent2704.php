<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 172.5°E to 175.5°E onshore.
 * @internal
 */
class Extent2704
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [175.5, 70.011957168579], [172.5, 70.011957168579], [172.5, 61.138971328735], [175.5, 61.138971328735], [175.5, 70.011957168579],
                ],
            ],
            [
                [
                    [172.58456993103, 61.120636623525], [172.5, 61.120636623525], [172.5, 60.996837985982], [172.58456993103, 60.996837985982], [172.58456993103, 61.120636623525],
                ],
            ],
        ];
    }
}
