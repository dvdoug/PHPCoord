<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use PHPUnit\Framework\TestCase;

class ArcMinuteTest extends TestCase
{
    public function testAsRadians(): void
    {
        $original = new ArcMinute(60);
        $asRadian = $original->asRadians();
        self::assertInstanceOf(Radian::class, $asRadian);
        self::assertEquals(0.017453292519943, $asRadian->getValue());
    }

    public function testGetValue(): void
    {
        $original = new ArcMinute(60);
        self::assertEquals(60, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new ArcMinute(60);
        self::assertEquals('arcminute', $original->getUnitName());
    }
}
