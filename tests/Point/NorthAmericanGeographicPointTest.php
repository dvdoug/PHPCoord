<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class NorthAmericanGeographicPointTest extends TestCase
{
    public function testCreateReturnsNorthAmericanGeographicPointForNad83(): void
    {
        $point = GeographicPoint::create(
            Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_2011),
            new Degree(38.8895),
            new Degree(-77.0353),
            null,
        );

        self::assertInstanceOf(NorthAmericanGeographicPoint::class, $point);
    }

    public function testCreateReturnsNorthAmericanGeographicPointForThreeDimensionalNad83(): void
    {
        $point = GeographicPoint::create(
            Geographic3D::fromSRID(Geographic3D::EPSG_NAD83_2011),
            new Degree(38.8895),
            new Degree(-77.0353),
            new Metre(10),
        );

        self::assertInstanceOf(NorthAmericanGeographicPoint::class, $point);
    }

    public function testCreateReturnsNorthAmericanGeographicPointForCanadianDatums(): void
    {
        $datums = [
            Geographic2D::EPSG_NAD83_CSRS,
            Geographic2D::EPSG_NAD83_CSRS96,
            Geographic2D::EPSG_NAD83_CSRS_V8,
            Geographic2D::EPSG_NAD27_76,
            Geographic2D::EPSG_NAD27_CGQ77,
        ];

        foreach ($datums as $srid) {
            $point = GeographicPoint::create(
                Geographic2D::fromSRID($srid),
                new Degree(45),
                new Degree(-75),
                null,
            );

            self::assertInstanceOf(NorthAmericanGeographicPoint::class, $point);
        }
    }

    public function testCreateLeavesWgs84Alone(): void
    {
        $wgs84 = GeographicPoint::create(
            Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84),
            new Degree(38.8895),
            new Degree(-77.0353),
            null,
        );

        self::assertNotInstanceOf(NorthAmericanGeographicPoint::class, $wgs84);
    }

    public function testUSNGFromUtmMetres(): void
    {
        $utm = new UTMPoint(
            Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_2011),
            new Metre(323485),
            new Metre(4306475),
            18,
            UTMPoint::HEMISPHERE_NORTH,
        );

        $point = $utm->asGeographicPoint();
        self::assertInstanceOf(NorthAmericanGeographicPoint::class, $point);
        self::assertSame('18SUJ23480647', $point->asUSNG(8));
        self::assertSame('18S UJ 2348 0647', $point->asUSNGWithSpaces(8));
    }

    public function testFromUSNGRoundTrip(): void
    {
        $point = NorthAmericanGeographicPoint::fromUSNG('18S UJ 2348 0647');

        self::assertSame(Geographic2D::EPSG_NAD83_2011, $point->getCRS()->getSRID());
        self::assertSame('18SUJ23480647', $point->asUSNG(8));
        self::assertSame('18SUJ', $point->asUSNG(0));
    }

    public function testSouthernHemisphereOnNad83Pa11(): void
    {
        $utm = new UTMPoint(
            Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_PA11),
            new Metre(500000),
            new Metre(8412345),
            2,
            UTMPoint::HEMISPHERE_SOUTH,
        );

        $point = $utm->asGeographicPoint();
        self::assertInstanceOf(NorthAmericanGeographicPoint::class, $point);
        self::assertSame('2LNK', $point->asUSNG(0));

        $parsed = NorthAmericanGeographicPoint::fromUSNG('2L NK', crs: Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_PA11));
        self::assertSame(Geographic2D::EPSG_NAD83_PA11, $parsed->getCRS()->getSRID());
        self::assertSame('2LNK', $parsed->asUSNG(0));
    }

    public function testNad27Suffix(): void
    {
        $point = NorthAmericanGeographicPoint::fromUSNG('18S UJ 2348 0647 (NAD 27)');

        self::assertSame(Geographic2D::EPSG_NAD27, $point->getCRS()->getSRID());
        self::assertSame('18S UJ 2348 0647 (NAD 27)', $point->asUSNGWithSpaces(8));
    }

    public function testNatrf2022Suffix(): void
    {
        $point = NorthAmericanGeographicPoint::fromUSNG('18SUJ23480647 (NATRF2022)');

        self::assertSame(Geographic2D::EPSG_NATRF2022E2020, $point->getCRS()->getSRID());
        self::assertSame('18SUJ23480647 (NATRF2022)', $point->asUSNG(8));
    }

    public function testCanadianDatumInsideTheUsArea(): void
    {
        $point = NorthAmericanGeographicPoint::fromUSNG(
            '18S UJ 2348 0647',
            crs: Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_CSRS),
        );

        self::assertSame(Geographic2D::EPSG_NAD83_CSRS, $point->getCRS()->getSRID());
        self::assertSame('18SUJ23480647', $point->asUSNG(8));
    }

    public function testUSNGRejectsAPointOutsideTheUsNad83Areas(): void
    {
        $point = GeographicPoint::create(
            Geographic2D::fromSRID(Geographic2D::EPSG_NATRF2022E2020),
            new Degree(43.6532),
            new Degree(-79.3832),
            null,
        );

        self::assertInstanceOf(NorthAmericanGeographicPoint::class, $point);
        $this->expectException(InvalidCoordinateException::class);
        $point->asUSNG();
    }

    public function testFromUSNGRejectsAPointOutsideTheUsNad83Areas(): void
    {
        $this->expectException(InvalidCoordinateException::class);

        NorthAmericanGeographicPoint::fromUSNG('17TPJ (NATRF2022)');
    }

    public function testSuppliedCrsMustMatchSuffix(): void
    {
        $this->expectException(InvalidCoordinateException::class);

        NorthAmericanGeographicPoint::fromUSNG(
            '18S UJ 2348 0647 (NAD 27)',
            crs: Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_2011),
        );
    }

    public function testRejectsANonNorthAmericanDatum(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);

        NorthAmericanGeographicPoint::fromUSNG(
            '18S UJ 2348 0647',
            crs: Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84),
        );
    }

    public function testRejectsAnOddDigitCount(): void
    {
        $this->expectException(InvalidCoordinateException::class);

        NorthAmericanGeographicPoint::fromUSNG('18SUJ2348064');
    }

    public function testRejectsLatitudeOutsideTheGrid(): void
    {
        $point = GeographicPoint::create(
            Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_2011),
            new Degree(85),
            new Degree(-100),
            null,
        );

        $this->expectException(InvalidCoordinateException::class);
        $point->asUSNG();
    }
}
