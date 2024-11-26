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
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

use function count;

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

    public function testCanGetSupportedWithHelp(): void
    {
        $supported = Datum::getSupportedSRIDsWithHelp();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsArray($value);
        }
    }

    #[DataProvider('datums')]
    #[Group('integration')]
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
        $object = Datum::fromSRID(Datum::EPSG_ORDNANCE_SURVEY_OF_GREAT_BRITAIN_1936);
        self::assertEquals(Datum::DATUM_TYPE_GEODETIC, $object->getDatumType());
        self::assertEquals('6356256.909237285', $object->getEllipsoid()->getSemiMinorAxis()->getValue());
        self::assertInstanceOf(Metre::class, $object->getEllipsoid()->getSemiMinorAxis());
        self::assertEquals(0.0, $object->getPrimeMeridian()->getGreenwichLongitude()->getValue());
    }

    public function testWGS84G1762(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_G1762);
        self::assertEquals('2005-01-01', $object->getFrameReferenceEpoch()->format('Y-m-d'));
    }

    public function testGetFromEnsemble(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE);
        self::assertEquals(Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE), $object);
    }

    public function testWithoutEllipsoid(): void
    {
        $object = Datum::fromSRID(Datum::EPSG_ORDNANCE_DATUM_NEWLYN);
        self::assertEquals(Datum::DATUM_TYPE_VERTICAL, $object->getDatumType());
    }

    public static function datums(): array
    {
        $data = [];
        foreach (Datum::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
