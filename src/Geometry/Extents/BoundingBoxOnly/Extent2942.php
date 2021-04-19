<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 150°E to 156°E, 32°S to 36°S (SI56) onshore.
 * @internal
 */
class Extent2942
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [152.6530946472, -32], [150, -32], [150, -36], [152.6530946472, -36], [152.6530946472, -32],
                ],
            ],
        ];
    }
}
