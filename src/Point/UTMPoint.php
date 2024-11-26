<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\Geometry\LinearRing;
use PHPCoord\Geometry\Polygon;
use PHPCoord\Geometry\Position;
use PHPCoord\Geometry\RegionMap;
use PHPCoord\UnitOfMeasure\Length\Length;

use function str_replace;

class UTMPoint extends ProjectedPoint
{
    public const HEMISPHERE_NORTH = 'N';

    public const HEMISPHERE_SOUTH = 'S';

    /**
     * Zone number.
     */
    protected int $zone;

    /**
     * Hemisphere (N or S).
     */
    protected string $hemisphere;

    /**
     * Base CRS.
     * @deprecated use $this->crs->getBaseCRS()
     */
    protected Geographic2D|Geographic3D $baseCRS;

    public function __construct(Geographic2D|Geographic3D $crs, Length $easting, Length $northing, int $zone, string $hemisphere, ?DateTimeInterface $epoch = null)
    {
        $this->zone = $zone;
        $this->hemisphere = $hemisphere;
        $this->baseCRS = $crs;

        $longitudeOrigin = $zone * 6 - 3;
        if ($hemisphere === self::HEMISPHERE_NORTH) {
            $boundingArea = BoundingArea::createFromPolygons(
                [
                    new Polygon(
                        new LinearRing(
                            new Position($longitudeOrigin, 0),
                            new Position($longitudeOrigin, 90),
                            new Position($longitudeOrigin + 6, 90),
                            new Position($longitudeOrigin + 6, 0),
                            new Position($longitudeOrigin, 0),
                        )
                    ),
                ],
                RegionMap::REGION_GLOBAL
            );
            $derivingConversion = 'urn:ogc:def:coordinateOperation:EPSG::' . ($zone + 16000);
        } else {
            $boundingArea = BoundingArea::createFromPolygons(
                [
                    new Polygon(
                        new LinearRing(
                            new Position($longitudeOrigin, -90),
                            new Position($longitudeOrigin, 0),
                            new Position($longitudeOrigin + 6, 0),
                            new Position($longitudeOrigin + 6, -90),
                            new Position($longitudeOrigin, -90),
                        )
                    ),
                ],
                RegionMap::REGION_GLOBAL
            );
            $derivingConversion = 'urn:ogc:def:coordinateOperation:EPSG::' . ($zone + 16100);
        }

        $srid = 'urn:ogc:def:crs,' . str_replace('urn:ogc:def:', '', $crs->getSRID()) . ',' . str_replace('urn:ogc:def:', '', Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M) . ',' . str_replace('urn:ogc:def:', '', $derivingConversion);

        $projectedCRS = new Projected(
            $srid,
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            $crs->getDatum(),
            $boundingArea,
            "{$crs->getName()} / UTM zone {$zone}{$hemisphere}",
            $crs,
            $derivingConversion
        );

        parent::__construct($projectedCRS, $easting, $northing, null, null, $epoch, null);
    }

    public function getZone(): int
    {
        return $this->zone;
    }

    public function getHemisphere(): string
    {
        return $this->hemisphere;
    }

    public function getBaseCRS(): Geographic2D|Geographic3D
    {
        return $this->crs->getBaseCRS();
    }

    public function convert(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $ignoreBoundaryRestrictions = false): Point
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
