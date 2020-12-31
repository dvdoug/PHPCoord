<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownPrimeMeridianException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

class PrimeMeridian
{
    /**
     * Athens
     * Used in Greece for older mapping based on Hatt projection.
     */
    public const EPSG_ATHENS = 8912;

    /**
     * Bern
     * 1895 value.  Newer value of 7°26'22.335" determined in 1938.
     */
    public const EPSG_BERN = 8907;

    /**
     * Bogota.
     */
    public const EPSG_BOGOTA = 8904;

    /**
     * Brussels.
     */
    public const EPSG_BRUSSELS = 8910;

    /**
     * Ferro
     * El Hierro island, Canary islands, considered the most westerly point in Europe. Its longitude has had various
     * determinations. 17°40'W of Greenwich was adopted by Austria and former Czechoslovakia, 17°39'46.02"W by former
     * Yugoslavia.
     */
    public const EPSG_FERRO = 8909;

    /**
     * Greenwich
     * The international reference meridian as defined first by the 1884 International Meridian Conference and later by
     * the Bureau International de l'Heure (BIH) and then the International Earth Rotation Service (IERS).
     */
    public const EPSG_GREENWICH = 8901;

    /**
     * Jakarta
     * 1924 determination. Supersedes 1910 value of 106°48'37.05"E of Greenwich.
     */
    public const EPSG_JAKARTA = 8908;

    /**
     * Lisbon.
     */
    public const EPSG_LISBON = 8902;

    /**
     * Madrid
     * Longitude has had various determinations. 3°41'14.55"W of Greenwich adopted for Spanish cartography.
     */
    public const EPSG_MADRID = 8905;

    /**
     * Oslo
     * Formerly known as Kristiania or Christiania.
     */
    public const EPSG_OSLO = 8913;

    /**
     * Paris
     * Value adopted by IGN (Paris) in 1936. Equivalent to 2°20'14.025". Preferred by EPSG to earlier value of
     * 2°20'13.95" (2.596898 grads) used by RGS London.
     */
    public const EPSG_PARIS = 8903;

    /**
     * Paris RGS
     * Value replaced by IGN (France) in 1936 - see code 8903. Equivalent to 2.596898 grads.
     */
    public const EPSG_PARIS_RGS = 8914;

    /**
     * Rome.
     */
    public const EPSG_ROME = 8906;

    /**
     * Stockholm.
     */
    public const EPSG_STOCKHOLM = 8911;

    private static Repository $repository;

    private string $name;

    private Angle $greenwichLongitude;

    public function __construct(string $name, Angle $greenwichLongitude)
    {
        $this->name = $name;
        $this->greenwichLongitude = $greenwichLongitude;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGreenwichLongitude(): Angle
    {
        return $this->greenwichLongitude;
    }

    public static function fromEPSGCode(int $epsgCode): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getPrimeMeridians();

        if (!isset($allData[$epsgCode])) {
            throw new UnknownPrimeMeridianException($epsgCode);
        }

        $data = $allData[$epsgCode];

        return new static($data['prime_meridian_name'], UnitOfMeasureFactory::makeUnit($data['greenwich_longitude'], $data['uom_code']));
    }
}
