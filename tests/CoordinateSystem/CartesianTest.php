<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\Exception\UnknownCoordinateSystemException;
use PHPUnit\Framework\TestCase;

use function count;

class CartesianTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Cartesian::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    /**
     * @group integration
     * @dataProvider cartesian
     */
    public function testCanCreateSupportedCartesian(string $srid): void
    {
        $object = Cartesian::fromSRID($srid);
        self::assertInstanceOf(CoordinateSystem::class, $object);
    }

    public function testExceptionOnUnknownSRIDCodeCartesian(): void
    {
        $this->expectException(UnknownCoordinateSystemException::class);
        $object = Cartesian::fromSRID('foo');
    }

    public function cartesian(): array
    {
        $data = [];
        foreach (Cartesian::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
