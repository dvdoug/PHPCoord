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

class VerticalTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Vertical::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    /**
     * @group integration
     * @dataProvider vertical
     */
    public function testCanCreateSupportedVertical(string $srid): void
    {
        $object = Vertical::fromSRID($srid);
        self::assertInstanceOf(CoordinateSystem::class, $object);
    }

    public function testExceptionOnUnknownSRIDCodeVertical(): void
    {
        $this->expectException(UnknownCoordinateSystemException::class);
        $object = Vertical::fromSRID('foo');
    }

    public function vertical(): array
    {
        $data = [];
        foreach (Vertical::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
