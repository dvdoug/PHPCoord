<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class GeocentricValueTest extends TestCase
{
    public function testToGeographic(): void
    {
        $crs = CoordinateReferenceSystem::fromEPSGCode(Geocentric::EPSG_WGS_84);
        $point = new GeocentricValue(new Metre(3771793.968), new Metre(140253.342), new Metre(5124304.349), $crs->getDatum());
        $asGeographic = $point->asGeographicValue();
        self::assertEqualsWithDelta(53.809395, rad2deg($asGeographic->getLatitude()->getValue()), 0.000001);
        self::assertEqualsWithDelta(2.129550, rad2deg($asGeographic->getLongitude()->getValue()), 0.000001);
        self::assertEqualsWithDelta(73.0, $asGeographic->getHeight()->getValue(), 0.01);
    }
}
