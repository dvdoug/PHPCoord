<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\Exception\UnknownDatumException;
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
        self::assertEquals('6356256.9092373m', $object->getEllipsoid()->getSemiMinorAxis()->getFormattedValue());
        self::assertEquals(0.0, $object->getPrimeMeridian()->getGreenwichLongitude()->getValue());
    }

    public function testWGS84_G1762(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_G1762);
        self::assertEquals(2005, $object->getFrameReferenceEpoch());
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
