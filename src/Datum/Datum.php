<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownDatumException;

class Datum implements DatumIds
{
    public const DATUM_TYPE_GEODETIC = 'geodetic';

    public const DATUM_TYPE_VERTICAL = 'vertical';

    public const DATUM_TYPE_DYNAMIC_GEODETIC = 'dynamic_geodetic';

    public const DATUM_TYPE_DYNAMIC_VERTICAL = 'dynamic_vertical';

    public const DATUM_TYPE_ENGINEERING = 'engineering';

    public const DATUM_TYPE_ENSEMBLE = 'ensemble';

    /** @var Repository */
    private static $repository;

    /** @var string */
    protected $datumType;

    /** @var Ellipsoid */
    protected $ellipsoid;

    /** @var PrimeMeridian */
    protected $primeMeridian;

    /** @var ?float */
    protected $frameReferenceEpoch;

    public function __construct(
        string $datumType,
        ?Ellipsoid $ellipsoid,
        ?PrimeMeridian $primeMeridian,
        ?float $frameReferenceEpoch
    ) {
        $this->datumType = $datumType;
        $this->ellipsoid = $ellipsoid;
        $this->primeMeridian = $primeMeridian;
        $this->frameReferenceEpoch = $frameReferenceEpoch;
    }

    public function getDatumType(): string
    {
        return $this->datumType;
    }

    public function getEllipsoid(): ?Ellipsoid
    {
        return $this->ellipsoid;
    }

    public function getPrimeMeridian(): ?PrimeMeridian
    {
        return $this->primeMeridian;
    }

    public function getFrameReferenceEpoch(): ?float
    {
        return $this->frameReferenceEpoch;
    }

    public static function fromEPSGCode(int $epsgCode): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getDatums();

        if (!isset($allData[$epsgCode])) {
            throw new UnknownDatumException($epsgCode);
        }

        $data = $allData[$epsgCode];

        return new static(
            $data['datum_type'],
            $data['ellipsoid_code'] ? Ellipsoid::fromEPSGCode($data['ellipsoid_code']) : null,
            $data['prime_meridian_code'] ? PrimeMeridian::fromEPSGCode($data['prime_meridian_code']) : null,
            $data['frame_reference_epoch'],
        );
    }
}
