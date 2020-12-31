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
