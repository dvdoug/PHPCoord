<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownCoordinateSystemException;

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

    private static Repository $repository;

    public static function fromSRID(string $srid): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getCoordinateSystems();

        if (!isset($allData[$srid])) {
            throw new UnknownCoordinateSystemException($srid);
        }

        $data = $allData[$srid];

        $axes = [];
        foreach ($data['axes'] as $axisData) {
            $axes[$axisData['coord_axis_order']] = new Axis(
                $axisData['coord_axis_orientation'],
                $axisData['coord_axis_abbreviation'],
                $axisData['coord_axis_name'],
                $axisData['uom_code'],
            );
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_CARTESIAN) {
            return new Cartesian($srid, $axes);
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_ELLIPSOIDAL) {
            return new Ellipsoidal($srid, $axes);
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_VERTICAL) {
            return new Vertical($srid, $axes);
        }

        throw new UnknownCoordinateSystemException($srid); // @codeCoverageIgnore
    }

    public function __construct(
        string $srid,
        array $axes
    ) {
        $this->srid = $srid;
        $this->axes = $axes;
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
}
