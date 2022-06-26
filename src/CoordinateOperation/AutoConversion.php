<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function abs;
use function array_column;
use function array_merge;
use function array_shift;
use function array_sum;
use function assert;
use function class_exists;
use function count;
use DateTimeImmutable;
use function end;
use Generator;
use function in_array;
use PHPCoord\CompoundPoint;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\GeocentricPoint;
use PHPCoord\GeographicPoint;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\Point;
use PHPCoord\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Time\Year;
use function strpos;
use function usort;

/**
 * @internal
 */
trait AutoConversion
{
    private int $maxChainDepth = 7; // if traits could have constants...

    protected static array $methodsThatRequireCoordinateEpoch = [ // if traits could have constants...
        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN => CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN,
        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG2D => CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG2D,
        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG3D => CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG3D,
        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC => CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC,
        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG2D => CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG2D,
        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG3D => CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG3D,
        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN => CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN,
        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN => CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN,
    ];

    protected static array $methodsThatRequireASpecificEpoch = [ // if traits could have constants...
        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN => CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN,
        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN => CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN,
    ];

    private static array $completePathCache = [];

    private static array $incompletePathCache = [];

    private static array $transformationsByCRS = [];

    private static array $transformationsByCRSPair = [];

    public function convert(CoordinateReferenceSystem $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        if ($this->getCRS() == $to) {
            return $this;
        }

        if (strpos($this->getCRS()->getSRID(), CoordinateReferenceSystem::CRS_SRID_PREFIX_EPSG) !== 0 || strpos($to->getSRID(), CoordinateReferenceSystem::CRS_SRID_PREFIX_EPSG) !== 0) {
            throw new UnknownConversionException('Automatic conversions are only supported for EPSG CRSs');
        }

        $point = $this;
        $path = $this->findOperationPath($this->getCRS(), $to, $ignoreBoundaryRestrictions);

        foreach ($path as $step) {
            $target = CoordinateReferenceSystem::fromSRID($step['in_reverse'] ? $step['source_crs'] : $step['target_crs']);
            $point = $point->performOperation($step['operation'], $target, $step['in_reverse']);
        }

        return $point;
    }

    protected function findOperationPath(CoordinateReferenceSystem $source, CoordinateReferenceSystem $target, bool $ignoreBoundaryRestrictions): array
    {
        self::buildSupportedTransformationsByCRS();
        self::buildSupportedTransformationsByCRSPair();
        $boundaryCheckPoint = $ignoreBoundaryRestrictions ? null : $this->getPointForBoundaryCheck();

        // Iteratively calculate permutations of intermediate CRSs
        foreach ($this->buildTransformationPathsToCRS($source, $target) as $candidatePaths) {
            usort($candidatePaths, static function (array $a, array $b) {
                return $a['accuracy'] <=> $b['accuracy'];
            });

            foreach ($candidatePaths as $candidatePath) {
                if ($this->validatePath($candidatePath['path'], $boundaryCheckPoint)) {
                    return $candidatePath['path'];
                }
            }
        }

        throw new UnknownConversionException('Unable to perform conversion, please file a bug if you think this is incorrect');
    }

    protected function validatePath(array $candidatePath, ?GeographicValue $boundaryCheckPoint): bool
    {
        foreach ($candidatePath as $pathStep) {
            $operation = CoordinateOperations::getOperationData($pathStep['operation']);
            if ($boundaryCheckPoint) {
                //filter out operations that only operate outside this point
                $polygon = BoundingArea::createFromExtentCodes($operation['extent_code']);
                if (!$polygon->containsPoint($boundaryCheckPoint)) {
                    return false;
                }
            }

            $operation = CoordinateOperations::getOperationData($pathStep['operation']);

            //filter out operations that require an epoch if we don't have one
            if (isset(self::$methodsThatRequireCoordinateEpoch[$operation['method']]) && !$this->getCoordinateEpoch()) {
                return false;
            }

            $params = CoordinateOperations::getParamData($pathStep['operation']);

            //filter out operations that require a specific epoch
            if (isset(self::$methodsThatRequireASpecificEpoch[$operation['method']]) && $this->getCoordinateEpoch()) {
                $pointEpoch = Year::fromDateTime($this->getCoordinateEpoch());
                if (!(abs($pointEpoch->getValue() - $params['transformationReferenceEpoch']['value']) <= 0.001)) {
                    return false;
                }
            }

            //filter out operations that require a grid file that we don't have, or where boundaries are not being
            //checked (a formula-based conversion will always return *a* result, outside a grid boundary does not...
            foreach ($params as $param) {
                if (isset($param['fileProvider']) && (!$boundaryCheckPoint || !class_exists($param['fileProvider']))) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Build the set of possible paths that lead from the current CRS to the target CRS.
     */
    protected function buildTransformationPathsToCRS(CoordinateReferenceSystem $source, CoordinateReferenceSystem $target): Generator
    {
        $iterations = 1;
        $sourceSRID = $source->getSRID();
        $targetSRID = $target->getSRID();
        self::$incompletePathCache[$sourceSRID . '|' . $targetSRID . '|0'] = [[$sourceSRID]];

        while ($iterations < $this->maxChainDepth) {
            $cacheKey = $sourceSRID . '|' . $targetSRID . '|' . $iterations;
            $cacheKeyMinus1 = $sourceSRID . '|' . $targetSRID . '|' . ($iterations - 1);

            if (!isset(self::$completePathCache[$cacheKey])) {
                $completePaths = [];

                $simplePaths = self::$incompletePathCache[$cacheKeyMinus1];

                foreach ($simplePaths as $key => $simplePath) {
                    $current = end($simplePath);
                    if ($current === $targetSRID) {
                        $completePaths[] = $simplePath;
                    } elseif (isset(static::$transformationsByCRS[$current])) {
                        foreach (static::$transformationsByCRS[$current] as $next) {
                            if (!in_array($next, $simplePath, true)) {
                                $simplePaths[] = array_merge($simplePath, [$next]);
                            }
                        }
                    }
                    unset($simplePaths[$key]);
                }

                // Then expand each CRS->CRS permutation with the various ways of achieving that (can be lots :/)
                $fullPaths = $this->expandSimplePaths($completePaths, $sourceSRID, $targetSRID);

                $paths = [];
                foreach ($fullPaths as $fullPath) {
                    $paths[] = ['path' => $fullPath, 'accuracy' => array_sum(array_column($fullPath, 'accuracy'))];
                }

                self::$incompletePathCache[$cacheKey] = $simplePaths;
                self::$completePathCache[$cacheKey] = $paths;
            }

            ++$iterations;
            yield self::$completePathCache[$cacheKey];
        }
    }

    protected function expandSimplePaths(array $simplePaths, string $fromSRID, string $toSRID): array
    {
        $fullPaths = [];
        foreach ($simplePaths as $simplePath) {
            $transformationsToMakePath = [[]];
            $from = array_shift($simplePath);
            assert($from === $fromSRID);
            do {
                $to = array_shift($simplePath);
                $wipTransformationsInPath = [];
                foreach (static::$transformationsByCRSPair[$from . '|' . $to] ?? [] as $transformation) {
                    foreach ($transformationsToMakePath as $transformationToMakePath) {
                        $wipTransformationsInPath[] = array_merge($transformationToMakePath, [$transformation]);
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
        } catch (UnknownConversionException $e) {
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

    protected static function buildSupportedTransformationsByCRS(): void
    {
        if (!static::$transformationsByCRS) {
            foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
                if (!isset(static::$transformationsByCRS[$transformation['source_crs']][$transformation['target_crs']])) {
                    static::$transformationsByCRS[$transformation['source_crs']][$transformation['target_crs']] = $transformation['target_crs'];
                }
                if ($transformation['reversible'] && !isset(static::$transformationsByCRS[$transformation['target_crs']][$transformation['source_crs']])) {
                    static::$transformationsByCRS[$transformation['target_crs']][$transformation['source_crs']] = $transformation['source_crs'];
                }
            }
        }
    }

    protected static function buildSupportedTransformationsByCRSPair(): void
    {
        if (!static::$transformationsByCRSPair) {
            foreach (CRSTransformations::getSupportedTransformations() as $key => $transformation) {
                if (!isset(static::$transformationsByCRSPair[$transformation['source_crs'] . '|' . $transformation['target_crs']][$key])) {
                    static::$transformationsByCRSPair[$transformation['source_crs'] . '|' . $transformation['target_crs']][$key] = $transformation;
                    static::$transformationsByCRSPair[$transformation['source_crs'] . '|' . $transformation['target_crs']][$key]['in_reverse'] = false;
                }
                if ($transformation['reversible'] && !isset(static::$transformationsByCRSPair[$transformation['target_crs'] . '|' . $transformation['source_crs']][$key])) {
                    static::$transformationsByCRSPair[$transformation['target_crs'] . '|' . $transformation['source_crs']][$key] = $transformation;
                    static::$transformationsByCRSPair[$transformation['target_crs'] . '|' . $transformation['source_crs']][$key]['in_reverse'] = true;
                }
            }
        }
    }

    abstract public function getCRS(): CoordinateReferenceSystem;

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract protected function performOperation(string $srid, CoordinateReferenceSystem $to, bool $inReverse): Point;
}
