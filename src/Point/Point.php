<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTimeImmutable;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\Grid;
use PHPCoord\CoordinateOperation\GridProvider;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use Stringable;

use function acos;
use function asin;
use function assert;
use function atan;
use function atan2;
use function class_exists;
use function is_string;
use function property_exists;
use function sscanf;
use function str_ends_with;
use function str_starts_with;

abstract class Point implements Stringable
{
    protected const ITERATION_CONVERGENCE_FORMULA = 1e-10;
    protected const ITERATION_CONVERGENCE_GRID = 0.0001;
    protected const METHODS_REQUIRING_HORIZONTAL_POINT = [
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_AND_SLOPE => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_AND_SLOPE,
        CoordinateOperationMethods::EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019 => CoordinateOperationMethods::EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019,
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_GTX => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_GTX,
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_PL_TXT => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_PL_TXT,
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_BEV_AT => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_BEV_AT,
        CoordinateOperationMethods::EPSG_VERTICAL_CHANGE_BY_GEOID_GRID_DIFFERENCE_NRCAN => CoordinateOperationMethods::EPSG_VERTICAL_CHANGE_BY_GEOID_GRID_DIFFERENCE_NRCAN,
    ];
    protected const METHODS_THAT_REQUIRE_DIRECTION = [
        CoordinateOperationMethods::EPSG_SIMILARITY_TRANSFORMATION => CoordinateOperationMethods::EPSG_SIMILARITY_TRANSFORMATION,
        CoordinateOperationMethods::EPSG_AFFINE_PARAMETRIC_TRANSFORMATION => CoordinateOperationMethods::EPSG_AFFINE_PARAMETRIC_TRANSFORMATION,
        CoordinateOperationMethods::EPSG_NADCON5_2D => CoordinateOperationMethods::EPSG_NADCON5_2D,
        CoordinateOperationMethods::EPSG_NADCON5_3D => CoordinateOperationMethods::EPSG_NADCON5_3D,
        CoordinateOperationMethods::EPSG_NTV2 => CoordinateOperationMethods::EPSG_NTV2,
        CoordinateOperationMethods::EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019 => CoordinateOperationMethods::EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019,
        CoordinateOperationMethods::EPSG_GEOCENTRIC_TRANSLATION_BY_GRID_INTERPOLATION_IGN => CoordinateOperationMethods::EPSG_GEOCENTRIC_TRANSLATION_BY_GRID_INTERPOLATION_IGN,
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_GTX => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_GTX,
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_PL_TXT => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_PL_TXT,
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_BEV_AT => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_BEV_AT,
        CoordinateOperationMethods::EPSG_VERTICAL_CHANGE_BY_GEOID_GRID_DIFFERENCE_NRCAN => CoordinateOperationMethods::EPSG_VERTICAL_CHANGE_BY_GEOID_GRID_DIFFERENCE_NRCAN,
        CoordinateOperationMethods::EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_2 => CoordinateOperationMethods::EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_2,
        CoordinateOperationMethods::EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_6 => CoordinateOperationMethods::EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_6,
    ];

    /**
     * @var array<class-string, Grid>
     */
    protected static array $gridCache = [];

    /**
     * @internal
     * @param array{horizontalPoint?: Point} $additionalParams
     */
    public function performOperation(string $srid, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $inReverse, array $additionalParams = []): self
    {
        $operation = CoordinateOperations::getOperationData($srid);

        if ($operation['method'] === CoordinateOperationMethods::EPSG_ALIAS) {
            $point = clone $this;
            assert(property_exists($point, 'crs'));
            $point->crs = $to;

            return $point;
        } else {
            $method = CoordinateOperationMethods::getFunctionName($operation['method']);
            $params = self::resolveParamsByOperation($srid, $operation['method'], $inReverse);

            if (isset(self::METHODS_REQUIRING_HORIZONTAL_POINT[$operation['method']]) && isset($additionalParams['horizontalPoint'])) {
                $params['horizontalPoint'] = $additionalParams['horizontalPoint'];
            }

            return $this->$method($to, ...$params);
        }
    }

    /**
     * @return array<string, mixed>
     */
    protected static function resolveParamsByOperation(string $operationSrid, string $methodSrid, bool $inReverse): array
    {
        $methodData = CoordinateOperationMethods::getMethodData($methodSrid);

        $params = [];
        $powerCoefficients = [];
        foreach (CoordinateOperations::getParamData($operationSrid) as $paramName => $paramValue) {
            if (str_ends_with($paramName, 'File') && is_string($paramValue) && class_exists($paramValue) && new $paramValue() instanceof GridProvider) {
                $params[$paramName] = static::$gridCache[$paramValue] ??= (new $paramValue())->provideGrid();
            } else {
                if ($inReverse && isset($methodData['paramData'][$paramName]) && $methodData['paramData'][$paramName]['reverses']) {
                    $paramValue = $paramValue->multiply(-1);
                }
                if (str_starts_with($paramName, 'Au') || str_starts_with($paramName, 'Bu')) {
                    $powerCoefficients[$paramName] = $paramValue;
                } else {
                    $params[$paramName] = $paramValue;
                }
            }
        }
        if ($powerCoefficients) {
            $params['powerCoefficients'] = $powerCoefficients;
        }
        if (isset(self::METHODS_THAT_REQUIRE_DIRECTION[$methodSrid])) {
            if ($methodSrid === CoordinateOperationMethods::EPSG_VERTICAL_CHANGE_BY_GEOID_GRID_DIFFERENCE_NRCAN) {
                $inReverse = !$inReverse; // has a reversed grid
            }
            $params['inReverse'] = $inReverse;
        }

        return $params;
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
     * @param  array<string, Coefficient>  $powerCoefficients
     * @return array{xt: float, yt: float}
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
        array $powerCoefficients,
        bool $inReverse
    ): array {
        if (!$inReverse) {
            return $this->generalPolynomialUnitlessForward(
                $xs,
                $ys,
                $ordinate1OfEvaluationPointInSourceCRS,
                $ordinate2OfEvaluationPointInSourceCRS,
                $ordinate1OfEvaluationPointInTargetCRS,
                $ordinate2OfEvaluationPointInTargetCRS,
                $scalingFactorForSourceCRSCoordDifferences,
                $scalingFactorForTargetCRSCoordDifferences,
                $A0,
                $B0,
                $powerCoefficients,
            );
        } else {
            return $this->generalPolynomialUnitlessReverse(
                $xs,
                $ys,
                $ordinate1OfEvaluationPointInSourceCRS,
                $ordinate2OfEvaluationPointInSourceCRS,
                $ordinate1OfEvaluationPointInTargetCRS,
                $ordinate2OfEvaluationPointInTargetCRS,
                $scalingFactorForSourceCRSCoordDifferences,
                $scalingFactorForTargetCRSCoordDifferences,
                $A0,
                $B0,
                $powerCoefficients,
            );
        }
    }

    protected function generalPolynomialUnitlessForward(
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

    protected function generalPolynomialUnitlessReverse(
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
        $result = ['xt' => $xs, 'yt' => $ys];
        for ($i = 0; $i <= 15; ++$i) {
            $forwardShiftedCoordinates = $this->generalPolynomialUnitlessForward(
                $result['xt'],
                $result['yt'],
                $ordinate1OfEvaluationPointInSourceCRS,
                $ordinate2OfEvaluationPointInSourceCRS,
                $ordinate1OfEvaluationPointInTargetCRS,
                $ordinate2OfEvaluationPointInTargetCRS,
                $scalingFactorForSourceCRSCoordDifferences,
                $scalingFactorForTargetCRSCoordDifferences,
                $A0,
                $B0,
                $powerCoefficients
            );
            $deltaError = [
                'xt' => $forwardShiftedCoordinates['xt'] - $xs,
                'yt' => $forwardShiftedCoordinates['yt'] - $ys,
            ];
            $result['xt'] -= $deltaError['xt'];
            $result['yt'] -= $deltaError['yt'];
        }

        return $result;
    }

    /**
     * Reversible polynomial.
     * @param  array<string, Coefficient>  $powerCoefficients
     * @return array{xt: float, yt: float}
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
