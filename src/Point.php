<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use function abs;
use function acos;
use function array_reverse;
use function array_values;
use function asin;
use function atan;
use function atan2;
use function cos;
use DateTimeImmutable;
use function in_array;
use function lcfirst;
use const M_PI;
use const PHP_MAJOR_VERSION;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperationParams;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use function preg_match;
use function sin;
use function sqrt;
use function sscanf;
use function str_replace;
use Stringable;
use function tan;
use function ucwords;

abstract class Point implements Stringable
{
    protected const ITERATION_CONVERGENCE = 1e-12;

    /**
     * @internal
     */
    public function performOperation(string $srid, CoordinateReferenceSystem $to, bool $inReverse, array $additionalParams = []): self
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

            if ($operation['method'] === CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_AND_SLOPE) {
                $params['horizontalPoint'] = $additionalParams['horizontalPoint'];
            }

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
        if (!preg_match('/^(EPSG|[ABC][uv\d])/', $string)) {
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
     * Calculate surface distance between two points.
     */
    protected static function vincenty(GeographicValue $from, GeographicValue $to, Ellipsoid $ellipsoid): Length
    {
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $b = $ellipsoid->getSemiMinorAxis()->asMetres()->getValue();
        $f = $ellipsoid->getInverseFlattening();
        $U1 = atan((1 - $f) * tan($from->getLatitude()->asRadians()->getValue()));
        $U2 = atan((1 - $f) * tan($to->getLatitude()->asRadians()->getValue()));
        $L = $to->getLongitude()->subtract($from->getLongitude())->asRadians()->getValue();

        $lambda = $L;
        do {
            $lambdaN = $lambda;

            $sinSigma = sqrt((cos($U2) * sin($lambda)) ** 2 + (cos($U1) * sin($U2) - sin($U1) * cos($U2) * cos($lambda)) ** 2);
            $cosSigma = sin($U1) * sin($U2) + cos($U1) * cos($U2) * cos($lambda);
            $sigma = atan2($sinSigma, $cosSigma);

            $sinAlpha = cos($U1) * cos($U2) * sin($lambda) / $sinSigma;
            $cosSqAlpha = (1 - $sinAlpha ** 2);
            $cos2SigmaM = $cosSqAlpha ? $cosSigma - (2 * sin($U1) * sin($U2) / $cosSqAlpha) : 0;
            $C = $f / 16 * $cosSqAlpha * (4 + $f * (4 - 3 * $cosSqAlpha));
            $lambda = $L + (1 - $C) * $f * $sinAlpha * ($sigma + $C * $sinSigma * ($cos2SigmaM + $C * $cosSigma * (-1 + 2 * $cos2SigmaM ** 2)));
        } while (abs($lambda - $lambdaN) >= static::ITERATION_CONVERGENCE && abs($lambda) < M_PI);

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
                $cos2SigmaM = cos($sigma) - 2 * sin($U1) * sin($U2) / $cosSqAlpha;
                $D = (1 - $C) * $f * ($sigma + $C * $sinSigma * ($cos2SigmaM + $C * cos($sigma) * (-1 + 2 * $cos2SigmaM ** 2)));
                $sinAlpha = ($LPrime - $lambdaPrime) / $D;
                $cosSqAlpha = (1 - $sinAlpha ** 2);
                $sinLambdaPrime = ($sinAlpha * $sinSigma) / (cos($U1) * cos($U2));
                $lambdaPrime = self::asin($sinLambdaPrime);
                $sinSqSigma = (cos($U2) * $sinLambdaPrime) ** 2 + (cos($U1) * sin($U2) + sin($U1) * cos($U2) * cos($lambdaPrime)) ** 2;
                $sinSigma = sqrt($sinSqSigma);
            } while (abs($sinAlpha - $sinAlphaN) >= static::ITERATION_CONVERGENCE);
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

    abstract public function getCRS();

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract public function calculateDistance(self $to): Length;
}
