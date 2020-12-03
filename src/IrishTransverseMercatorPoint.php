<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\UnitOfMeasure\Length\Length;

/**
 * N.B. This is the current ITM system, for the older 1975 system @see IrishGridPoint.
 */
class IrishTransverseMercatorPoint extends ProjectedPoint
{
    public function __construct(Length $easting, Length $northing, ?DateTimeInterface $epoch = null)
    {
        parent::__construct($easting, $northing, null, null, Projected::fromSRID(Projected::EPSG_IRENET95_IRISH_TRANSVERSE_MERCATOR), $epoch);
    }
}
