<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class GeographicValueTest extends TestCase
{
    public function test2DToGeocentric(): void
    {
        $crs = CoordinateReferenceSystem::fromSRID(Geographic2D::EPSG_WGS_84);
        $point = new GeographicValue(new Degree(53.809395), new Degree(2.129550), null, $crs->getDatum());
        $asGeocentric = $point->asGeocentricValue();
        self::assertEqualsWithDelta(3771750.843, $asGeocentric->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(140251.738, $asGeocentric->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(5124245.471, $asGeocentric->getZ()->getValue(), 0.1);
    }

    public function test3DToGeocentric(): void
    {
        $crs = CoordinateReferenceSystem::fromSRID(Geographic3D::EPSG_WGS_84);
        $point = new GeographicValue(new Degree(53.809395), new Degree(2.129550), new Metre(73.0), $crs->getDatum());
        $asGeocentric = $point->asGeocentricValue();
        self::assertEqualsWithDelta(3771793.968, $asGeocentric->getX()->getValue(), 0.1);
        self::assertEqualsWithDelta(140253.342, $asGeocentric->getY()->getValue(), 0.1);
        self::assertEqualsWithDelta(5124304.349, $asGeocentric->getZ()->getValue(), 0.1);
    }
}
