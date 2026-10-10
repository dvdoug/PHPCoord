<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\Point\CompoundPoint;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\Point\GeocentricPoint;
use PHPCoord\Point\GeographicPoint;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\Geometry\RegionMap;
use PHPCoord\Point\Point;
use PHPCoord\Point\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Time\Time;
use PHPCoord\UnitOfMeasure\Time\Year;
use PHPCoord\Point\VerticalPoint;

use function array_column;
use function array_map;
use function array_shift;
use function array_sum;
use function sqrt;
use function array_unique;
use function array_values;
use function assert;
use function class_exists;
use function count;
use function in_array;
use function is_string;
use function sort;
use function str_ends_with;
use function usort;
use function is_array;
use function implode;
use function array_key_last;

/**
 * @internal
 */
trait AutoConversion
{
    /**
     * @return ($to is Compound ? CompoundPoint : ($to is Geocentric ? GeocentricPoint : ($to is Geographic ? GeographicPoint : ($to is Projected ? ProjectedPoint : ($to is Vertical ? VerticalPoint: Point)))))
     */
    public function convert(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $ignoreBoundaryRestrictions = false, ?DateTimeInterface $epoch = null, ?int $maxChainDepth = null): Point
    {
        if ($this->getCRS() == $to) {
            if ($epoch) {
                throw new InvalidCoordinateException('Changing epoch inside the same CRS requires atEpoch(), not convert(..., epoch:)');
            }

            return $this;
        }

        if ($epoch && !$this->getCoordinateEpoch()) {
            throw new InvalidCoordinateException('Changing epoch requires a coordinate epoch on the point, none given');
        }

        // Aim at epoch if given, otherwise keep the date already on the point.
        $pointEpoch = $this->getCoordinateEpoch();
        $sourceEpoch = $pointEpoch ? Year::fromDateTime($pointEpoch) : null;
        $targetEpoch = $epoch ? Year::fromDateTime($epoch) : $sourceEpoch;

        $path = $this->findOperationPath($this->getCRS(), $to, $ignoreBoundaryRestrictions, $sourceEpoch, $targetEpoch, $maxChainDepth);

        $point = $this;
        foreach ($path as $step) {
            // Before this hop: its source year, or the target epoch ahead of the first hop. After the last hop: the target epoch when the chain landed elsewhere.
            if ($step['slideBefore']) {
                $point = $point->atEpoch($step['slideBefore']->asDateTime());
            }
            $target = CoordinateReferenceSystem::fromSRID($step['in_reverse'] ? $step['source_crs'] : $step['target_crs']);
            $point = $point->performOperation($step['operation'], $target, $step['in_reverse'], new Metre($step['accuracy']));
            if ($step['slideAfter']) {
                $point = $point->atEpoch($step['slideAfter']->asDateTime());
            }
        }

        return $point;
    }

    /**
     * Change coordinate epoch inside this CRS using a point-motion velocity grid when EPSG has one.
     */
    public function atEpoch(DateTimeInterface $targetEpoch): Point
    {
        if (!$this->getCoordinateEpoch()) {
            throw new InvalidCoordinateException('Point motion requires a coordinate epoch, none given');
        }

        // Points take dates; the velocity calculation uses decimal years.
        $targetYear = Year::fromDateTime($targetEpoch);

        if ($this instanceof CompoundPoint) {
            $movedHorizontal = $this->getHorizontalPoint()->atEpoch($targetEpoch);
            assert($movedHorizontal instanceof GeographicPoint || $movedHorizontal instanceof ProjectedPoint);

            return CompoundPoint::create($this->getCRS(), $movedHorizontal, $this->getVerticalPoint(), $targetYear->asDateTime(), $this->getAccuracy());
        }

        $operation = $this->lookupPointMotionOperation($this->getCRS());
        if (!$operation) {
            throw new UnknownConversionException('No point motion operation is available for this CRS');
        }
        $operationData = CoordinateOperations::getOperationData($operation['operation']);
        if ($operationData['method'] === CoordinateOperationMethods::EPSG_POINT_MOTION_GEOCEN_DOMAIN_USING_XYZ_VELOCITY_GRID_BGN) {
            // Velocities are geocentric. Sample in that frame, then return to the original CRS.
            $geocentricCrs = Geocentric::fromSRID($operation['source_crs']);
            if ($this instanceof GeocentricPoint && $this->getCRS()->getSRID() === $geocentricCrs->getSRID()) {
                $geocentric = $this;
            } elseif ($this instanceof GeocentricPoint) {
                $geocentric = GeocentricPoint::create($geocentricCrs, $this->getX(), $this->getY(), $this->getZ(), $this->getCoordinateEpoch());
            } else {
                $geocentric = $this->geographic3DForPointMotion()->geographicGeocentric($geocentricCrs);
            }
            $moved = $geocentric->performOperation(
                $operation['operation'],
                $geocentricCrs,
                false,
                new Metre($operation['accuracy']),
                ['targetEpoch' => $targetYear]
            );
            assert($moved instanceof GeocentricPoint);

            if ($this->getCRS() == $moved->getCRS()) {
                return $moved;
            }

            // Keep the date just stamped; do not re-enter convert(..., epoch:).
            return $moved->convert($this->getCRS());
        }

        $geographic = $this->geographic3DForPointMotion();
        $moved = $geographic->performOperation(
            $operation['operation'],
            $geographic->getCRS(),
            false,
            new Metre($operation['accuracy']),
            ['targetEpoch' => $targetYear]
        );
        assert($moved instanceof GeographicPoint);

        if ($this->getCRS() == $moved->getCRS()) {
            return $moved;
        }

        // Keep the date just stamped; do not re-enter convert(..., epoch:).
        return $moved->convert($this->getCRS());
    }

    /**
     * Point-motion op for this datum, or null if none (or the grid datapack is not installed).
     *
     * @return array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float}|null
     */
    private function lookupPointMotionOperation(CoordinateReferenceSystem $crs): ?array
    {
        if ($crs instanceof Compound) {
            $crs = $crs->getHorizontal();
        }

        $crsSrid = $crs->getSRID();
        $datum = $crs->getDatum();

        $exact = [];
        $sameDatum = [];
        foreach ($this->pointMotionOperations() as $transformation) {
            $sourceCrs = CoordinateReferenceSystem::fromSRID($transformation['source_crs']);
            if ($transformation['source_crs'] === $crsSrid) {
                $exact[] = $transformation;
            } elseif ($sourceCrs->getDatum()->getSRID() === $datum->getSRID()) {
                $sameDatum[] = $transformation;
            }
        }

        $match = $exact[0] ?? $sameDatum[0] ?? null;
        if (!$match) {
            return null;
        }

        foreach (CoordinateOperations::getParamData($match['operation']) as $paramName => $paramValue) {
            if (str_ends_with($paramName, 'File') && is_string($paramValue) && !class_exists($paramValue)) {
                return null;
            }
        }

        return $match;
    }

    /**
     * @return list<array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float}>
     */
    private function pointMotionOperations(): array
    {
        static $ops = null;
        if ($ops !== null) {
            return $ops;
        }

        $ops = [];
        foreach ([
            RegionMap::REGION_GLOBAL => CRSTransformationsGlobal::class,
            RegionMap::REGION_AFRICA => CRSTransformationsAfrica::class,
            RegionMap::REGION_ANTARCTIC => CRSTransformationsAntarctic::class,
            RegionMap::REGION_ARCTIC => CRSTransformationsArctic::class,
            RegionMap::REGION_ASIA => CRSTransformationsAsia::class,
            RegionMap::REGION_EUROPE => CRSTransformationsEurope::class,
            RegionMap::REGION_NORTHAMERICA => CRSTransformationsNorthAmerica::class,
            RegionMap::REGION_OCEANIA => CRSTransformationsOceania::class,
            RegionMap::REGION_SOUTHAMERICA => CRSTransformationsSouthAmerica::class,
        ] as $class) {
            foreach ($class::getSupportedTransformations() as $transformation) {
                if ($transformation['source_crs'] !== $transformation['target_crs']) {
                    continue;
                }
                $operation = CoordinateOperations::getOperationData($transformation['operation']);
                if (
                    $operation['method'] === CoordinateOperationMethods::EPSG_POINT_MOTION_GEOG3D_DOMAIN_USING_NEU_VELOCITY_GRID_NTV2_VEL
                    || $operation['method'] === CoordinateOperationMethods::EPSG_POINT_MOTION_GEOG3D_DOMAIN_USING_NEU_VELOCITY_GRID_GTG
                    || $operation['method'] === CoordinateOperationMethods::EPSG_POINT_MOTION_GEOCEN_DOMAIN_USING_XYZ_VELOCITY_GRID_BGN
                ) {
                    $ops[] = $transformation;
                }
            }
        }

        return $ops;
    }

    protected function geographic3DForPointMotion(): GeographicPoint
    {
        throw new UnknownConversionException('No point motion operation is available for this CRS');
    }

    protected function geographic3DCRSForDatum(Datum $datum): Geographic3D
    {
        static $byDatum = [];
        $key = $datum->getSRID();
        if (!isset($byDatum[$key])) {
            foreach (Geographic3D::getSupportedSRIDs() as $srid => $name) {
                $crs = Geographic3D::fromSRID($srid);
                if ($crs->getDatum()->getSRID() === $key) {
                    $byDatum[$key] = $crs;
                    break;
                }
            }
        }

        if (!isset($byDatum[$key])) {
            throw new UnknownConversionException('No geographic 3D CRS is available for this datum');
        }

        return $byDatum[$key];
    }

    /**
     * Calculates if the point as constructed actually lies within the bounding box of the CRS.
     */
    public function isWithinCRSBoundingArea(): bool
    {
        $pointAsWGS84 = $this->getPointForBoundaryCheck(); // some obscure CRSs might not be able to convert

        return !$pointAsWGS84 instanceof GeographicValue || $this->crs->getBoundingArea()->containsPoint($pointAsWGS84);
    }

    /**
     * @return array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool, slideBefore: Year|null, slideAfter: Year|null}>
     */
    protected function findOperationPath(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $source, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target, bool $ignoreBoundaryRestrictions, ?Time $sourceEpoch = null, ?Time $targetEpoch = null, ?int $maxChainDepth = null): array
    {
        $boundaryCheckPoint = $ignoreBoundaryRestrictions ? null : $this->getPointForBoundaryCheck();
        $extentPoint = $boundaryCheckPoint ?? $this->getApproximatePointForExtentCheck();

        // Iteratively calculate permutations of intermediate CRSs
        $candidatePaths = $this->buildTransformationPathsToCRS($source, $target, $extentPoint, $maxChainDepth);
        usort($candidatePaths, static fn (array $a, array $b) => $a['accuracy'] <=> $b['accuracy'] ?: count($a['path']) <=> count($b['path']));

        $publishedYears = [];
        foreach ($candidatePaths as $candidatePath) {
            $result = $this->validatePathForPoint($candidatePath['path'], $source, $target, $boundaryCheckPoint, $targetEpoch);
            if (is_array($result)) {
                return $result;
            }
            if ($result instanceof Year) {
                $publishedYears[] = $result->getValue();
            }
        }

        if ($publishedYears) {
            throw new UnknownConversionException('Unable to convert to the requested epoch. A conversion at epoch(s) ' . implode(', ', array_unique($publishedYears)) . ' is available');
        }

        // Requested year differs from the point's year, and neither CRS can slide.
        if ($sourceEpoch && $targetEpoch && $sourceEpoch->asYears() != $targetEpoch->asYears() && !$this->lookupPointMotionOperation($source) && !$this->lookupPointMotionOperation($target)) {
            throw new UnknownConversionException('Unable to convert to the requested epoch. Neither CRS has a point-motion operation');
        }

        throw new UnknownConversionException('Unable to perform conversion, please file a bug if you think this is incorrect');
    }

    /**
     * @return array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool, slideBefore: Year|null, slideAfter: Year|null}>|Year|null
     */
    protected function validatePathForPoint(
        array $candidatePath,
        CoordinateReferenceSystem $source,
        Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target,
        ?GeographicValue $boundaryCheckPoint,
        ?Time $targetEpoch,
    ): array|Year|null {
        $currentCRS = $source;
        $currentEpoch = $this->getCoordinateEpoch() ? Year::fromDateTime($this->getCoordinateEpoch()) : null;
        $slideBefore = [];
        $containsEpochChange = false;
        $validAtCurrentEpoch = true;
        $validAtTargetEpoch = true;
        foreach ($candidatePath as $pathStep) {
            if (isset(self::METHODS_REQUIRING_EPOCH_CHANGE[CoordinateOperations::getOperationData($pathStep['operation'])['method']])) {
                $containsEpochChange = true;
                break;
            }
        }

        foreach ($candidatePath as $i => $pathStep) {
            $operation = CoordinateOperations::getOperationData($pathStep['operation']);

            if ($boundaryCheckPoint) { // Filter out operations that only operate outside this point
                // First, eliminate based on bounding box if possible, that's quicker as only 4 corners
                if (!$operation['extent'] instanceof BoundingArea) {
                    $bbox = BoundingArea::createFromExtentCodes($operation['extent'], true);
                    if (!$bbox->containsPoint($boundaryCheckPoint)) {
                        return null;
                    }
                }

                // Then (or only) check the point is inside the full, complex shape
                $polygon = $operation['extent'] instanceof BoundingArea ? $operation['extent'] : BoundingArea::createFromExtentCodes($operation['extent']);
                if ((!isset($bbox) || $polygon !== $bbox) && !$polygon->containsPoint($boundaryCheckPoint)) {
                    return null;
                }
            }

            // filter out operations that use a 2D CRS as intermediate where this is a 3D point
            $pointCRS = $this->getCRS();
            if ($pointCRS instanceof Compound || count($pointCRS->getCoordinateSystem()->getAxes()) === 3) {
                if ($target instanceof Compound || count($target->getCoordinateSystem()->getAxes()) !== 2) {
                    $intermediateTarget = CoordinateReferenceSystem::fromSRID($pathStep['in_reverse'] ? $pathStep['source_crs'] : $pathStep['target_crs']);
                    if (!$intermediateTarget instanceof Compound && count($intermediateTarget->getCoordinateSystem()->getAxes()) === 2) {
                        return null;
                    }
                }
            }

            $operationParams = CoordinateOperations::getParamData($pathStep['operation']);

            // filter out operations that require a grid file that we don't have, or where boundaries are not being
            // checked (a formula-based conversion will always return *a* result, outside a grid boundary does not...)
            foreach ($operationParams as $paramName => $paramValue) {
                if (str_ends_with($paramName, 'File') && is_string($paramValue) && (!$boundaryCheckPoint || !class_exists($paramValue))) {
                    return null;
                }
            }

            // filter out operations that need point motion that isn't possible in this combination
            if (isset(self::METHODS_REQUIRING_EPOCH_CHANGE[$operation['method']])) {
                // inReverse exchanges the years inside the method; the stored parameters stay forward.
                if (isset($operationParams['sourceEpoch']) || isset($operationParams['targetEpoch'])) {
                    /** @var Year $stepSourceEpoch */
                    $stepSourceEpoch = $pathStep['in_reverse'] ? $operationParams['targetEpoch'] : $operationParams['sourceEpoch'];
                    /** @var Year $stepTargetEpoch */
                    $stepTargetEpoch = $pathStep['in_reverse'] ? $operationParams['sourceEpoch'] : $operationParams['targetEpoch'];
                } else {
                    // The operation does not carry years. They are the two datums' anchor epochs.
                    $sourceAnchor = CoordinateReferenceSystem::fromSRID($pathStep['source_crs'])->getDatum()->getAnchorEpoch();
                    $targetAnchor = CoordinateReferenceSystem::fromSRID($pathStep['target_crs'])->getDatum()->getAnchorEpoch();
                    if (!$sourceAnchor || !$targetAnchor) {
                        return null;
                    }
                    $stepSourceEpoch = $pathStep['in_reverse'] ? $targetAnchor : $sourceAnchor;
                    $stepTargetEpoch = $pathStep['in_reverse'] ? $sourceAnchor : $targetAnchor;
                }
                $sentinelSource = $this->isUserDefinedEpoch($stepSourceEpoch);
                $slideToSourceYear = !$sentinelSource && $currentEpoch != $stepSourceEpoch->asYears();
                if ($sentinelSource && !$currentEpoch) {
                    return null;  // No epoch, no point motion
                }
                if ($slideToSourceYear && !$this->lookupPointMotionOperation($currentCRS)) {
                    return null; // No point motion available
                }
                if ($slideToSourceYear) {
                    $slideBefore[$i] = $stepSourceEpoch->asYears();
                    $currentEpoch = $stepSourceEpoch->asYears();
                }

                $currentEpoch = $this->isUserDefinedEpoch($stepTargetEpoch) ? $currentEpoch : $stepTargetEpoch->asYears();
            } elseif ($containsEpochChange && isset($operationParams['transformationReferenceEpoch'])) { // this step is only valid at one date
                $referenceYear = $operationParams['transformationReferenceEpoch']->asYears();
                if ($currentEpoch != $referenceYear) {
                    // Other step(s) have epoch changes that conflict
                    return null;
                }
            } elseif (isset($operationParams['transformationReferenceEpoch'])) { // this step is only valid at one date
                $referenceYear = $operationParams['transformationReferenceEpoch']->asYears();
                if ($currentEpoch != $referenceYear) { // point's year is not that date
                    if (!$targetEpoch || $currentEpoch == $targetEpoch->asYears()) {
                        return null; // so no plan B if none was named, or the named year is already the point's year.
                    }
                    $validAtCurrentEpoch = false; // we might be able to change epoch though, checked later
                }
                if ($targetEpoch && $targetEpoch->asYears() != $referenceYear) {
                    $validAtTargetEpoch = false; // we might be able to change epoch though, checked later
                }
            }

            $currentCRS = CoordinateReferenceSystem::fromSRID($pathStep['in_reverse'] ? $pathStep['source_crs'] : $pathStep['target_crs']);
        }

        $slideAfter = null;
        if ($containsEpochChange) {
            $missesTargetYear = $targetEpoch && $currentEpoch != $targetEpoch->asYears();
            if ($missesTargetYear && $this->lookupPointMotionOperation($target)) {
                // changing CRS gives us the wrong epoch, but we can slide to the target epoch afterwards
                $slideAfter = $targetEpoch->asYears();
            } elseif ($missesTargetYear) {
                // There's a potential chain but only at the fixed epoch the CRS conversion targets. Return that year to caller
                return $currentEpoch;
            }
        } elseif ($targetEpoch && $currentEpoch != $targetEpoch->asYears()) {
            if ($validAtTargetEpoch && $this->lookupPointMotionOperation($source)) {
                // Valid if we can change to required epoch before the path starts, else no
                $slideBefore = [0 => $targetEpoch->asYears()];
            } elseif ($validAtCurrentEpoch && $this->lookupPointMotionOperation($target)) {
                // Or convert at the point's date, then slide to the target epoch after the last hop.
                $slideAfter = $targetEpoch->asYears();
            } else {
                return null; // Neither year is one this chain can run at
            }
        }

        $last = array_key_last($candidatePath);
        foreach ($candidatePath as $i => $step) {
            $candidatePath[$i]['slideBefore'] = $slideBefore[$i] ?? null;
            $candidatePath[$i]['slideAfter'] = $i === $last ? $slideAfter : null;
        }

        return $candidatePath;
    }

    /**
     * Build the set of possible paths that lead from the current CRS to the target CRS.
     * @return array<int, array{path: array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>, accuracy: float}>
     */
    protected function buildTransformationPathsToCRS(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $source, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target, GeographicValue $extentPoint, ?int $maxChainDepth = null): array
    {
        $sourceSRID = $source->getSRID();
        $targetSRID = $target->getSRID();
        $regions = array_values(array_unique([$source->getBoundingArea()->getRegion(), $target->getBoundingArea()->getRegion(), RegionMap::REGION_GLOBAL]));
        sort($regions); // stable graph-cache key: BNG→WGS84 and WGS84→BNG load the same files

        $customTransformations = CoordinateOperations::getCustomTransformations();
        $overlayIds = [];
        $appliedCandidates = [];
        if (in_array(RegionMap::REGION_EUROPE, $regions, true)) {
            // Fingerprint only — do not copy/index the graph until we know this is a path-cache miss
            foreach (AutoConversionCache::getETRS89EnsembleCandidates() as $candidate) {
                if (!$candidate['extent']->containsPoint($extentPoint)) {
                    continue;
                }
                $overlayIds[] = $candidate['id'];
                $appliedCandidates[] = $candidate;
            }
        }

        // A depth of 6 allows a chain to pass through a geocentric hub. If we are already
        // starting or finishing at one, that budget is not needed.
        $maxChainDepth ??= ($source instanceof Geocentric || $target instanceof Geocentric) ? 4 : 6;

        $pathKey = AutoConversionCache::pathCacheKey($sourceSRID, $targetSRID, $overlayIds, count($customTransformations), $maxChainDepth);
        $cached = AutoConversionCache::getCachedPaths($pathKey);
        if ($cached !== null) {
            return $cached;
        }

        [$baseByCRS, $baseByCRSPair] = AutoConversionCache::getBaseGraph($regions);
        $transformationsByCRS = [...$baseByCRS]; // copy so overlays cannot pollute the cached graph
        $transformationsByCRSPair = [...$baseByCRSPair];

        // Customs are not stored in the base graph — GIGS registers them immediately before convert()
        foreach ($customTransformations as $customKey => $transformation) {
            AutoConversionCache::indexTransformation($transformationsByCRS, $transformationsByCRSPair, 'custom-' . $customKey, $transformation);
        }
        foreach ($appliedCandidates as $candidate) {
            AutoConversionCache::indexTransformation(
                $transformationsByCRS,
                $transformationsByCRSPair,
                $candidate['id'],
                [
                    'operation' => $candidate['operation'],
                    'name' => $candidate['name'],
                    'source_crs' => $candidate['source_crs'],
                    'target_crs' => $candidate['target_crs'],
                    'accuracy' => $candidate['accuracy'],
                ],
                $candidate['reversible'],
            );
        }

        $iterations = 0;
        $previousSimplePaths = [[$sourceSRID]];
        $completePaths = [];
        while ($iterations < $maxChainDepth) {
            $simplePaths = [];
            foreach ($previousSimplePaths as $simplePath) {
                $current = $simplePath[$iterations];
                if ($current === $targetSRID) {
                    $completePaths[] = $simplePath;
                } elseif (isset($transformationsByCRS[$current])) {
                    foreach ($transformationsByCRS[$current] as $next) {
                        if (!in_array($next, $simplePath, true)) {
                            $simplePaths[] = [...$simplePath, $next];
                        }
                    }
                }
            }

            $previousSimplePaths = $simplePaths;
            ++$iterations;
        }
        foreach ($previousSimplePaths as $simplePath) {
            if ($simplePath[$iterations] === $targetSRID) {
                $completePaths[] = $simplePath;
            }
        }

        // Then expand each CRS->CRS permutation with the various ways of achieving that (can be lots :/)
        $paths = [];
        $fullPaths = $this->expandSimplePaths($transformationsByCRSPair, $completePaths, $sourceSRID, $targetSRID);
        foreach ($fullPaths as $fullPath) {
            $paths[] = [
                'path' => $fullPath,
                'accuracy' => sqrt(array_sum(array_map(
                    static fn (float $accuracy): float => $accuracy ** 2,
                    array_column($fullPath, 'accuracy'),
                ))),
            ];
        }

        AutoConversionCache::setCachedPaths($pathKey, $paths);

        return $paths;
    }

    /**
     * @param  array<string, array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>> $transformationsByCRSPair
     * @param  array<int, array<int, string>>                                                                                                               $simplePaths
     * @return array<int, array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float, in_reverse: bool}>>
     */
    protected function expandSimplePaths(array $transformationsByCRSPair, array $simplePaths, string $fromSRID, string $toSRID): array
    {
        $fullPaths = [];
        foreach ($simplePaths as $simplePath) {
            $transformationsToMakePath = [[]];
            $from = array_shift($simplePath);
            assert($from === $fromSRID);
            do {
                $to = array_shift($simplePath);
                $wipTransformationsInPath = [];
                foreach ($transformationsByCRSPair[$from . '|' . $to] ?? [] as $transformation) {
                    foreach ($transformationsToMakePath as $transformationToMakePath) {
                        $wipTransformationsInPath[] = [...$transformationToMakePath, $transformation];
                    }
                }

                $transformationsToMakePath = $wipTransformationsInPath;
                $from = $to;
            } while (count($simplePath) > 0);
            assert($to === $toSRID);

            foreach ($transformationsToMakePath as $transformationToMakePath) {
                $fullPaths[] = $transformationToMakePath;
            }
        }

        return $fullPaths;
    }

    private function isUserDefinedEpoch(Time $epoch): bool
    {
        return $epoch->asYears()->getValue() === -999.0; // EPSG sentinel, not a year
    }

    /**
     * Boundary polygons are defined as WGS84, so theoretically all that needs to happen is
     * to conversion to WGS84 by calling ->convert(). However, that leads quickly to either circularity
     * when a conversion is possible, or an exception because not every CRS has a WGS84 transformation
     * available to it even when chaining.
     */
    protected function getPointForBoundaryCheck(): ?GeographicValue
    {
        if ($this instanceof CompoundPoint) {
            $point = $this->getHorizontalPoint();
        } else {
            $point = $this;
        }

        // convert(WGS84) from a geocentric hub is a full ITRF/ETRF graph search; ellipsoid is within the ≈1 km box.
        if ($point instanceof GeocentricPoint) {
            return $this->getApproximatePointForExtentCheck();
        }

        try {
            // try converting to WGS84 if possible...
            return $point->convert(Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84), true)->asGeographicValue();
        } catch (UnknownConversionException) {
            /*
             * If Projected then either the point is inside the boundary by definition
             * or the user is deliberately exceeding the safe zone so safe to make a no-op either way.
             */
            if ($point instanceof ProjectedPoint) {
                return null;
            }

            /*
             * Otherwise, compensate for non-Greenwich Prime Meridian, but otherwise assume that coordinates
             * are interchangeable between the actual CRS and WGS84. Boundaries are only defined to the nearest
             * ≈1km so the error bound should be acceptable within the area of interest
             */
            if ($point instanceof GeographicPoint) {
                return new GeographicValue($point->getLatitude(), $point->getLongitude()->subtract($point->getCRS()->getDatum()->getPrimeMeridian()->getGreenwichLongitude()), null, $point->getCRS()->getDatum());
            }

            throw new UnknownConversionException();
        }
    }

    /**
     * Lat/long without chaining through WGS84. Boundaries are only defined to ≈1 km.
     */
    protected function getApproximatePointForExtentCheck(): GeographicValue
    {
        $point = $this instanceof CompoundPoint ? $this->getHorizontalPoint() : $this;

        if ($point instanceof GeocentricPoint) {
            $asGeographic = $point->asGeographicValue();

            return new GeographicValue($asGeographic->getLatitude(), $asGeographic->getLongitude()->subtract($asGeographic->getDatum()->getPrimeMeridian()->getGreenwichLongitude()), null, $asGeographic->getDatum());
        }

        if ($point instanceof ProjectedPoint) {
            $point = $point->asGeographicPoint();
        }

        assert($point instanceof GeographicPoint);

        return new GeographicValue($point->getLatitude(), $point->getLongitude()->subtract($point->getCRS()->getDatum()->getPrimeMeridian()->getGreenwichLongitude()), null, $point->getCRS()->getDatum());
    }

    abstract public function getCRS(): CoordinateReferenceSystem;

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract protected function performOperation(string $srid, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $inReverse, Length $accuracy, array $additionalParams = []): Point;
}
