<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function abs;
use function array_filter;
use DateTimeImmutable;
use function in_array;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\Point;
use PHPCoord\UnitOfMeasure\Time\Year;
use function reset;
use function strpos;
use function usort;

trait AutoConversion
{
    public function convert(CoordinateReferenceSystem $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        if ($this->getCRS() == $to) {
            return $this;
        }

        if (strpos($this->getCRS()->getSRID(), CoordinateReferenceSystem::CRS_SRID_PREFIX_EPSG) !== 0 || strpos($to->getSRID(), CoordinateReferenceSystem::CRS_SRID_PREFIX_EPSG) !== 0) {
            throw new UnknownConversionException('Automatic conversions are only supported for EPSG CRSs');
        }

        $point = $this;
        $path = $this->findOperationPath($to, $ignoreBoundaryRestrictions);

        $inReverse = reset($path)['source_crs'] !== $this->getCRS()->getSRID();

        foreach ($path as $step) {
            $target = CoordinateReferenceSystem::fromSRID($inReverse ? $step['source_crs'] : $step['target_crs']);
            $point = $point->performOperation($step['operation'], $target, $inReverse);
        }

        return $point;
    }

    protected function findOperationPath(CoordinateReferenceSystem $to, bool $ignoreBoundaryRestrictions): array
    {
        $candidates = [];
        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            if ($transformation['source_crs'] === $this->getCRS()->getSRID() && $transformation['target_crs'] === $to->getSRID()) {
                $candidates[] = $transformation;
            } elseif ($transformation['target_crs'] === $this->getCRS()->getSRID() && $transformation['source_crs'] === $to->getSRID() && $transformation['reversible']) {
                $candidates[] = $transformation;
            }
        }

        $asGeog = $this->asGeographicValue();
        $lat = $asGeog->getLatitude()->asDegrees()->getValue();
        $long = $asGeog->getLongitude()->asDegrees()->getValue();
        $candidates = array_filter($candidates, function (array $candidate) use ($lat, $long, $ignoreBoundaryRestrictions) {
            $operation = CoordinateOperations::getOperationData($candidate['operation']);
            $ok = true;

            if (!$ignoreBoundaryRestrictions) {
                //filter out operations that only operate outside this point
                if ($operation['bounding_box']['east'] < $operation['bounding_box']['west']) {
                    $ok = $ok && $lat <= $operation['bounding_box']['north'] && $lat >= $operation['bounding_box']['south'] && $long >= $operation['bounding_box']['west'] && $long <= ($operation['bounding_box']['east'] + 360);
                } else {
                    $ok = $ok && $lat <= $operation['bounding_box']['north'] && $lat >= $operation['bounding_box']['south'] && $long >= $operation['bounding_box']['west'] && $long <= $operation['bounding_box']['east'];
                }
            }

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
                $params = CoordinateOperationParams::getParamData($candidate['operation']);
                $pointEpoch = Year::fromDateTime($this->getCoordinateEpoch());
                $ok = $ok && (abs($pointEpoch->getValue() - $params['Transformation reference epoch']['value']) <= 0.001);
            }

            return $ok;
        });

        usort($candidates, static function (array $a, array $b) { return $a['accuracy'] <=> $b['accuracy']; });

        if (!$candidates) {
            throw new UnknownConversionException('Unable to perform conversion, please file a bug if you think this is incorrect');
        }

        return [reset($candidates)];
    }

    abstract public function getCRS(): CoordinateReferenceSystem;

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract public function asGeographicValue(): GeographicValue;

    abstract protected function performOperation(string $srid, CoordinateReferenceSystem $to, bool $inReverse): Point;
}
