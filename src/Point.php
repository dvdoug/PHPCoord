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
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\CoordinateOperation\GridProvider;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use Stringable;

use function abs;
use function acos;
use function asin;
use function atan;
use function atan2;
use function cos;
use function sin;
use function sqrt;
use function sscanf;
use function str_starts_with;
use function tan;
use function str_ends_with;
use function class_exists;

use const M_PI;

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
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_NRCAN_BYN => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_NRCAN_BYN,
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
        CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_NRCAN_BYN => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_NRCAN_BYN,
    ];

    private static array $gridCache = [];

    /**
     * @internal
     */
    public function performOperation(string $srid, Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $inReverse, array $additionalParams = []): self
    {
        $operation = CoordinateOperations::getOperationData($srid);

        if ($operation['method'] === CoordinateOperationMethods::EPSG_ALIAS) {
            $point = clone $this;
            $point->crs = $to;

            return $point;
        } else {
            $method = CoordinateOperationMethods::getFunctionName($operation['method']);
            $params = self::resolveParamsByOperation($srid, $operation['method'], $inReverse);

            if (isset(self::METHODS_REQUIRING_HORIZONTAL_POINT[$operation['method']])) {
                $params['horizontalPoint'] = $additionalParams['horizontalPoint'];
            }

            return $this->$method($to, ...$params);
        }
    }

    protected static function resolveParamsByOperation(string $operationSrid, string $methodSrid, bool $inReverse): array
    {
        $methodData = CoordinateOperationMethods::getMethodData($methodSrid);

        $params = [];
        $powerCoefficients = [];
        foreach (CoordinateOperations::getParamData($operationSrid) as $paramName => $paramValue) {
            if (str_ends_with($paramName, 'File') && $paramValue !== null && class_exists($paramValue) && new $paramValue() instanceof GridProvider) {
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
     * Calculate surface distance between two points.
     */
    protected static function vincenty(GeographicValue $from, GeographicValue $to, Ellipsoid $ellipsoid): Length
    {
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $b = $ellipsoid->getSemiMinorAxis()->asMetres()->getValue();
        $f = $ellipsoid->getFlattening();
        $U1 = atan((1 - $f) * tan($from->getLatitude()->asRadians()->getValue()));
        $U2 = atan((1 - $f) * tan($to->getLatitude()->asRadians()->getValue()));
        $L = $to->getLongitude()->subtract($from->getLongitude())->asRadians()->getValue();

        $lambda = $L;
        do {
            $lambdaN = $lambda;

            $sinSigma = sqrt((cos($U2) * sin($lambda)) ** 2 + (cos($U1) * sin($U2) - sin($U1) * cos($U2) * cos($lambda)) ** 2);
            $cosSigma = sin($U1) * sin($U2) + cos($U1) * cos($U2) * cos($lambda);
            $sigma = atan2($sinSigma, $cosSigma);

            $sinAlpha = $sinSigma ? (cos($U1) * cos($U2) * sin($lambda) / $sinSigma) : 0;
            $cosSqAlpha = (1 - $sinAlpha ** 2);
            $cos2SigmaM = $cosSqAlpha ? $cosSigma - (2 * sin($U1) * sin($U2) / $cosSqAlpha) : 0;
            $C = $f / 16 * $cosSqAlpha * (4 + $f * (4 - 3 * $cosSqAlpha));
            $lambda = $L + (1 - $C) * $f * $sinAlpha * ($sigma + $C * $sinSigma * ($cos2SigmaM + $C * $cosSigma * (-1 + 2 * $cos2SigmaM ** 2)));
        } while (abs($lambda - $lambdaN) >= static::ITERATION_CONVERGENCE_FORMULA && abs($lambda) < M_PI);

        // Antipodal case
        if (abs($lambda) >= M_PI) {
            if ($L >= 0) {
                $LPrime = M_PI - $L;
            } else {
                $LPrime = -M_PI - $L;
            }

            $lambdaPrime = 0;
            $sigma = M_PI - abs($U1 + $U2);
            $sinSigma = sin($sigma);
            $cosSqAlpha = 0.5;
            $sinAlpha = 0;

            do {
                $sinAlphaN = $sinAlpha;

                $C = $f / 16 * $cosSqAlpha * (4 + $f * (4 - 3 * $cosSqAlpha));
                $cos2SigmaM = $cosSqAlpha ? cos($sigma) - 2 * sin($U1) * sin($U2) / $cosSqAlpha : 0;
                $D = (1 - $C) * $f * ($sigma + $C * $sinSigma * ($cos2SigmaM + $C * cos($sigma) * (-1 + 2 * $cos2SigmaM ** 2)));
                $sinAlpha = ($LPrime - $lambdaPrime) / $D;
                $cosSqAlpha = (1 - $sinAlpha ** 2);
                $sinLambdaPrime = ($sinAlpha * $sinSigma) / (cos($U1) * cos($U2));
                $lambdaPrime = self::asin($sinLambdaPrime);
                $sinSqSigma = (cos($U2) * $sinLambdaPrime) ** 2 + (cos($U1) * sin($U2) + sin($U1) * cos($U2) * cos($lambdaPrime)) ** 2;
                $sinSigma = sqrt($sinSqSigma);
            } while (abs($sinAlpha - $sinAlphaN) >= static::ITERATION_CONVERGENCE_FORMULA);
        }

        $E = sqrt(1 + (($a ** 2 - $b ** 2) / $b ** 2) * $cosSqAlpha);
        $F = ($E - 1) / ($E + 1);

        $A = (1 + $F ** 2 / 4) / (1 - $F);
        $B = $F * (1 - 3 / 8 * $F ** 2);

        $deltaSigma = $B * $sinSigma * ($cos2SigmaM + $B / 4 * ($cosSigma * (-1 + 2 * $cos2SigmaM ** 2) - $B / 6 * $cos2SigmaM * (-3 + 4 * $sinSigma ** 2) * (-3 + 4 * $cos2SigmaM ** 2)));

        return new Metre($b * $A * ($sigma - $deltaSigma));
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
