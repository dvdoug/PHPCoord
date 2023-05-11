<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPUnit\Framework\TestCase;

use function count;

class ScaleTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Scale::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    public function testCanGetSupportedWithHelp(): void
    {
        $supported = Scale::getSupportedSRIDsWithHelp();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsArray($value);
        }
    }

    /**
     * @dataProvider unitsOfMeasure
     */
    public function testCanCreateAllUnits(string $srid): void
    {
        $newUnit = Scale::makeUnit(1, $srid);
        self::assertInstanceOf(Scale::class, $newUnit);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownUnitOfMeasureException::class);
        $newUnit = Scale::makeUnit(1, 'foo');
    }

    public static function unitsOfMeasure(): array
    {
        $data = [];
        foreach (Scale::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
