<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 90°E to 96°E onshore.
 * @internal
 */
class Extent1775
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [96, 76.348115921021], [90, 76.348115921021], [90, 49.895341873169], [96, 49.895341873169], [96, 76.348115921021],
                ],
            ],
            [
                [
                    [91.885221481323, 81.276899337769], [90, 81.276899337769], [90, 81.00584602356], [91.885221481323, 81.00584602356], [91.885221481323, 81.276899337769],
                ],
            ],
            [
                [
                    [96, 81.340314865112], [90.588838577271, 81.340314865112], [90.588838577271, 78.942975997925], [96, 78.942975997925], [96, 81.340314865112],
                ],
            ],
            [
                [
                    [96, 77.160157938346], [95.018014907837, 77.160157938346], [95.018014907837, 76.836283996078], [96, 76.836283996078], [96, 77.160157938346],
                ],
            ],
            [
                [
                    [96, 76.763666152954], [94.606813430786, 76.763666152954], [94.606813430786, 76.557424545288], [96, 76.557424545288], [96, 76.763666152954],
                ],
            ],
            [
                [
                    [94.564065933228, 76.659566879272], [93.665082931519, 76.659566879272], [93.665082931519, 76.520231246948], [94.564065933228, 76.520231246948], [94.564065933228, 76.659566879272],
                ],
            ],
            [
                [
                    [92.261362075806, 77.71693611145], [91.516004562378, 77.71693611145], [91.516004562378, 77.549989700317], [92.261362075806, 77.549989700317], [92.261362075806, 77.71693611145],
                ],
            ],
            [
                [
                    [93.983518600464, 78.272764205933], [93.28835105896, 78.272764205933], [93.28835105896, 78.101648330689], [93.983518600464, 78.101648330689], [93.983518600464, 78.272764205933],
                ],
            ],
        ];
    }
}
