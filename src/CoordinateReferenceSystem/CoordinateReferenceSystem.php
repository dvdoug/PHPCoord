<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

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

    protected string $srid;

    protected CoordinateSystem $coordinateSystem;

    protected Datum $datum;

    protected BoundingArea $boundingArea;

    private static array $cachedObjects = [];

    private static array $sridCache = [];

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

    public static function fromSRID(string $srid): self
    {
        if (!self::$sridCache) {
            self::$sridCache['projected'] = Projected::getSupportedSRIDs();
            self::$sridCache['geographic2d'] = Geographic2D::getSupportedSRIDs();
            self::$sridCache['geographic3d'] = Geographic3D::getSupportedSRIDs();
            self::$sridCache['geocentric'] = Geocentric::getSupportedSRIDs();
            self::$sridCache['vertical'] = Vertical::getSupportedSRIDs();
            self::$sridCache['compound'] = Compound::getSupportedSRIDs();
        }

        if (!isset(self::$cachedObjects[$srid])) {
            if (isset(self::$sridCache['projected'][$srid])) {
                self::$cachedObjects[$srid] = Projected::fromSRID($srid);
            } elseif (isset(self::$sridCache['geographic2d'][$srid])) {
                self::$cachedObjects[$srid] = Geographic2D::fromSRID($srid);
            } elseif (isset(self::$sridCache['geographic3d'][$srid])) {
                self::$cachedObjects[$srid] = Geographic3D::fromSRID($srid);
            } elseif (isset(self::$sridCache['geocentric'][$srid])) {
                self::$cachedObjects[$srid] = Geocentric::fromSRID($srid);
            } elseif (isset(self::$sridCache['vertical'][$srid])) {
                self::$cachedObjects[$srid] = Vertical::fromSRID($srid);
            } elseif (isset(self::$sridCache['compound'][$srid])) {
                self::$cachedObjects[$srid] = Compound::fromSRID($srid);
            }
        }

        return self::$cachedObjects[$srid];
    }
}
