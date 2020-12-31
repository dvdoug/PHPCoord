<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\Datum\Datum;
use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;

abstract class CoordinateReferenceSystem
{
    public const CRS_TYPE_COMPOUND = 'compound';

    public const CRS_TYPE_DERIVED = 'derived';

    public const CRS_TYPE_DYNAMIC_GEOCENTRIC = 'dynamic geocentric';

    public const CRS_TYPE_DYNAMIC_GEOGRAPHIC_2D = 'dynamic geographic 2D';

    public const CRS_TYPE_DYNAMIC_GEOGRAPHIC_3D = 'dynamic geographic 3D';

    public const CRS_TYPE_DYNAMIC_VERTICAL = 'dynamic vertical';

    public const CRS_TYPE_ENGINEERING = 'engineering';

    public const CRS_TYPE_GEOCENTRIC = 'geocentric';

    public const CRS_TYPE_GEOGRAPHIC_2D = 'geographic 2D';

    public const CRS_TYPE_GEOGRAPHIC_3D = 'geographic 3D';

    public const CRS_TYPE_PROJECTED = 'projected';

    public const CRS_TYPE_VERTICAL = 'vertical';

    protected string $srid;

    protected CoordinateSystem $coordinateSystem;

    protected Datum $datum;

    protected CoordinateReferenceSystem $baseCRS;

    /**
     * @var Repository
     */
    private static $repository;

    public static function fromSRID(string $srid): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getCoordinateReferenceSystems();

        if (!isset($allData[$srid])) {
            throw new UnknownCoordinateReferenceSystemException($srid);
        }

        $data = $allData[$srid];

        switch ($data['coord_ref_sys_kind']) {
            case self::CRS_TYPE_GEOCENTRIC:
                return new Geocentric(
                    $srid,
                    CoordinateSystem::fromSRID($data['coord_sys_code']),
                    $data['datum_code'] ? Datum::fromSRID($data['datum_code']) : self::fromSRID($data['base_crs_code'])->getDatum()
                );

            case self::CRS_TYPE_GEOGRAPHIC_2D:
                return new Geographic2D(
                    $srid,
                    CoordinateSystem::fromSRID($data['coord_sys_code']),
                    $data['datum_code'] ? Datum::fromSRID($data['datum_code']) : self::fromSRID($data['base_crs_code'])->getDatum()
                );

            case self::CRS_TYPE_GEOGRAPHIC_3D:
                return new Geographic3D(
                    $srid,
                    CoordinateSystem::fromSRID($data['coord_sys_code']),
                    $data['datum_code'] ? Datum::fromSRID($data['datum_code']) : self::fromSRID($data['base_crs_code'])->getDatum()
                );

            case self::CRS_TYPE_PROJECTED:
                return new Projected(
                    $srid,
                    CoordinateSystem::fromSRID($data['coord_sys_code']),
                    self::fromSRID($data['base_crs_code'])
                );

            case self::CRS_TYPE_VERTICAL:
                return new Vertical(
                    $srid,
                    CoordinateSystem::fromSRID($data['coord_sys_code']),
                    Datum::fromSRID($data['datum_code'])
                );

            case self::CRS_TYPE_COMPOUND:
                return new Compound(
                    $srid,
                    self::fromSRID($data['cmpd_horizcrs_code']),
                    self::fromSRID($data['cmpd_vertcrs_code'])
                );

            default:
                throw new UnknownCoordinateReferenceSystemException($srid);
        }
    }

    public function getSRID(): string
    {
        return $this->srid;
    }

    public function getCoordinateSystem(): CoordinateSystem
    {
        return $this->coordinateSystem;
    }

    public function getDatum(): Datum
    {
        return $this->datum;
    }
}
