<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\Exception\UnknownPrimeMeridianException;
use PHPUnit\Framework\TestCase;

class PrimeMeridianTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider primeMeridians
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = PrimeMeridian::fromSRID($srid);
        self::assertInstanceOf(PrimeMeridian::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownPrimeMeridianException::class);
        $object = PrimeMeridian::fromSRID('foo');
    }

    public function testGreenwich(): void
    {
        $object = PrimeMeridian::fromSRID(PrimeMeridian::EPSG_GREENWICH);
        self::assertEquals('Greenwich', $object->getName());
        self::assertEquals('0°', $object->getGreenwichLongitude()->getFormattedValue());
    }

    public function primeMeridians(): array
    {
        $data = [];
        foreach (PrimeMeridian::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
