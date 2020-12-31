<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTimeImmutable;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use Stringable;

abstract class Point implements Stringable
{
    protected const NEWTON_RAPHSON_CONVERGENCE = 1e-16;

    abstract public function getCRS(): CoordinateReferenceSystem;

    abstract public function getCoordinateEpoch(): ?DateTimeImmutable;

    abstract public function calculateDistance(self $to): Length;

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
}
