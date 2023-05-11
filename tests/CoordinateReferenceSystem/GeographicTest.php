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

use function count;

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

    public function testCanGetSupportedwithHelp(): void
    {
        $supported = Geographic::getSupportedSRIDsWithHelp();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsArray($value);
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

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Geographic::fromSRID('foo');
    }
}
