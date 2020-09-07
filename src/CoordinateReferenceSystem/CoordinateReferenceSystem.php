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

abstract class CoordinateReferenceSystem implements CoordinateReferenceSystemIds
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

    /** @var int */
    protected $epsgCode;

    /** @var CoordinateSystem */
    protected $coordinateSystem;

    /** @var Datum */
    protected $datum;

    /** @var CoordinateReferenceSystem */
    protected $baseCRS;

    /** @var Repository */
    private static $repository;

    public static function fromEPSGCode(int $epsgCode): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getCoordinateReferenceSystems();

        if (!isset($allData[$epsgCode])) {
            throw new UnknownCoordinateReferenceSystemException($epsgCode);
        }

        $data = $allData[$epsgCode];

        switch ($data['coord_ref_sys_kind']) {
            case self::CRS_TYPE_GEOCENTRIC:
                return new Geocentric(
                    $epsgCode,
                    CoordinateSystem::fromEPSGCode($data['coord_sys_code']),
                    $data['datum_code'] ? Datum::fromEPSGCode($data['datum_code']) : self::fromEPSGCode($data['base_crs_code'])->getDatum()
                );

            case self::CRS_TYPE_GEOGRAPHIC_2D:
                return new Geographic2D(
                    $epsgCode,
                    CoordinateSystem::fromEPSGCode($data['coord_sys_code']),
                    $data['datum_code'] ? Datum::fromEPSGCode($data['datum_code']) : self::fromEPSGCode($data['base_crs_code'])->getDatum()
                );

            case self::CRS_TYPE_GEOGRAPHIC_3D:
                return new Geographic3D(
                    $epsgCode,
                    CoordinateSystem::fromEPSGCode($data['coord_sys_code']),
                    $data['datum_code'] ? Datum::fromEPSGCode($data['datum_code']) : self::fromEPSGCode($data['base_crs_code'])->getDatum()
                );

            case self::CRS_TYPE_PROJECTED:
                return new Projected(
                    $epsgCode,
                    CoordinateSystem::fromEPSGCode($data['coord_sys_code']),
                    self::fromEPSGCode($data['base_crs_code'])
                );

            case self::CRS_TYPE_VERTICAL:
                return new Vertical(
                    $epsgCode,
                    CoordinateSystem::fromEPSGCode($data['coord_sys_code']),
                    Datum::fromEPSGCode($data['datum_code'])
                );

            case self::CRS_TYPE_COMPOUND:
                return new Compound(
                    $epsgCode,
                    self::fromEPSGCode($data['cmpd_horizcrs_code']),
                    self::fromEPSGCode($data['cmpd_vertcrs_code'])
                );

            default:
                throw new UnknownCoordinateReferenceSystemException($epsgCode);
        }
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
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
