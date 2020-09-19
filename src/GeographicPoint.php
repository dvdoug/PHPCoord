<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use TypeError;

/**
 * Coordinate representing a point on an ellipsoid.
 */
class GeographicPoint extends Point
{
    /**
     * Latitude.
     * @var Angle
     */
    protected $latitude;

    /**
     * Longitude.
     * @var Angle
     */
    protected $longitude;

    /**
     * Height above ellipsoid (N.B. *not* height above ground, sea-level or anything else tangible).
     * @var ?Length
     */
    protected $height;

    /**
     * Coordinate reference system.
     * @var Geographic
     */
    protected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     * @var DateTimeImmutable
     */
    protected $epoch;

    protected function __construct(Angle $latitude, Angle $longitude, ?Length $height, Geographic $crs, ?DateTimeInterface $epoch)
    {
        if (!$crs instanceof Geographic2D && !$crs instanceof Geographic3D) {
            throw new TypeError(sprintf("A geographic point must be associated with a geographic CRS, but a '%s' CRS was given", get_class($crs)));
        }

        if ($crs instanceof Geographic2D && $height !== null) {
            throw new InvalidCoordinateReferenceSystemException('A 2D geographic point must not include a height');
        }

        if ($crs instanceof Geographic3D && $height === null) {
            throw new InvalidCoordinateReferenceSystemException('A 3D geographic point must include a height, none given');
        }

        $this->crs = $crs;

        $this->latitude = UnitOfMeasureFactory::convertAngle($latitude, $this->getAxisByName(Axis::GEODETIC_LATITUDE)->getUnitOfMeasureId());
        $this->longitude = UnitOfMeasureFactory::convertAngle($longitude, $this->getAxisByName(Axis::GEODETIC_LONGITUDE)->getUnitOfMeasureId());

        if ($height) {
            $this->height = UnitOfMeasureFactory::convertLength($height, $this->getAxisByName(Axis::ELLIPSOIDAL_HEIGHT)->getUnitOfMeasureId());
        }

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        if ($epoch) {
            $this->epoch = $epoch;
        }
    }

    /**
     * @param Angle   $latitude  refer to CRS for preferred unit of measure, but any angle unit accepted
     * @param Angle   $longitude refer to CRS for preferred unit of measure, but any angle unit accepted
     * @param ?Length $height    refer to CRS for preferred unit of measure, but any length unit accepted
     */
    public static function create(Angle $latitude, Angle $longitude, ?Length $height, Geographic $crs, ?DateTimeInterface $epoch = null): self
    {
        return new static($latitude, $longitude, $height, $crs, $epoch);
    }

    public function getLatitude(): Angle
    {
        return $this->latitude;
    }

    public function getLongitude(): Angle
    {
        return $this->longitude;
    }

    public function getHeight(): ?Length
    {
        return $this->height;
    }

    public function getCRS(): Geographic
    {
        return $this->crs;
    }

    public function getCoordinateEpoch(): ?DateTimeImmutable
    {
        return $this->epoch;
    }

    /**
     * Calculate surface distance between two points.
     */
    public function calculateDistance(Point $to): Length
    {
        if ($to->getCRS()->getEpsgCode() !== $this->crs->getEpsgCode()) {
            throw new \InvalidArgumentException('Can only calculate distances between two points in the same CRS');
        }

        //Mean radius definition taken from Wikipedia
        /** @var Ellipsoid $ellipsoid */
        $ellipsoid = $this->getCRS()->getDatum()->getEllipsoid();
        $radius = ((2 * $ellipsoid->getSemiMajorAxis()->asMetres()->getValue()) + $ellipsoid->getSemiMinorAxis()->asMetres()->getValue()) / 3;

        return new Metre(acos(sin($this->latitude->asRadians()->getValue()) * sin($to->latitude->asRadians()->getValue()) + cos($this->latitude->asRadians()->getValue()) * cos($to->latitude->asRadians()->getValue()) * cos($to->longitude->asRadians()->getValue() - $this->longitude->asRadians()->getValue())) * $radius);
    }

    public function __toString(): string
    {
        $values = [];
        foreach ($this->getCRS()->getCoordinateSystem()->getAxes() as $axis) {
            if ($axis->getName() === Axis::GEODETIC_LATITUDE) {
                $values[] = $this->latitude;
            } elseif ($axis->getName() === Axis::GEODETIC_LONGITUDE) {
                $values[] = $this->longitude;
            } elseif ($axis->getName() === Axis::ELLIPSOIDAL_HEIGHT) {
                $values[] = $this->height;
            } else {
                throw new UnknownAxisException(); // @codeCoverageIgnore
            }
        }

        return '(' . implode(', ', $values) . ')';
    }
}
