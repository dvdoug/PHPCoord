<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\UnitOfMeasure\Length\Length;

use function class_alias;
use function class_exists;

/**
 * N.B. This is the current ITM system, for the older 1975 system @see IrishGridPoint.
 */
class IrishTransverseMercatorPoint extends ProjectedPoint
{
    public function __construct(Length $easting, Length $northing, ?DateTimeInterface $epoch = null, ?Length $accuracy = null)
    {
        parent::__construct(Projected::fromSRID(Projected::EPSG_IRENET95_IRISH_TRANSVERSE_MERCATOR), $easting, $northing, null, null, $epoch, null, $accuracy);
    }
}

if (!class_exists('PHPCoord\IrishTransverseMercatorPoint', false)) {
    class_alias(IrishTransverseMercatorPoint::class, 'PHPCoord\IrishTransverseMercatorPoint');
}
