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
class MultiLineString extends Geometry implements JsonSerializable
{
    /**
     * @var LineString[]
     */
    public array $coordinates;

    public function __construct(LineString ...$coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return array{type: string, coordinates: array<Position[]>}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'MultiLineString',
            'coordinates' => array_map(fn (LineString $lineString) => $lineString->coordinates, $this->coordinates),
        ];
    }
}
