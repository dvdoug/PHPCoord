<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\Exception\UnknownPrimeMeridianException;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

use function count;

class PrimeMeridianTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = PrimeMeridian::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    public function testCanGetSupportedWithHelp(): void
    {
        $supported = PrimeMeridian::getSupportedSRIDsWithHelp();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsArray($value);
        }
    }

    #[DataProvider('primeMeridians')]
    #[Group('integration')]
    public function testCanCreateSupported(string $srid): void
    {
        $object = PrimeMeridian::fromSRID($srid);
        self::assertInstanceOf(PrimeMeridian::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownPrimeMeridianException::class);
        $object = PrimeMeridian::fromSRID('foo');
    }

    public function testGreenwich(): void
    {
        $object = PrimeMeridian::fromSRID(PrimeMeridian::EPSG_GREENWICH);
        self::assertEquals('Greenwich', $object->getName());
        self::assertEquals('0', $object->getGreenwichLongitude()->getValue());
        self::assertInstanceOf(Degree::class, $object->getGreenwichLongitude());
    }

    public static function primeMeridians(): array
    {
        $data = [];
        foreach (PrimeMeridian::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
