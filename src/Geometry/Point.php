<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use JsonSerializable;

/**
 * @internal
 */
class Point extends Geometry implements JsonSerializable
{
    public function __construct(public Position $coordinates)
    {
    }

    /**
     * @return array{type: string, coordinates: Position}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'Point',
            'coordinates' => $this->coordinates,
        ];
    }
}
