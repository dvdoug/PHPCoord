<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use function count;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPUnit\Framework\TestCase;

class Geographic2DTest extends TestCase
{
    use Geographic2DSRIDData;

    public function testCanGetSupported(): void
    {
        $supported = Geographic2D::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    /**
     * @group integration
     * @dataProvider coordinateReferenceSystems
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = Geographic2D::fromSRID($srid);
        self::assertInstanceOf(Geographic2D::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Geographic2D::fromSRID('foo');
    }

    public function coordinateReferenceSystems(): array
    {
        $return = [];
        foreach (static::$sridData as $srid => $data) {
            $return[$data['name']] = [$srid];
        }

        return $return;
    }
}
