<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use function count;
use PHPCoord\Exception\UnknownPrimeMeridianException;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPUnit\Framework\TestCase;

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

    /**
     * @group integration
     * @dataProvider primeMeridians
     */
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

    public function primeMeridians(): array
    {
        $data = [];
        foreach (PrimeMeridian::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
