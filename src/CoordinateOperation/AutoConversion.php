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
use function array_pop;
use function array_shift;
use function array_sum;
use function assert;
use function count;
use DateTimeImmutable;
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
    private int $maxChainDepth = 4; // if traits could have constants...

    private static array $pathCache = [];

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
        $candidatePaths = $this->buildTransformationPathsToCRS($source, $target);

        usort($candidatePaths, static function (array $a, array $b) {
            return count($a['path']) <=> count($b['path']) ?: $a['accuracy'] <=> $b['accuracy'];
        });

        $boundaryCheckPoint = $ignoreBoundaryRestrictions ? null : $this->getPointForBoundaryCheck();

        foreach ($candidatePaths as $candidatePath) {
            $ok = true;

            foreach ($candidatePath['path'] as $pathStep) {
                $operation = CoordinateOperations::getOperationData($pathStep['operation']);
                if ($boundaryCheckPoint) {
                    //filter out operations that only operate outside this point
                    $polygon = BoundingArea::createFromExtentCodes($operation['extent_code']);
                    $ok = $ok && $polygon->containsPoint($boundaryCheckPoint);
                }

                $operations = static::resolveConcatenatedOperations($pathStep['operation'], false);

                foreach ($operations as $operation) {
                    //filter out operations that require an epoch if we don't have one
                    if (!$this->getCoordinateEpoch() && in_array($operation['method'], [
                        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN,
                        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG2D,
                        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG3D,
                        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC,
                        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG2D,
                        CoordinateOperationMethods::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG3D,
                        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN,
                        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN,
                    ], true)) {
                        $ok = false;
                    }

                    //filter out operations that require a specific epoch
                    if ($this->getCoordinateEpoch() && in_array($operation['method'], [
                        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN,
                        CoordinateOperationMethods::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN,
                    ], true)) {
                        $params = CoordinateOperationParams::getParamData($pathStep['operation']);
                        $pointEpoch = Year::fromDateTime($this->getCoordinateEpoch());
                        $ok = $ok && (abs($pointEpoch->getValue() - $params['Transformation reference epoch']['value']) <= 0.001);
                    }
                }
            }

            if ($ok) {
                return $candidatePath['path'];
            }
        }

        throw new UnknownConversionException('Unable to perform conversion, please file a bug if you think this is incorrect');
    }

    /**
     * Build the set of *all* possible paths that lead from the current CRS to the target CRS.
     */
    protected function buildTransformationPathsToCRS(CoordinateReferenceSystem $source, CoordinateReferenceSystem $target): array
    {
        $cacheKey = $source->getSRID() . '|' . $target->getSRID();
        if (!isset(self::$pathCache[$cacheKey])) {
            $simplePaths = [];

            // Try a simple direct match before doing anything more complex!
            if (CRSTransformations::getSupportedTransformationsForCRSPair($source->getSRID(), $target->getSRID())) {
                $simplePaths[] = [$source->getSRID(), $target->getSRID()];
            } else { // Otherwise, recursively calculate permutations of intermediate CRSs
                $visited = [];
                foreach (CoordinateReferenceSystem::getSupportedSRIDs() as $crs => $name) {
                    $visited[$crs] = false;
                }
                $currentPath = [];
                $this->DFS($source->getSRID(), $target->getSRID(), $visited, $currentPath, $simplePaths);
            }

            // Then expand each CRS->CRS permutation with the various ways of achieving that (can be lots :/)
            $candidatePaths = [];
            foreach ($simplePaths as $simplePath) {
                $transformationsToMakePath = [[]];
                $from = array_shift($simplePath);
                assert($from === $source->getSRID());
                do {
                    $to = array_shift($simplePath);
                    $wipTransformationsInPath = [];
                    foreach (CRSTransformations::getSupportedTransformationsForCRSPair($from, $to) as $transformation) {
                        foreach ($transformationsToMakePath as $transformationToMakePath) {
                            $wipTransformationsInPath[] = array_merge($transformationToMakePath, [$transformation]);
                        }
                    }

                    $transformationsToMakePath = $wipTransformationsInPath;
                    $from = $to;
                } while (count($simplePath) > 0);
                assert($to === $target->getSRID());
                $candidatePaths = array_merge($candidatePaths, $transformationsToMakePath);
            }

            $candidates = [];
            foreach ($candidatePaths as $candidatePath) {
                $candidates[] = ['path' => $candidatePath, 'accuracy' => array_sum(array_column($candidatePath, 'accuracy'))];
            }

            self::$pathCache[$cacheKey] = $candidates;
        }

        return self::$pathCache[$cacheKey];
    }

    protected function DFS(string $u, string $v, array &$visited, array &$currentPath, array &$simplePaths): void
    {
        $currentPath[] = $u;
        if ($u === $v) {
            $simplePaths[] = $currentPath;
        } else {
            $visited[$u] = true;
            if (count($currentPath) <= $this->maxChainDepth) {
                foreach (CRSTransformations::getSupportedTransformationsForCRS($u) as $nextU) {
                    if (!$visited[$nextU]) {
                        $this->DFS($nextU, $v, $visited, $currentPath, $simplePaths);
                    }
                }
            }
        }

        array_pop($currentPath);
        $visited[$u] = false;
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

    abstract public function getCRS(): CoordinateReferenceSystem;

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract protected function performOperation(string $srid, CoordinateReferenceSystem $to, bool $inReverse): Point;
}
