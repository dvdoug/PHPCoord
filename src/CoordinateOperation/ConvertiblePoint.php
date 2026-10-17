<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Point\Point;
use Psr\Log\LoggerInterface;

interface ConvertiblePoint
{
    public function convert(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $ignoreBoundaryRestrictions = false, ?DateTimeInterface $epoch = null, ?int $maxChainDepth = null, ?LoggerInterface $logger = null): Point;

    public function atEpoch(DateTimeInterface $targetEpoch): Point;
}
