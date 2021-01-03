<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPUnit\Framework\TestCase;

class GeographicTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Geographic::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    public function testCanCreate2D(): void
    {
        $object = Geographic::fromSRID(Geographic2D::EPSG_WGS_84);
        self::assertInstanceOf(Geographic2D::class, $object);
    }

    public function testCanCreate3D(): void
    {
        $object = Geographic::fromSRID(Geographic3D::EPSG_WGS_84);
        self::assertInstanceOf(Geographic3D::class, $object);
    }

    /**
     * @group integration
     * @dataProvider coordinateReferenceSystems
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = Geographic::fromSRID($srid);
        self::assertInstanceOf(Geographic::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Geographic::fromSRID('foo');
    }

    public function coordinateReferenceSystems(): array
    {
        $data = [];
        foreach (Geographic::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
