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
class MultiPoint extends Geometry implements JsonSerializable
{
    /**
     * @var Position[]
     */
    public array $coordinates;

    public function __construct(Position ...$coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return array{type: string, coordinates: Position[]}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'MultiPoint',
            'coordinates' => $this->coordinates,
        ];
    }
}