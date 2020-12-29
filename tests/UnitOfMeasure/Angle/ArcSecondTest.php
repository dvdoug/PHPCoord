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
        self::assertEquals(0.017453292519943, $asRadian->getValue());
    }

    public function testGetValue(): void
    {
        $original = new ArcSecond(3600);
        self::assertEquals(3600, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new ArcSecond(3600);
        self::assertEquals('arcsecond', $original->getUnitName());
    }
}
