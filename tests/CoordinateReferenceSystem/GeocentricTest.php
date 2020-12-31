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

class GeocentricTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider coordinateReferenceSystems
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = Geocentric::fromSRID($srid);
        self::assertInstanceOf(Geocentric::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Geocentric::fromSRID('foo');
    }

    public function coordinateReferenceSystems(): array
    {
        $data = [];
        foreach (Geocentric::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
