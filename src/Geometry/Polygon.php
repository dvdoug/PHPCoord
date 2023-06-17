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
class Polygon extends Geometry implements JsonSerializable
{
    /**
     * @var LinearRing[]
     */
    public array $coordinates;

    public function __construct(LinearRing ...$coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return array{type: string, coordinates: array<Position[]>}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'Polygon',
            'coordinates' => array_map(fn (LinearRing $linearRing) => $linearRing->coordinates, $this->coordinates),
        ];
    }
}
