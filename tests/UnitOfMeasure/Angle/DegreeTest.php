<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure\Angle;

use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPUnit\Framework\TestCase;

class DegreeTest extends TestCase
{
    public function testAsRadians(): void
    {
        $original = new Degree(1);
        $asRadian = $original->asRadians();
        self::assertInstanceOf(Radian::class, $asRadian);
        self::assertEquals(0.017453292519943, $asRadian->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Degree(1);
        self::assertEquals(1, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = new Degree(1);
        self::assertEquals('1°', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Degree(1);
        self::assertEquals('degree', $original->getUnitName());
    }
}
