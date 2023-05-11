<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\Exception\UnknownPrimeMeridianException;
use PHPCoord\UnitOfMeasure\Angle\Angle;

use function array_map;

class PrimeMeridian
{
    /**
     * Athens
     * Used in Greece for older mapping based on Hatt projection.
     */
    public const EPSG_ATHENS = 'urn:ogc:def:meridian:EPSG::8912';

    /**
     * Bern
     * 1895 value.  Newer value of 7°26'22.335" determined in 1938.
     */
    public const EPSG_BERN = 'urn:ogc:def:meridian:EPSG::8907';

    /**
     * Bogota.
     */
    public const EPSG_BOGOTA = 'urn:ogc:def:meridian:EPSG::8904';

    /**
     * Brussels.
     */
    public const EPSG_BRUSSELS = 'urn:ogc:def:meridian:EPSG::8910';

    /**
     * Ferro
     * El Hierro island, Canary islands, considered the most westerly point in Europe. Its longitude has had various
     * determinations. 17°40'W of Greenwich was adopted by Austria and former Czechoslovakia, 17°39'46.02"W by former
     * Yugoslavia.
     */
    public const EPSG_FERRO = 'urn:ogc:def:meridian:EPSG::8909';

    /**
     * Greenwich
     * The international reference meridian as defined first by the 1884 International Meridian Conference and later by
     * the Bureau International de l'Heure (BIH) and then the International Earth Rotation Service (IERS).
     */
    public const EPSG_GREENWICH = 'urn:ogc:def:meridian:EPSG::8901';

    /**
     * Jakarta
     * 1924 determination. Supersedes 1910 value of 106°48'37.05"E of Greenwich.
     */
    public const EPSG_JAKARTA = 'urn:ogc:def:meridian:EPSG::8908';

    /**
     * Lisbon.
     */
    public const EPSG_LISBON = 'urn:ogc:def:meridian:EPSG::8902';

    /**
     * Madrid
     * Longitude has had various determinations. 3°41'14.55"W of Greenwich adopted for Spanish cartography.
     */
    public const EPSG_MADRID = 'urn:ogc:def:meridian:EPSG::8905';

    /**
     * Oslo
     * Formerly known as Kristiania or Christiania.
     */
    public const EPSG_OSLO = 'urn:ogc:def:meridian:EPSG::8913';

    /**
     * Paris
     * Conventional value of 0h 9m 20.935s = 2°20'14.025" adopted by IGN (Paris) in 1936 converted to grads. Preferred
     * by EPSG to earlier value of 2°20'13.95" (2.596898 grads) used by RGS London (prime meridian code 8914).
     */
    public const EPSG_PARIS = 'urn:ogc:def:meridian:EPSG::8903';

    /**
     * Paris RGS
     * Value replaced by IGN (France) in 1936 - see code 8903. Equivalent to 2.596898 grads.
     */
    public const EPSG_PARIS_RGS = 'urn:ogc:def:meridian:EPSG::8914';

    /**
     * Rome.
     */
    public const EPSG_ROME = 'urn:ogc:def:meridian:EPSG::8906';

    /**
     * Stockholm.
     */
    public const EPSG_STOCKHOLM = 'urn:ogc:def:meridian:EPSG::8911';

    /**
     * @var array<string, array{name: string, greenwich_longitude: float|Angle, uom: string, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:meridian:EPSG::8901' => [
            'name' => 'Greenwich',
            'greenwich_longitude' => 0.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9102',
            'help' => 'The international reference meridian as defined first by the 1884 International Meridian Conference and later by the Bureau International de l\'Heure (BIH) and then the International Earth Rotation Service (IERS).',
        ],
        'urn:ogc:def:meridian:EPSG::8902' => [
            'name' => 'Lisbon',
            'greenwich_longitude' => -9.0754862,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => '',
        ],
        'urn:ogc:def:meridian:EPSG::8903' => [
            'name' => 'Paris',
            'greenwich_longitude' => 2.5969213,
            'uom' => 'urn:ogc:def:uom:EPSG::9105',
            'help' => 'Conventional value of 0h 9m 20.935s = 2°20\'14.025" adopted by IGN (Paris) in 1936 converted to grads. Preferred by EPSG to earlier value of 2°20\'13.95" (2.596898 grads) used by RGS London (prime meridian code 8914).',
        ],
        'urn:ogc:def:meridian:EPSG::8904' => [
            'name' => 'Bogota',
            'greenwich_longitude' => -74.04513,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => '',
        ],
        'urn:ogc:def:meridian:EPSG::8905' => [
            'name' => 'Madrid',
            'greenwich_longitude' => -3.411455,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => 'Longitude has had various determinations. 3°41\'14.55"W of Greenwich adopted for Spanish cartography.',
        ],
        'urn:ogc:def:meridian:EPSG::8906' => [
            'name' => 'Rome',
            'greenwich_longitude' => 12.27084,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => '',
        ],
        'urn:ogc:def:meridian:EPSG::8907' => [
            'name' => 'Bern',
            'greenwich_longitude' => 7.26225,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => '1895 value.  Newer value of 7°26\'22.335" determined in 1938.',
        ],
        'urn:ogc:def:meridian:EPSG::8908' => [
            'name' => 'Jakarta',
            'greenwich_longitude' => 106.482779,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => '1924 determination. Supersedes 1910 value of 106°48\'37.05"E of Greenwich.',
        ],
        'urn:ogc:def:meridian:EPSG::8909' => [
            'name' => 'Ferro',
            'greenwich_longitude' => -17.4,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => 'El Hierro island, Canary islands, considered the most westerly point in Europe. Its longitude has had various determinations. 17°40\'W of Greenwich was adopted by Austria and former Czechoslovakia, 17°39\'46.02"W by former Yugoslavia.',
        ],
        'urn:ogc:def:meridian:EPSG::8910' => [
            'name' => 'Brussels',
            'greenwich_longitude' => 4.220471,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => '',
        ],
        'urn:ogc:def:meridian:EPSG::8911' => [
            'name' => 'Stockholm',
            'greenwich_longitude' => 18.03298,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => '',
        ],
        'urn:ogc:def:meridian:EPSG::8912' => [
            'name' => 'Athens',
            'greenwich_longitude' => 23.4258815,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => 'Used in Greece for older mapping based on Hatt projection.',
        ],
        'urn:ogc:def:meridian:EPSG::8913' => [
            'name' => 'Oslo',
            'greenwich_longitude' => 10.43225,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => 'Formerly known as Kristiania or Christiania.',
        ],
        'urn:ogc:def:meridian:EPSG::8914' => [
            'name' => 'Paris RGS',
            'greenwich_longitude' => 2.201395,
            'uom' => 'urn:ogc:def:uom:EPSG::9110',
            'help' => 'Value replaced by IGN (France) in 1936 - see code 8903. Equivalent to 2.596898 grads.',
        ],
    ];

    /**
     * @var array<string, self>
     */
    private static array $cachedObjects = [];

    private string $name;

    private Angle $greenwichLongitude;

    private string $srid;

    public function __construct(string $name, Angle $greenwichLongitude, string $srid = '')
    {
        $this->name = $name;
        $this->greenwichLongitude = $greenwichLongitude;
        $this->srid = $srid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGreenwichLongitude(): Angle
    {
        return $this->greenwichLongitude;
    }

    public function getSRID(): string
    {
        return $this->srid;
    }

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownPrimeMeridianException($srid);
        }

        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];

            if ($data['greenwich_longitude'] instanceof Angle) {
                self::$cachedObjects[$srid] = new self($data['name'], $data['greenwich_longitude'], $srid);
            } else {
                self::$cachedObjects[$srid] = new self($data['name'], Angle::makeUnit($data['greenwich_longitude'], $data['uom']), $srid);
            }
        }

        return self::$cachedObjects[$srid];
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_map(fn (array $data) => $data['name'], static::$sridData);
    }

    /**
     * @return array<string, array{name: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_map(fn (array $data) => ['name' => $data['name'], 'help' => $data['help']], static::$sridData);
    }

    public static function registerCustomMeridian(string $srid, string $name, Angle $longitudeFromGreenwich, string $help = ''): void
    {
        self::$sridData[$srid] = ['name' => $name, 'greenwich_longitude' => $longitudeFromGreenwich, 'uom' => '', 'help' => $help];
    }
}
