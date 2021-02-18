<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use function array_merge;
use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPCoord\Geometry\GeographicPolygon;

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

    public const CRS_SRID_PREFIX_EPSG = 'urn:ogc:def:crs:EPSG::';

    protected string $srid;

    protected CoordinateSystem $coordinateSystem;

    protected Datum $datum;

    protected GeographicPolygon $boundingBox;

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

    public function getBoundingBox(): GeographicPolygon
    {
        return $this->boundingBox;
    }

    public static function fromSRID(string $srid): self
    {
        if (isset(Projected::getSupportedSRIDs()[$srid])) {
            return Projected::fromSRID($srid);
        }

        if (isset(Geographic2D::getSupportedSRIDs()[$srid])) {
            return Geographic2D::fromSRID($srid);
        }

        if (isset(Geographic3D::getSupportedSRIDs()[$srid])) {
            return Geographic3D::fromSRID($srid);
        }

        if (isset(Geocentric::getSupportedSRIDs()[$srid])) {
            return Geocentric::fromSRID($srid);
        }

        if (isset(Vertical::getSupportedSRIDs()[$srid])) {
            return Vertical::fromSRID($srid);
        }

        if (isset(Compound::getSupportedSRIDs()[$srid])) {
            return Compound::fromSRID($srid);
        }

        throw new UnknownCoordinateReferenceSystemException($srid);
    }

    public static function getSupportedSRIDs(): array
    {
        return array_merge(Compound::getSupportedSRIDs(), Geocentric::getSupportedSRIDs(), Geographic2D::getSupportedSRIDs(), Geographic3D::getSupportedSRIDs(), Projected::getSupportedSRIDs(), Vertical::getSupportedSRIDs());
    }
}
