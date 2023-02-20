<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use DateTimeImmutable;
use PHPCoord\CompoundPoint;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\GeocentricPoint;
use PHPCoord\GeographicPoint;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\Geometry\RegionMap;
use PHPCoord\Point;
use PHPCoord\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Time\Year;

use function abs;
use function array_column;
use function array_shift;
use function array_sum;
use function array_unique;
use function assert;
use function class_exists;
use function count;
use function in_array;
use function usort;
use function str_ends_with;

/**
 * @internal
 */
trait AutoConversion
{
    private int $maxChainDepth = 6; // if traits could have constants...

    private static array $completePathCache = [];

    public function convert(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        if ($this->getCRS() == $to) {
            return $this;
        }

        $point = $this;
        $path = $this->findOperationPath($this->getCRS(), $to, $ignoreBoundaryRestrictions);

        foreach ($path as $step) {
            $target = CoordinateReferenceSystem::fromSRID($step['in_reverse'] ? $step['source_crs'] : $step['target_crs']);
            $point = $point->performOperation($step['operation'], $target, $step['in_reverse']);
        }

        return $point;
    }

    protected function findOperationPath(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $source, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target, bool $ignoreBoundaryRestrictions): array
    {
        $boundaryCheckPoint = $ignoreBoundaryRestrictions ? null : $this->getPointForBoundaryCheck();

        // Iteratively calculate permutations of intermediate CRSs
        $candidatePaths = $this->buildTransformationPathsToCRS($source, $target);
        usort($candidatePaths, static fn (array $a, array $b) => $a['accuracy'] <=> $b['accuracy'] ?: count($a['path']) <=> count($b['path']));

        foreach ($candidatePaths as $candidatePath) {
            if ($this->validatePath($candidatePath['path'], $target, $boundaryCheckPoint)) {
                return $candidatePath['path'];
            }
        }

        throw new UnknownConversionException('Unable to perform conversion, please file a bug if you think this is incorrect');
    }

    protected function validatePath(array $candidatePath, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target, ?GeographicValue $boundaryCheckPoint): bool
    {
        foreach ($candidatePath as $pathStep) {
            $operation = CoordinateOperations::getOperationData($pathStep['operation']);
            if ($boundaryCheckPoint) {
                // filter out operations that only operate outside this point
                $polygon = $operation['extent'] = $operation['extent'] instanceof BoundingArea ? $operation['extent'] : BoundingArea::createFromExtentCodes($operation['extent']);
                if (!$polygon->containsPoint($boundaryCheckPoint)) {
                    return false;
                }
            }

            $operation = CoordinateOperations::getOperationData($pathStep['operation']);
            $methodParams = CoordinateOperationMethods::getMethodData($operation['method'])['paramData'];

            // filter out operations that use a 2D CRS as intermediate where this is a 3D point
            $currentCRS = $this->getCRS();
            if ($currentCRS instanceof Compound || count($currentCRS->getCoordinateSystem()->getAxes()) === 3) {
                if ($target instanceof Compound || count($target->getCoordinateSystem()->getAxes()) !== 2) {
                    $intermediateTarget = CoordinateReferenceSystem::fromSRID($pathStep['in_reverse'] ? $pathStep['source_crs'] : $pathStep['target_crs']);
                    if (!$intermediateTarget instanceof Compound && count($intermediateTarget->getCoordinateSystem()->getAxes()) === 2) {
                        return false;
                    }
                }
            }

            // filter out operations that require an epoch if we don't have one
            if ((isset($methodParams['transformationReferenceEpoch']) || isset($methodParams['parameterReferenceEpoch'])) && !$this->getCoordinateEpoch()) {
                return false;
            }

            $operationParams = CoordinateOperations::getParamData($pathStep['operation']);

            // filter out operations that require a specific epoch
            if (isset($methodParams['transformationReferenceEpoch'])) {
                $pointEpoch = Year::fromDateTime($this->getCoordinateEpoch());
                if (!(abs($pointEpoch->subtract($operationParams['transformationReferenceEpoch'])->getValue()) <= 0.001)) {
                    return false;
                }
            }

            // filter out operations that require a grid file that we don't have, or where boundaries are not being
            // checked (a formula-based conversion will always return *a* result, outside a grid boundary does not...)
            foreach ($operationParams as $paramName => $paramValue) {
                if (str_ends_with($paramName, 'File') && $paramValue !== null && (!$boundaryCheckPoint || !class_exists($paramValue))) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Build the set of possible paths that lead from the current CRS to the target CRS.
     */
    protected function buildTransformationPathsToCRS(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $source, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target): array
    {
        $iterations = 0;
        $sourceSRID = $source->getSRID();
        $targetSRID = $target->getSRID();
        $previousSimplePaths = [[$sourceSRID]];
        $cacheKey = $sourceSRID . '|' . $targetSRID;

        if (!isset(self::$completePathCache[$cacheKey])) {
            $transformationsByCRS = self::buildSupportedTransformationsByCRS($source, $target);
            $transformationsByCRSPair = self::buildSupportedTransformationsByCRSPair($source, $target);
            self::$completePathCache[$cacheKey] = [];

            while ($iterations <= $this->maxChainDepth) {
                $completePaths = [];
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

                // Then expand each CRS->CRS permutation with the various ways of achieving that (can be lots :/)
                $fullPaths = $this->expandSimplePaths($transformationsByCRSPair, $completePaths, $sourceSRID, $targetSRID);

                $paths = [];
                foreach ($fullPaths as $fullPath) {
                    $paths[] = ['path' => $fullPath, 'accuracy' => array_sum(array_column($fullPath, 'accuracy'))];
                }

                $previousSimplePaths = $simplePaths;
                self::$completePathCache[$cacheKey] = [...self::$completePathCache[$cacheKey], ...$paths];
                ++$iterations;
            }
        }

        return self::$completePathCache[$cacheKey];
    }

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

            if ($point instanceof GeocentricPoint) {
                $asGeographic = $point->asGeographicValue();

                return new GeographicValue($asGeographic->getLatitude(), $asGeographic->getLongitude()->subtract($asGeographic->getDatum()->getPrimeMeridian()->getGreenwichLongitude()), null, $asGeographic->getDatum());
            }
        }
    }

    protected static function buildSupportedTransformationsByCRS(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $source, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target): array
    {
        $regions = array_unique([$source->getBoundingArea()->getRegion(), $target->getBoundingArea()->getRegion(), RegionMap::REGION_GLOBAL]);
        $relevantRegionData = CoordinateOperations::getCustomTransformations();
        foreach ($regions as $region) {
            $regionData = match ($region) {
                RegionMap::REGION_GLOBAL => CRSTransformationsGlobal::getSupportedTransformations(),
                RegionMap::REGION_AFRICA => CRSTransformationsAfrica::getSupportedTransformations(),
                RegionMap::REGION_ANTARCTIC => CRSTransformationsAntarctic::getSupportedTransformations(),
                RegionMap::REGION_ARCTIC => CRSTransformationsArctic::getSupportedTransformations(),
                RegionMap::REGION_ASIA => CRSTransformationsAsia::getSupportedTransformations(),
                RegionMap::REGION_EUROPE => CRSTransformationsEurope::getSupportedTransformations(),
                RegionMap::REGION_NORTHAMERICA => CRSTransformationsNorthAmerica::getSupportedTransformations(),
                RegionMap::REGION_OCEANIA => CRSTransformationsOceania::getSupportedTransformations(),
                RegionMap::REGION_SOUTHAMERICA => CRSTransformationsSouthAmerica::getSupportedTransformations(),
            };
            $relevantRegionData = [...$relevantRegionData, ...$regionData];
        }

        $transformationsByCRS = [];
        foreach ($relevantRegionData as $transformation) {
            $operation = CoordinateOperations::getOperationData($transformation['operation']);
            $method = CoordinateOperationMethods::getMethodData($operation['method']);

            if (!isset($transformationsByCRS[$transformation['source_crs']][$transformation['target_crs']])) {
                $transformationsByCRS[$transformation['source_crs']][$transformation['target_crs']] = $transformation['target_crs'];
            }
            if ($method['reversible'] && !isset($transformationsByCRS[$transformation['target_crs']][$transformation['source_crs']])) {
                $transformationsByCRS[$transformation['target_crs']][$transformation['source_crs']] = $transformation['source_crs'];
            }
        }

        return $transformationsByCRS;
    }

    protected static function buildSupportedTransformationsByCRSPair(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $source, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $target): array
    {
        $regions = array_unique([$source->getBoundingArea()->getRegion(), $target->getBoundingArea()->getRegion(), RegionMap::REGION_GLOBAL]);
        $relevantRegionData = [];
        foreach ($regions as $region) {
            $regionData = match ($region) {
                RegionMap::REGION_GLOBAL => [...CRSTransformationsGlobal::getSupportedTransformations(), ...CoordinateOperations::getCustomTransformations()],
                RegionMap::REGION_AFRICA => CRSTransformationsAfrica::getSupportedTransformations(),
                RegionMap::REGION_ANTARCTIC => CRSTransformationsAntarctic::getSupportedTransformations(),
                RegionMap::REGION_ARCTIC => CRSTransformationsArctic::getSupportedTransformations(),
                RegionMap::REGION_ASIA => CRSTransformationsAsia::getSupportedTransformations(),
                RegionMap::REGION_EUROPE => CRSTransformationsEurope::getSupportedTransformations(),
                RegionMap::REGION_NORTHAMERICA => CRSTransformationsNorthAmerica::getSupportedTransformations(),
                RegionMap::REGION_OCEANIA => CRSTransformationsOceania::getSupportedTransformations(),
                RegionMap::REGION_SOUTHAMERICA => CRSTransformationsSouthAmerica::getSupportedTransformations(),
            };
            $relevantRegionData = [...$relevantRegionData, ...$regionData];
        }

        $transformationsByCRSPair = [];
        foreach ($relevantRegionData as $key => $transformation) {
            $operation = CoordinateOperations::getOperationData($transformation['operation']);
            $method = CoordinateOperationMethods::getMethodData($operation['method']);

            $transformationsByCRSPair[$transformation['source_crs'] . '|' . $transformation['target_crs']][$key] = $transformation;
            $transformationsByCRSPair[$transformation['source_crs'] . '|' . $transformation['target_crs']][$key]['in_reverse'] = false;
            if ($method['reversible']) {
                $transformationsByCRSPair[$transformation['target_crs'] . '|' . $transformation['source_crs']][$key] = $transformation;
                $transformationsByCRSPair[$transformation['target_crs'] . '|' . $transformation['source_crs']][$key]['in_reverse'] = true;
            }
        }

        return $transformationsByCRSPair;
    }

    abstract public function getCRS(): CoordinateReferenceSystem;

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract protected function performOperation(string $srid, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $inReverse): Point;
}
