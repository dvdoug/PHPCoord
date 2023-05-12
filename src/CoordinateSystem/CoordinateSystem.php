<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

abstract class CoordinateSystem
{
    public const CS_TYPE_CARTESIAN = 'Cartesian';

    public const CS_TYPE_ELLIPSOIDAL = 'ellipsoidal';

    public const CS_TYPE_ORDINAL = 'ordinal';

    public const CS_TYPE_SPHERICAL = 'spherical';

    public const CS_TYPE_VERTICAL = 'vertical';

    protected string $srid;

    /**
     * @var Axis[]
     */
    protected array $axes;

    /**
     * @var Axis[]
     */
    protected array $axesByName;

    /**
     * @param Axis[] $axes
     */
    public function __construct(
        string $srid,
        array $axes
    ) {
        $this->srid = $srid;
        $this->axes = $axes;

        foreach ($this->axes as $axis) {
            $this->axesByName[$axis->getName()] = $axis;
        }
    }

    public function getSRID(): string
    {
        return $this->srid;
    }

    /**
     * @return Axis[]
     */
    public function getAxes(): array
    {
        return $this->axes;
    }

    public function getAxisByName(string $name): ?Axis
    {
        return $this->axesByName[$name] ?? null;
    }
}
