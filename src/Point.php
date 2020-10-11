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
use PHPCoord\UnitOfMeasure\Length\Length;
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
}
