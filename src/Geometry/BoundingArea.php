<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use Composer\InstalledVersions;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\Geometry\GeoJSON\GeoJSON;
use UnhandledMatchError;

use function array_push;
use function array_unique;
use function assert;
use function count;
use function file_exists;
use function implode;
use function str_replace;
use function usort;

class BoundingArea
{
    /**
     * @var Polygon[]
     */
    protected array $polygons;

    protected string $region;

    protected bool $longitudeWrapAroundChecked = false;

    protected bool $longitudeExtendsFurtherThanMinus180 = false;

    protected bool $longitudeExtendsFurtherThanPlus180 = false;

    /**
     * @var array<string, self>
     */
    private static array $cachedObjects = [];

    /**
     * @param Polygon[] $polygons
     */
    protected function __construct(array $polygons, string $region)
    {
        // put largest polygon (outer ring size) first
        usort($polygons, static fn (Polygon $polygonA, Polygon $polygonB) => count($polygonB->coordinates[0]->coordinates) <=> count($polygonA->coordinates[0]->coordinates));
        $this->polygons = $polygons;
        $this->region = $region;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * Vertices in GeoJSON-type format (an array of polygons, which is an array of rings which is an array of long,lat points).
     * @param Polygon[]           $polygons
     * @param RegionMap::REGION_* $region
     */
    public static function createFromPolygons(array $polygons, string $region): self
    {
        return new self($polygons, $region);
    }

    public static function createWorld(): self
    {
        return new self(
            [
                new Polygon(
                    new LinearRing(
                        new Position(-180, -90),
                        new Position(-180, 90),
                        new Position(180, 90),
                        new Position(180, -90),
                        new Position(-180, -90),
                    )
                ),
            ],
            RegionMap::REGION_GLOBAL
        );
    }

    /**
     * @internal
     * @param string[] $extentCodes
     */
    public static function createFromExtentCodes(array $extentCodes, bool $boundingBoxOnly = false): self
    {
        $cacheKey = implode('|', $extentCodes) . ($boundingBoxOnly ? 'bboxOnly' : '');
        if (!isset(self::$cachedObjects[$cacheKey])) {
            $regions = [];

            /** @var Polygon[] $extents */
            $extents = [];
            foreach ($extentCodes as $extentUrn) {
                $region = RegionMap::EXTENTS[$extentUrn];
                $regions[] = $region;

                $filename = str_replace('urn:ogc:def:area:EPSG::', '', $extentUrn) . '.json';
                $pathToExtent = __DIR__ . '/Extents/BoundingBoxOnly/' . $filename;
                if (InstalledVersions::isInstalled(RegionMap::PACKAGES[$region])) {
                    $baseDir = InstalledVersions::getInstallPath(RegionMap::PACKAGES[$region]) . '/src/Geometry/Extents/';
                    if ((!$boundingBoxOnly || $region === RegionMap::REGION_GLOBAL) && file_exists($baseDir . $filename)) {
                        $pathToExtent = $baseDir . $filename;
                    }
                }

                $extent = GeoJSON::readFile($pathToExtent);
                match ($extent::class) {
                    Polygon::class => $extents[] = $extent,
                    MultiPolygon::class => array_push($extents, ...$extent->coordinates),
                    default => throw new UnhandledMatchError()
                };
            }

            assert(count(array_unique($regions)) === 1);

            /** @var RegionMap::REGION_* $region */
            $region = $regions[0];
            $extentData = self::createFromPolygons($extents, $region);

            self::$cachedObjects[$cacheKey] = $extentData;
        }

        return self::$cachedObjects[$cacheKey];
    }

    public function containsPoint(GeographicValue $point): bool
    {
        if (!$this->longitudeWrapAroundChecked) {
            $this->longitudeWrapAroundChecked = true;
            $this->checkLongitudeWrapAround();
        }

        $longitude = $point->getLongitude()->asDegrees()->getValue();
        $latitude = $point->getLatitude()->asDegrees()->getValue();

        $pointsToCheck = [
            [
                $longitude,
                $latitude,
            ],
        ];

        if ($this->longitudeExtendsFurtherThanMinus180) {
            $pointsToCheck[] = [
                $longitude - 360,
                $latitude,
            ];
        }

        if ($this->longitudeExtendsFurtherThanPlus180) {
            $pointsToCheck[] = [
                $longitude + 360,
                $latitude,
            ];
        }

        /*
         * @see https://observablehq.com/@tmcw/understanding-point-in-polygon
         */
        foreach ($pointsToCheck as $pointToCheck) {
            [$x, $y] = $pointToCheck;
            foreach ($this->polygons as $polygon) {
                $vertices = $polygon->coordinates[0]->coordinates; // this algo works on simple polygons (no holes)

                $n = count($vertices);
                $inside = false;
                for ($i = 0, $j = $n - 1; $i < $n; $j = $i++) {
                    $xi = $vertices[$i]->x;
                    $yi = $vertices[$i]->y;
                    $xj = $vertices[$j]->x;
                    $yj = $vertices[$j]->y;

                    $intersect = (($yi > $y) !== ($yj > $y)) // horizontal ray from $y, intersects if vertices are on opposite sides of it
                        && ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);
                    if ($intersect) {
                        $inside = !$inside;
                    }
                }

                if ($inside) {
                    return true;
                }
            }
        }

        return false;
    }

    private function checkLongitudeWrapAround(): void
    {
        foreach ($this->polygons as $polygon) {
            foreach ($polygon->coordinates as $ring) {
                foreach ($ring->coordinates as $vertex) {
                    if ($vertex->x >= 180) {
                        $this->longitudeExtendsFurtherThanPlus180 = true;
                    }
                    if ($vertex->x <= -180) {
                        $this->longitudeExtendsFurtherThanMinus180 = true;
                    }
                }
            }
        }
    }
}
