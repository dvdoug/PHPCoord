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

class PrimeMeridian implements PrimeMeridianIds
{
    /** @var Repository */
    private static $repository;

    /** @var string */
    private $name;

    /** @var Angle */
    private $greenwichLongitude;

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
