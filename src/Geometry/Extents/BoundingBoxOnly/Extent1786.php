<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 156°E to 162°E onshore.
 * @internal
 */
class Extent1786
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [156.57393074036, 50.918138504028], [156, 50.918138504028], [156, 50.278419798018], [156.57393074036, 50.278419798018], [156.57393074036, 50.918138504028],
                ],
            ],
            [
                [
                    [162, 60.50557838873], [156, 60.50557838873], [156, 50.832143783569], [162, 50.832143783569], [162, 60.50557838873],
                ],
            ],
            [
                [
                    [162, 71.141263545207], [156, 71.141263545207], [156, 60.542200088501], [162, 60.542200088501], [162, 71.141263545207],
                ],
            ],
            [
                [
                    [161.84387397766, 70.88437461853], [161.31190299988, 70.88437461853], [161.31190299988, 70.698534011841], [161.84387397766, 70.698534011841], [161.84387397766, 70.88437461853],
                ],
            ],
            [
                [
                    [160.87114143372, 70.978879928589], [160.25502967834, 70.978879928589], [160.25502967834, 70.766382217407], [160.87114143372, 70.766382217407], [160.87114143372, 70.978879928589],
                ],
            ],
            [
                [
                    [156.95390129089, 77.195196151733], [156.21409797668, 77.195196151733], [156.21409797668, 77.05588722229], [156.95390129089, 77.05588722229], [156.95390129089, 77.195196151733],
                ],
            ],
        ];
    }
}