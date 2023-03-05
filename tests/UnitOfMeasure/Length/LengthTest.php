<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPUnit\Framework\TestCase;

use function count;

class LengthTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Length::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    /**
     * @dataProvider unitsOfMeasure
     */
    public function testCanCreateAllUnits(string $srid): void
    {
        $newUnit = Length::makeUnit(1, $srid);
        self::assertInstanceOf(Length::class, $newUnit);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownUnitOfMeasureException::class);
        $newUnit = Length::makeUnit(1, 'foo');
    }

    public static function unitsOfMeasure(): array
    {
        $data = [];
        foreach (Length::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
