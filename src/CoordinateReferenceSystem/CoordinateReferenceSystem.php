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
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPCoord\Geometry\BoundingArea;

use function array_key_exists;
use function array_merge;
use function in_array;

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

    protected string $name;

    protected CoordinateSystem $coordinateSystem;

    protected Datum $datum;

    protected BoundingArea $boundingArea;

    /**
     * @var array<string, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical>
     */
    private static array $cachedObjects = [
    ];

    public function getSRID(): string
    {
        return $this->srid;
    }

    public function getName(): string
    {
        return $this->name;
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

    public static function fromSRID(string $srid): Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical
    {
        if (!isset(self::$cachedObjects[$srid])) {
            try {
                self::$cachedObjects[$srid] = Projected::fromSRID($srid);
            } catch (UnknownCoordinateReferenceSystemException) {
                try {
                    self::$cachedObjects[$srid] = Geographic2D::fromSRID($srid);
                } catch (UnknownCoordinateReferenceSystemException) {
                    try {
                        self::$cachedObjects[$srid] = Geographic3D::fromSRID($srid);
                    } catch (UnknownCoordinateReferenceSystemException) {
                        try {
                            self::$cachedObjects[$srid] = Geocentric::fromSRID($srid);
                        } catch (UnknownCoordinateReferenceSystemException) {
                            try {
                                self::$cachedObjects[$srid] = Vertical::fromSRID($srid);
                            } catch (UnknownCoordinateReferenceSystemException) {
                                try {
                                    self::$cachedObjects[$srid] = Compound::fromSRID($srid);
                                } catch (UnknownCoordinateReferenceSystemException) {
                                    throw new UnknownCoordinateReferenceSystemException($srid);
                                }
                            }
                        }
                    }
                }
            }
        }

        return self::$cachedObjects[$srid];
    }

    /**
     * If $crsSrid is an ETRS89 national realization (OSNet, AGRS2010, …), the generic ETRS89 CRS of the same type
     * (4258 / 4937 / 4936). A dynamic geodetic member is an ETRF frame and is left as itself.
     * Compounds keep the same vertical (e.g. NLD+NAP → ETRS89+NAP).
     * Reads sridData rather than fromSRID() so we don't load bounding polygons for every CRS in the graph.
     *
     * @internal
     */
    public static function getETRS89EnsembleEquivalentSRID(string $crsSrid): ?string
    {
        static $cache = [
        ];
        if (array_key_exists($crsSrid, $cache)) {
            return $cache[$crsSrid];
        }
        $equivalent = self::calculateETRS89EnsembleEquivalentSRID($crsSrid);
        if ($equivalent === $crsSrid) {
            $equivalent = null;
        }

        return $cache[$crsSrid] = $equivalent;
    }

    private static function calculateETRS89EnsembleEquivalentSRID(string $crsSrid): ?string
    {
        static $etrs89Members = null;
        $etrs89Members ??= Datum::fromSRID(Datum::EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE)->getEnsembleMembers();
        $compound = Compound::getSRIDData($crsSrid);
        if ($compound) {
            $horizontalEquivalent = self::getETRS89EnsembleEquivalentSRID($compound['horizontal_crs']);
            if (!$horizontalEquivalent) {
                return null;
            }

            return Compound::findSRIDByHorizontalAndVertical($horizontalEquivalent, $compound['vertical_crs']);
        }
        $byType = [
            Geographic2D::class => Geographic2D::EPSG_ETRS89,
            Geographic3D::class => Geographic3D::EPSG_ETRS89,
            Geocentric::class => Geocentric::EPSG_ETRS89,
        ];
        foreach ($byType as $class => $ensembleCrs) {
            $data = $class::getSRIDData($crsSrid);
            if (!$data) {
                continue;
            }

            $datum = $data['datum'];
            if (!in_array($datum, $etrs89Members, true)) {
                return null;
            }
            // ETRF frames are dynamic geodetic. Only a static national realization is rewritten onto generic ETRS89.
            if (Datum::getDatumTypeForSRID($datum) === Datum::DATUM_TYPE_DYNAMIC_GEODETIC) {
                return null;
            }

            return $ensembleCrs;
        }

        return null;
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_merge(Compound::getSupportedSRIDs(), Geocentric::getSupportedSRIDs(), Geographic2D::getSupportedSRIDs(), Geographic3D::getSupportedSRIDs(), Projected::getSupportedSRIDs(), Vertical::getSupportedSRIDs());
    }

    /**
     * @return array<string, array{name: string, extent_description: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_merge(Compound::getSupportedSRIDsWithHelp(), Geocentric::getSupportedSRIDsWithHelp(), Geographic2D::getSupportedSRIDsWithHelp(), Geographic3D::getSupportedSRIDsWithHelp(), Projected::getSupportedSRIDsWithHelp(), Vertical::getSupportedSRIDsWithHelp());
    }
}
