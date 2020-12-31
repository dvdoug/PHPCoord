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

    protected int $epsgCode;

    /**
     * @var Axis[]
     */
    protected array $axes;

    private static Repository $repository;

    public static function fromEPSGCode(int $epsgCode): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getCoordinateSystems();

        if (!isset($allData[$epsgCode])) {
            throw new UnknownCoordinateSystemException($epsgCode);
        }

        $data = $allData[$epsgCode];

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
            return new Cartesian($epsgCode, $axes);
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_ELLIPSOIDAL) {
            return new Ellipsoidal($epsgCode, $axes);
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_VERTICAL) {
            return new Vertical($epsgCode, $axes);
        }

        throw new UnknownCoordinateSystemException($epsgCode); // @codeCoverageIgnore
    }

    public function __construct(
        int $epsgCode,
        array $axes
    ) {
        $this->epsgCode = $epsgCode;
        $this->axes = $axes;
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
    }

    /**
     * @return Axis[]
     */
    public function getAxes(): array
    {
        return $this->axes;
    }
}
