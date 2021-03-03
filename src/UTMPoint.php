<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Geometry\GeographicPolygon;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Unity;

class UTMPoint extends ProjectedPoint
{
    public const HEMISPHERE_NORTH = 'N';

    public const HEMISPHERE_SOUTH = 'S';

    /**
     * Zone number.
     */
    protected $zone;

    /**
     * Hemisphere (N or S).
     */
    protected $hemisphere;

    /**
     * Base CRS.
     */
    protected $baseCRS;

    public function __construct(Length $easting, Length $northing, int $zone, string $hemisphere, Geographic $crs, ?DateTimeInterface $epoch = null)
    {
        $this->zone = $zone;
        $this->hemisphere = $hemisphere;
        $this->baseCRS = $crs;

        $longitudeOrigin = $zone * 6 - 3;
        if ($hemisphere === self::HEMISPHERE_NORTH) {
            $boundingBox = GeographicPolygon::createFromArray([[$longitudeOrigin, 0], [$longitudeOrigin, 90], [$longitudeOrigin + 6, 90], [$longitudeOrigin + 6, 0]], false);
        } else {
            $boundingBox = GeographicPolygon::createFromArray([[$longitudeOrigin, -90], [$longitudeOrigin, 0], [$longitudeOrigin + 6, 0], [$longitudeOrigin + 6, -90]], false);
        }

        $projectedCRS = new Projected(
            'UTM/' . $crs->getSRID(),
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            $crs->getDatum(),
            $boundingBox
        );

        parent::__construct($easting, $northing, null, null, $projectedCRS, $epoch);
    }

    public function asGeographicPoint(): GeographicPoint
    {
        $latitudeOfNaturalOrigin = new Degree(0);
        $initialLongitude = new Degree(-180);
        $scaleFactorAtNaturalOrigin = new Unity(0.9996);
        $falseEasting = new Metre(500000);
        $falseNorthing = $this->hemisphere === self::HEMISPHERE_NORTH ? new Metre(0) : new Metre(10000000);
        $longitudeOrigin = $initialLongitude->add(new Degree($this->zone * 6 - 3));

        return $this->transverseMercator($this->getBaseCRS(), $latitudeOfNaturalOrigin, $longitudeOrigin, $scaleFactorAtNaturalOrigin, $falseEasting, $falseNorthing);
    }

    public function getZone(): int
    {
        return $this->zone;
    }

    public function getHemisphere(): string
    {
        return $this->hemisphere;
    }

    public function getBaseCRS(): Geographic
    {
        return $this->baseCRS;
    }

    public function convert(CoordinateReferenceSystem $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        return $this->asGeographicPoint()->convert($to, $ignoreBoundaryRestrictions);
    }

    public function calculateDistance(Point $to): Length
    {
        if ($this->crs == $to->getCRS()) {
            return parent::calculateDistance($to);
        }

        return $this->asGeographicPoint()->calculateDistance($to);
    }

    public function __toString(): string
    {
        return $this->getZone() . $this->getHemisphere() . ' ' . (int) $this->easting->getValue() . ' ' . (int) $this->northing->getValue();
    }
}
