<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownDatumException;
use PHPUnit\Framework\TestCase;

class DatumTest extends TestCase
{
    /**
     * @dataProvider datums
     */
    public function testCanCreateAllInDB(int $epsgCode): void
    {
        $object = Datum::fromEPSGCode($epsgCode);
        self::assertInstanceOf(Datum::class, $object);
    }

    public function testExceptionOnUnknownEPSGCode(): void
    {
        $this->expectException(UnknownDatumException::class);
        $object = Datum::fromEPSGCode(PHP_INT_MAX);
    }

    public function testOSGB36(): void
    {
        $object = Datum::fromEPSGCode(Datum::EPSG_OSGB_1936);
        self::assertEquals(Datum::DATUM_TYPE_GEODETIC, $object->getDatumType());
        self::assertEquals('6356256.9092373m', $object->getEllipsoid()->getSemiMinorAxis()->getFormattedValue());
        self::assertEquals(0.0, $object->getPrimeMeridian()->getGreenwichLongitude()->getValue());
    }

    public function testWGS84_G1762(): void
    {
        $object = Datum::fromEPSGCode(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_G1762);
        self::assertEquals(2005, $object->getFrameReferenceEpoch());
    }

    public function datums(): array
    {
        $repository = new Repository();

        $data = [];
        foreach ($repository->getDatums() as $ellipsoid) {
            $data[$ellipsoid['datum_name']] = [$ellipsoid['datum_code']];
        }

        return $data;
    }
}
