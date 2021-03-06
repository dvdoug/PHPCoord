<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Oman - 54°E to 60°E.
 * @internal
 */
class Extent4323
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [60, 25.114681139001], [54, 25.114681139001], [54, 14.335012129], [60, 14.335012129], [60, 25.114681139001],
                ],
            ],
            [
                [
                    [56.351070249297, 25.329778936091], [56.208600200307, 25.329778936091], [56.208600200307, 25.227608811382], [56.351070249297, 25.227608811382], [56.351070249297, 25.329778936091],
                ],
            ],
            [
                [
                    [56.855814553001, 26.737500141001], [55.757958552001, 26.737500141001], [55.757958552001, 25.626110076905], [56.855814553001, 25.626110076905], [56.855814553001, 26.737500141001],
                ],
            ],
        ];
    }
}
