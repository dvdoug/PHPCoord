<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Time\Time;
use PHPCoord\UnitOfMeasure\Time\Year;
use PHPUnit\Framework\TestCase;

class RateTest extends TestCase
{
    public function testMetrePerYear(): void
    {
        $original = new Rate(new Metre(0.12), new Year(1));
        self::assertEquals(0.12, $original->getValue());
        self::assertInstanceOf(Metre::class, $original->getChange());
        self::assertEquals(0.12, $original->getChange()->getValue());
        self::assertInstanceOf(Year::class, $original->getTime());
        self::assertEquals(1, $original->getTime()->getValue());
        self::assertEquals('metre per year', $original->getUnitName());
    }

    public function testGetValue(): void
    {
        $original = new Rate(new Metre(0.12), new Year(1));
        self::assertEquals(0.12, $original->getValue());
        self::assertEquals(0.12, $original->__toString());
    }

    public function testGetUnitName(): void
    {
        $original = new Metre(0.12);
        self::assertEquals('metre', $original->getUnitName());
    }

    public function testCanGetSupported(): void
    {
        $supported = Time::getSupportedSRIDs();
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
        $newUnit = Rate::makeUnit(1, $srid);
        self::assertInstanceOf(Rate::class, $newUnit);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownUnitOfMeasureException::class);
        $newUnit = Rate::makeUnit(1, 'foo');
    }

    public function unitsOfMeasure(): array
    {
        $data = [];
        foreach (Rate::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
