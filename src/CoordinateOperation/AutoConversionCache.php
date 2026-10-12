<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\Geometry\RegionMap;
use PHPCoord\UnitOfMeasure\Time\Time;

use function implode;
use function sha1;
use function sort;

/**
 * Process-wide caches for auto-conversion. Lives here rather than on the trait so all point types share one copy.
 *
 * Base graph: region files only, keyed by the set of regions (no point).
 * ETRS89 copies: Europe ops reused on generic ETRS89, bbox-filtered per point.
 * Path cache: BFS results keyed by CRS pair + which copies applied, not by coordinates.
 *
 * @internal
 */
final class AutoConversionCache
{
    /**
     * Same-datum type conversions (geocen↔geog, axis reversal, alias) are not copied onto generic ETRS89.
     *
     * @var array<string, true>
     */
    private const METHODS_NOT_APPLIED_TO_ETRS89_ENSEMBLE = [
        CoordinateOperationMethods::EPSG_ALIAS => true,
        CoordinateOperationMethods::EPSG_GEOGRAPHIC_GEOCENTRIC_CONVERSIONS => true,
        CoordinateOperationMethods::EPSG_GEOGRAPHIC3D_TO_2D_CONVERSION => true,
        CoordinateOperationMethods::EPSG_AXIS_ORDER_REVERSAL_2D => true,
        CoordinateOperationMethods::EPSG_AXIS_ORDER_REVERSAL_GEOGRAPHIC3D_HORIZONTAL => true,
    ];

    public const ETRS89_ENSEMBLE_MEMBER_ALIAS_OPERATION = 'urn:ogc:def:coordinateOperation:EPSG::32781';

    /**
     * @var array<string, array{0: array<string, array<string, string>>, 1: array<string, array<array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>>}>
     */
    private static array $baseGraphs = [];

    /**
     * @var array<int, array{id: string, operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, reversible: bool, extent: BoundingArea}>|null
     */
    private static ?array $etrs89EnsembleCandidates = null;

    /**
     * @var array<string, array<int, array{path: array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>, accuracy: float}>>
     */
    private static array $completePaths = [];

    /**
     * Transformations from the region files (no customs, no ETRS89 copies).
     * $regions must already be sorted so the cache key does not depend on source vs target order.
     *
     * @param  string[]                                                                                                                                                                                   $regions
     * @return array{0: array<string, array<string, string>>, 1: array<string, array<array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>>}
     */
    public static function getBaseGraph(array $regions): array
    {
        $key = implode('|', $regions);
        if (!isset(self::$baseGraphs[$key])) {
            $rows = [];
            foreach ($regions as $region) {
                $rows = [...$rows, ...self::loadRegion($region)];
            }
            $byCRS = [];
            $byCRSPair = [];
            foreach ($rows as $rowKey => $transformation) {
                self::indexTransformation($byCRS, $byCRSPair, (string) $rowKey, $transformation);
            }
            self::$baseGraphs[$key] = [$byCRS, $byCRSPair];
        }

        return self::$baseGraphs[$key];
    }

    /**
     * Copies of Europe operations whose source/target is an ETRS89 national realization (OSNet, AGRS2010, …),
     * rewritten onto generic ETRS89 (4258 / 4937 / 4936). Bounding boxes are stored here; whether the point
     * lies inside is tested at convert time so NADCON etc. never sees these edges.
     *
     * @return array<int, array{id: string, operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, reversible: bool, extent: BoundingArea}>
     */
    public static function getETRS89EnsembleCandidates(): array
    {
        if (self::$etrs89EnsembleCandidates !== null) {
            return self::$etrs89EnsembleCandidates;
        }

        $candidates = [];
        foreach (CRSTransformationsEurope::getSupportedTransformations() as $key => $transformation) {
            $operation = CoordinateOperations::getOperationData($transformation['operation']);
            if (isset(self::METHODS_NOT_APPLIED_TO_ETRS89_ENSEMBLE[$operation['method']])) {
                continue;
            }

            $sourceEnsemble = CoordinateReferenceSystem::getETRS89EnsembleEquivalentSRID($transformation['source_crs']);
            $targetEnsemble = CoordinateReferenceSystem::getETRS89EnsembleEquivalentSRID($transformation['target_crs']);
            if (!$sourceEnsemble && !$targetEnsemble) {
                continue;
            }

            $extent = $operation['extent'] instanceof BoundingArea ? $operation['extent'] : BoundingArea::createFromExtentCodes($operation['extent'], true);
            $method = CoordinateOperationMethods::getMethodData($operation['method']);
            $reversible = $method['reversible'];
            // A published year belongs to the named frame. That end is not renamed onto generic ETRS89.
            // An input copy whose input year is published does not run backwards, or that year would land there.
            $sourceYearFixed = false;
            $targetYearFixed = false;
            if (isset($method['paramData']['sourceEpoch']) || isset($method['paramData']['targetEpoch'])) {
                $epochs = CoordinateOperations::getParamData($transformation['operation']);
                $sourceYearFixed = self::epochIsFixedYear($epochs, 'sourceEpoch');
                $targetYearFixed = self::epochIsFixedYear($epochs, 'targetEpoch');
            }

            if ($sourceEnsemble) {
                $copy = [...$transformation, 'source_crs' => $sourceEnsemble];
                $candidates[] = [
                    'id' => $key . '|ensemble-source',
                    'operation' => $copy['operation'],
                    'name' => $copy['name'],
                    'source_crs' => $copy['source_crs'],
                    'target_crs' => $copy['target_crs'],
                    'accuracy' => $copy['accuracy'],
                    'reversible' => $reversible && !$sourceYearFixed,
                    'extent' => $extent,
                ];
            }
            if ($targetEnsemble && !$targetYearFixed) {
                $copy = [...$transformation, 'target_crs' => $targetEnsemble];
                $candidates[] = [
                    'id' => $key . '|ensemble-target',
                    'operation' => $copy['operation'],
                    'name' => $copy['name'],
                    'source_crs' => $copy['source_crs'],
                    'target_crs' => $copy['target_crs'],
                    'accuracy' => $copy['accuracy'],
                    'reversible' => $reversible,
                    'extent' => $extent,
                ];
            }
            if ($sourceEnsemble && $targetEnsemble && $sourceEnsemble !== $targetEnsemble && !$targetYearFixed) {
                $copy = [...$transformation, 'source_crs' => $sourceEnsemble, 'target_crs' => $targetEnsemble];
                $candidates[] = [
                    'id' => $key . '|ensemble-both',
                    'operation' => $copy['operation'],
                    'name' => $copy['name'],
                    'source_crs' => $copy['source_crs'],
                    'target_crs' => $copy['target_crs'],
                    'accuracy' => $copy['accuracy'],
                    'reversible' => $reversible,
                    'extent' => $extent,
                ];
            }
        }

        return self::$etrs89EnsembleCandidates = $candidates;
    }

    /**
     * @param array<string, mixed> $params
     */
    private static function epochIsFixedYear(array $params, string $name): bool
    {
        $epoch = $params[$name] ?? null;
        if (!$epoch instanceof Time) {
            return false;
        }

        // -999 means the year already on the point.
        return $epoch->asYears()->getValue() !== -999.0;
    }

    /**
     * Add a transformation to the CRS adjacency list and the per-pair operation list.
     * ETRS89 member→ensemble aliases (32781) are one-way; everything else follows the method's reversible flag.
     *
     * @param array<string, array<string, string>>                                                                                                    $byCRS
     * @param array<string, array<array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>> $byCRSPair
     * @param array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float}                                         $transformation
     */
    public static function indexTransformation(array &$byCRS, array &$byCRSPair, string $key, array $transformation, ?bool $reversible = null): void
    {
        $oneWay = $transformation['operation'] === self::ETRS89_ENSEMBLE_MEMBER_ALIAS_OPERATION;
        if ($oneWay) {
            $reversible = false;
        } elseif ($reversible === null) {
            $operation = CoordinateOperations::getOperationData($transformation['operation']);
            $reversible = CoordinateOperationMethods::getMethodData($operation['method'])['reversible'];
        }

        $byCRS[$transformation['source_crs']][$transformation['target_crs']] ??= $transformation['target_crs'];
        $byCRSPair[$transformation['source_crs'] . '|' . $transformation['target_crs']][$key] = $transformation;
        $byCRSPair[$transformation['source_crs'] . '|' . $transformation['target_crs']][$key]['in_reverse'] = false;

        if (!$reversible) {
            return;
        }

        $byCRS[$transformation['target_crs']][$transformation['source_crs']] ??= $transformation['source_crs'];
        $byCRSPair[$transformation['target_crs'] . '|' . $transformation['source_crs']][$key] = $transformation;
        $byCRSPair[$transformation['target_crs'] . '|' . $transformation['source_crs']][$key]['in_reverse'] = true;
    }

    /**
     * Path-cache key. Overlay ids are which ETRS89 copies were applied; empty overlay (e.g. NAD83) is just source|target.
     * $boundaryFingerprint is `off` when the search is not filtered, otherwise a sha1 of the operations the point kept.
     * Coordinates are not included. Points that keep the same operations share an entry.
     * Depth is included — a longer chain can be more accurate, so a deeper search must not satisfy a shallower one.
     *
     * @param string[] $overlayIds
     */
    public static function pathCacheKey(string $sourceSRID, string $targetSRID, array $overlayIds, int $customCount, int $maxChainDepth, string $boundaryFingerprint): string
    {
        sort($overlayIds);

        return $sourceSRID . '|' . $targetSRID . '|' . sha1(implode("\n", $overlayIds)) . '|' . $boundaryFingerprint . '|' . $customCount . '|' . $maxChainDepth;
    }

    /**
     * @return array<int, array{path: array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>, accuracy: float}>|null
     */
    public static function getCachedPaths(string $pathKey): ?array
    {
        return self::$completePaths[$pathKey] ?? null;
    }

    /**
     * @param array<int, array{path: array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>, accuracy: float}> $paths
     */
    public static function setCachedPaths(string $pathKey, array $paths): void
    {
        self::$completePaths[$pathKey] = $paths;
    }

    /**
     * @return array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float}>
     */
    private static function loadRegion(string $region): array
    {
        return match ($region) {
            RegionMap::REGION_GLOBAL => CRSTransformationsGlobal::getSupportedTransformations(),
            RegionMap::REGION_AFRICA => CRSTransformationsAfrica::getSupportedTransformations(),
            RegionMap::REGION_ANTARCTIC => CRSTransformationsAntarctic::getSupportedTransformations(),
            RegionMap::REGION_ARCTIC => CRSTransformationsArctic::getSupportedTransformations(),
            RegionMap::REGION_ASIA => CRSTransformationsAsia::getSupportedTransformations(),
            RegionMap::REGION_EUROPE => CRSTransformationsEurope::getSupportedTransformations(),
            RegionMap::REGION_NORTHAMERICA => CRSTransformationsNorthAmerica::getSupportedTransformations(),
            RegionMap::REGION_OCEANIA => CRSTransformationsOceania::getSupportedTransformations(),
            RegionMap::REGION_SOUTHAMERICA => CRSTransformationsSouthAmerica::getSupportedTransformations(),
            default => throw new UnknownConversionException('Unknown region: ' . $region),
        };
    }
}
