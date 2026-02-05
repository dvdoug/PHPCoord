<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use JsonSerializable;

use function array_map;

/**
 * @internal
 */
class MultiPolygon extends Geometry implements JsonSerializable
{
    /**
     * @var Polygon[]
     */
    public array $coordinates;

    public function __construct(Polygon ...$coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return array{type: string, coordinates: array<array<Position[]>>}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'MultiPolygon',
            'coordinates' => array_map(static fn (Polygon $polygon) => array_map(static fn (LinearRing $linearRing) => $linearRing->coordinates, $polygon->coordinates), $this->coordinates),
        ];
    }
}
