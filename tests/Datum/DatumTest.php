<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\Exception\UnknownDatumException;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class DatumTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Datum::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    /**
     * @group integration
     * @dataProvider datums
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = Datum::fromSRID($srid);
        self::assertInstanceOf(Datum::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownDatumException::class);
        $object = Datum::fromSRID('foo');
    }

    public function testOSGB36(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_OSGB_1936);
        self::assertEquals(Datum::DATUM_TYPE_GEODETIC, $object->getDatumType());
        self::assertEquals('6356256.909237285', $object->getEllipsoid()->getSemiMinorAxis()->getValue());
        self::assertInstanceOf(Metre::class, $object->getEllipsoid()->getSemiMinorAxis());
        self::assertEquals(0.0, $object->getPrimeMeridian()->getGreenwichLongitude()->getValue());
    }

    public function testWGS84G1762(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_G1762);
        self::assertEquals(2005, $object->getFrameReferenceEpoch());
    }

    public function testGetLatestFromEnsemble(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE);
        self::assertEquals(Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_G1762), $object);
    }

    public function testWithoutEllipsoid(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_ORDNANCE_DATUM_NEWLYN);
        self::assertEquals(Datum::DATUM_TYPE_VERTICAL, $object->getDatumType());
    }

    public function datums(): array
    {
        $data = [];
        foreach (Datum::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
