<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use PHPUnit\Framework\TestCase;

class ArcSecondTest extends TestCase
{
    public function testAsRadians(): void
    {
        $original = new ArcSecond(3600);
        $asRadian = $original->asRadians();
        self::assertInstanceOf(Radian::class, $asRadian);
        self::assertEqualsWithDelta(0.017453292519943, $asRadian->getValue(), 0.00000000000001);
    }

    public function testGetValue(): void
    {
        $original = new ArcSecond(3600);
        self::assertEquals(3600, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new ArcSecond(3600);
        self::assertEquals('arc-second', $original->getUnitName());
    }
}
