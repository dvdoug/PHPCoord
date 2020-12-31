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

class CompoundTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider coordinateReferenceSystems
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = Compound::fromSRID($srid);
        self::assertInstanceOf(Compound::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Compound::fromSRID('foo');
    }

    public function coordinateReferenceSystems(): array
    {
        $data = [];
        foreach (Compound::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
