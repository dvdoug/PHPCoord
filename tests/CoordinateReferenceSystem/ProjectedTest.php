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

class ProjectedTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Projected::getSupportedSRIDs();
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
        $object = Projected::fromSRID($srid);
        self::assertInstanceOf(Projected::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Projected::fromSRID('foo');
    }

    public function coordinateReferenceSystems(): array
    {
        $data = [];
        foreach (Projected::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
