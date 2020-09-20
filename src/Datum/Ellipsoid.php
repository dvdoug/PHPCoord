<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownEllipsoidException;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

class Ellipsoid implements EllipsoidIds
{
    /** @var Repository */
    private static $repository;

    /** @var Length */
    protected $semiMajorAxis;

    /** @var Length */
    protected $semiMinorAxis;

    public function __construct(Length $semiMajorAxis, Length $semiMinorAxis)
    {
        $this->semiMajorAxis = $semiMajorAxis;
        $this->semiMinorAxis = $semiMinorAxis;
    }

    public function getSemiMajorAxis(): Length
    {
        return $this->semiMajorAxis;
    }

    public function getSemiMinorAxis(): Length
    {
        return $this->semiMinorAxis;
    }

    public function getFlattening(): float
    {
        return $this->semiMajorAxis->getValue() / ($this->semiMajorAxis->getValue() - $this->semiMinorAxis->getValue());
    }

    public function getInverseFlattening(): float
    {
        return ($this->semiMajorAxis->getValue() - $this->semiMinorAxis->getValue()) / $this->semiMajorAxis->getValue();
    }

    public function getEccentricitySquared(): float
    {
        return (2 * $this->getInverseFlattening()) - $this->getInverseFlattening() ** 2;
    }

    public static function fromEPSGCode(int $epsgCode): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getEllipsoids();

        if (!isset($allData[$epsgCode])) {
            throw new UnknownEllipsoidException($epsgCode);
        }

        $data = $allData[$epsgCode];

        return new static(
            UnitOfMeasureFactory::makeUnit($data['semi_major_axis'], $data['uom_code']),
            UnitOfMeasureFactory::makeUnit($data['semi_minor_axis'], $data['uom_code'])
        );
    }
}
