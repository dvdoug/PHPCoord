<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\Exception\UnknownEllipsoidException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

use function count;

class EllipsoidTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Ellipsoid::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    public function testCanGetSupportedWithHelp(): void
    {
        $supported = Ellipsoid::getSupportedSRIDsWithHelp();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsArray($value);
        }
    }

    #[DataProvider('ellipsoids')]
    #[Group('integration')]
    public function testCanCreateSupported(string $srid): void
    {
        $object = Ellipsoid::fromSRID($srid);
        self::assertInstanceOf(Ellipsoid::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownEllipsoidException::class);
        $object = Ellipsoid::fromSRID('foo');
    }

    public function testAiry1830(): void
    {
        $object = Ellipsoid::fromSRID(Ellipsoid::EPSG_AIRY_1830);
        self::assertEquals('6377563.396', $object->getSemiMajorAxis()->getValue());
        self::assertEquals('6356256.909237285', $object->getSemiMinorAxis()->getValue());
    }

    public static function ellipsoids(): array
    {
        $data = [];
        foreach (Ellipsoid::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
