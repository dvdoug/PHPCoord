<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use function count;
use PHPCoord\Exception\UnknownEllipsoidException;
use PHPUnit\Framework\TestCase;

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

    /**
     * @group integration
     * @dataProvider ellipsoids
     */
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

    public function ellipsoids(): array
    {
        $data = [];
        foreach (Ellipsoid::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
