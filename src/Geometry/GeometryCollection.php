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
class GeometryCollection extends Geometry implements JsonSerializable
{
    /**
     * @var Geometry[]
     */
    public array $geometries;

    public function __construct(Geometry ...$geometries)
    {
        $this->geometries = $geometries;
    }

    /**
     * @return array{type: string, geometries: Geometry[]}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'GeometryCollection',
            'geometries' => $this->geometries,
        ];
    }
}
