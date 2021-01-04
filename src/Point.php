<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTimeImmutable;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperationParams;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use Stringable;

abstract class Point implements Stringable
{
    protected const NEWTON_RAPHSON_CONVERGENCE = 1e-12;

    /**
     * @internal
     */
    public function performOperation(string $srid, CoordinateReferenceSystem $to, bool $inReverse): self
    {
        $operations = self::resolveConcatenatedOperations($srid, $inReverse);

        $point = $this;
        foreach ($operations as $operationSrid => $operation) {
            $method = CoordinateOperationMethods::getFunctionName($operation['method']);
            if (isset($operation['source_crs'])) {
                $destCRS = CoordinateReferenceSystem::fromSRID($inReverse ? $operation['source_crs'] : $operation['target_crs']);
            } else {
                $destCRS = $to;
            }

            $params = self::resolveParamsByOperation($operationSrid, $operation['method'], $inReverse);

            if (PHP_MAJOR_VERSION >= 8) {
                $point = $point->$method($destCRS, ...$params);
            } else {
                $point = $point->$method($destCRS, ...array_values($params));
            }
        }

        $point->crs = $to; //some operations are reused across CRSses (e.g. ETRS89 and WGS84), so the $destCRS of the final suboperation might not be the intended target

        return $point;
    }

    protected static function camelCase(string $string): string
    {
        $string = str_replace([' ', '-'], '', ucwords($string, ' -'));
        if (!preg_match('/[ABC][uv\d]/', $string)) {
            $string = lcfirst($string);
        }

        return $string;
    }

    protected static function resolveConcatenatedOperations(string $operationSrid, bool $inReverse): array
    {
        $operations = [];
        $operation = CoordinateOperations::getOperationData($operationSrid);
        if (isset($operation['operations'])) {
            foreach ($operation['operations'] as $subOperation) {
                $subOperationData = CoordinateOperations::getOperationData($subOperation['operation']);
                $subOperationData['source_crs'] = $subOperation['source_crs'];
                $subOperationData['target_crs'] = $subOperation['target_crs'];
                $operations[$subOperation['operation']] = $subOperationData;
            }
        } else {
            $operations[$operationSrid] = $operation;
        }

        if ($inReverse) {
            $operations = array_reverse($operations, true);
        }

        return $operations;
    }

    protected static function resolveParamsByOperation(string $operationSrid, string $methodSrid, bool $inReverse): array
    {
        $params = [];
        $powerCoefficients = [];
        foreach (CoordinateOperationParams::getParamData($operationSrid) as $paramName => $paramData) {
            $value = $paramData['value'];
            if ($inReverse && $paramData['reverses']) {
                $value *= -1;
            }
            if ($paramData['uom']) {
                $param = UnitOfMeasureFactory::makeUnit($value, $paramData['uom']);
            } else {
                $param = $paramData['value'];
            }
            $paramName = static::camelCase($paramName);
            if (preg_match('/^(Au|Bu)/', $paramName)) {
                $powerCoefficients[$paramName] = $param;
            } else {
                $params[$paramName] = $param;
            }
        }
        if ($powerCoefficients) {
            $params['powerCoefficients'] = $powerCoefficients;
        }
        if (in_array($methodSrid, [
            CoordinateOperationMethods::EPSG_SIMILARITY_TRANSFORMATION,
            CoordinateOperationMethods::EPSG_AFFINE_PARAMETRIC_TRANSFORMATION,
        ], true)) {
            $params['inReverse'] = $inReverse;
        }

        return $params;
    }

    protected function getAxisByName(string $name): ?Axis
    {
        foreach ($this->getCRS()->getCoordinateSystem()->getAxes() as $axis) {
            if ($axis->getName() === $name) {
                return $axis;
            }
        }

        return null;
    }

    protected static function sign(float $number): int
    {
        if ($number < 0) {
            return -1;
        }

        return 1;
    }

    /**
     * General polynomial.
     * @param Coefficient[] $powerCoefficients
     */
    protected function generalPolynomialUnitless(
        float $xs,
        float $ys,
        UnitOfMeasure $ordinate1OfEvaluationPointInSourceCRS,
        UnitOfMeasure $ordinate2OfEvaluationPointInSourceCRS,
        UnitOfMeasure $ordinate1OfEvaluationPointInTargetCRS,
        UnitOfMeasure $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scalingFactorForSourceCRSCoordDifferences,
        Scale $scalingFactorForTargetCRSCoordDifferences,
        Scale $A0,
        Scale $B0,
        array $powerCoefficients
    ): array {
        $xso = $ordinate1OfEvaluationPointInSourceCRS->getValue();
        $yso = $ordinate2OfEvaluationPointInSourceCRS->getValue();
        $xto = $ordinate1OfEvaluationPointInTargetCRS->getValue();
        $yto = $ordinate2OfEvaluationPointInTargetCRS->getValue();

        $U = $scalingFactorForSourceCRSCoordDifferences->asUnity()->getValue() * ($xs - $xso);
        $V = $scalingFactorForSourceCRSCoordDifferences->asUnity()->getValue() * ($ys - $yso);

        $mTdX = $A0->getValue();
        foreach ($powerCoefficients as $coefficientName => $coefficientValue) {
            if ($coefficientName[0] === 'A') {
                sscanf($coefficientName, 'Au%dv%d', $uPower, $vPower);
                $mTdX += $coefficientValue->getValue() * $U ** $uPower * $V ** $vPower;
            }
        }

        $mTdY = $B0->getValue();
        foreach ($powerCoefficients as $coefficientName => $coefficientValue) {
            if ($coefficientName[0] === 'B') {
                sscanf($coefficientName, 'Bu%dv%d', $uPower, $vPower);
                $mTdY += $coefficientValue->getValue() * $U ** $uPower * $V ** $vPower;
            }
        }

        $xt = $xs - $xso + $xto + $mTdX / $scalingFactorForTargetCRSCoordDifferences->asUnity()->getValue();
        $yt = $ys - $yso + $yto + $mTdY / $scalingFactorForTargetCRSCoordDifferences->asUnity()->getValue();

        return ['xt' => $xt, 'yt' => $yt];
    }

    /**
     * Reversible polynomial.
     */
    protected function reversiblePolynomialUnitless(
        float $xs,
        float $ys,
        Angle $ordinate1OfEvaluationPoint,
        Angle $ordinate2OfEvaluationPoint,
        Scale $scalingFactorForCoordDifferences,
        Scale $A0,
        Scale $B0,
        array $powerCoefficients
    ): array {
        $xo = $ordinate1OfEvaluationPoint->getValue();
        $yo = $ordinate2OfEvaluationPoint->getValue();

        $U = $scalingFactorForCoordDifferences->asUnity()->getValue() * ($xs - $xo);
        $V = $scalingFactorForCoordDifferences->asUnity()->getValue() * ($ys - $yo);

        $mTdX = $A0->getValue();
        foreach ($powerCoefficients as $coefficientName => $coefficientValue) {
            if ($coefficientName[0] === 'A') {
                sscanf($coefficientName, 'Au%dv%d', $uPower, $vPower);
                $mTdX += $coefficientValue->getValue() * $U ** $uPower * $V ** $vPower;
            }
        }

        $mTdY = $B0->getValue();
        foreach ($powerCoefficients as $coefficientName => $coefficientValue) {
            if ($coefficientName[0] === 'B') {
                sscanf($coefficientName, 'Bu%dv%d', $uPower, $vPower);
                $mTdY += $coefficientValue->getValue() * $U ** $uPower * $V ** $vPower;
            }
        }

        $xt = $xs + $mTdX * $scalingFactorForCoordDifferences->asUnity()->getValue();
        $yt = $ys + $mTdY * $scalingFactorForCoordDifferences->asUnity()->getValue();

        return ['xt' => $xt, 'yt' => $yt];
    }

    /**
     * Floating point vagaries mean that it's possible for inputs to be e.g. 1.00000000000001 which makes PHP give a
     * silent NaN as output so inputs need to be capped. atan/atan2 are not affected, they seem to cap internally.
     */
    protected static function acos(float $num): float
    {
        if ($num > 1.0) {
            $num = 1.0;
        } elseif ($num < -1) {
            $num = -1.0;
        }

        return acos($num);
    }

    /**
     * Floating point vagaries mean that it's possible for inputs to be e.g. 1.00000000000001 which makes PHP give a
     * silent NaN as output so inputs need to be capped. atan/atan2 are not affected, they seem to cap internally.
     */
    protected static function asin(float $num): float
    {
        if ($num > 1.0) {
            $num = 1.0;
        } elseif ($num < -1.0) {
            $num = -1.0;
        }

        return asin($num);
    }

    abstract public function getCRS(): CoordinateReferenceSystem;

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract public function calculateDistance(self $to): Length;
}
