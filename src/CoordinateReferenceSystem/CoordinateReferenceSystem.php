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
use PHPCoord\Geometry\BoundingArea;

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

    protected $srid;

    protected $coordinateSystem;

    protected $datum;

    protected $boundingArea;

    private static $cachedObjects = [];

    private static $supportedCache = [];

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

    public function getBoundingArea(): BoundingArea
    {
        return $this->boundingArea;
    }

    public static function fromSRID(string $srid)
    {
        if (!isset(self::$cachedObjects[$srid])) {
            if (isset(Projected::getSupportedSRIDs()[$srid])) {
                self::$cachedObjects[$srid] = Projected::fromSRID($srid);
            } elseif (isset(Geographic2D::getSupportedSRIDs()[$srid])) {
                self::$cachedObjects[$srid] = Geographic2D::fromSRID($srid);
            } elseif (isset(Geographic3D::getSupportedSRIDs()[$srid])) {
                self::$cachedObjects[$srid] = Geographic3D::fromSRID($srid);
            } elseif (isset(Geocentric::getSupportedSRIDs()[$srid])) {
                self::$cachedObjects[$srid] = Geocentric::fromSRID($srid);
            } elseif (isset(Vertical::getSupportedSRIDs()[$srid])) {
                self::$cachedObjects[$srid] = Vertical::fromSRID($srid);
            } elseif (isset(Compound::getSupportedSRIDs()[$srid])) {
                self::$cachedObjects[$srid] = Compound::fromSRID($srid);
            }
        }

        return self::$cachedObjects[$srid];
    }

    public static function getSupportedSRIDs(): array
    {
        if (!self::$supportedCache) {
            self::$supportedCache = array_merge(Compound::getSupportedSRIDs(), Geocentric::getSupportedSRIDs(), Geographic2D::getSupportedSRIDs(), Geographic3D::getSupportedSRIDs(), Projected::getSupportedSRIDs(), Vertical::getSupportedSRIDs());
        }

        return self::$supportedCache;
    }
}
