<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure\Scale;

use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPUnit\Framework\TestCase;

class UnityTest extends TestCase
{
    public function testAsUnity(): void
    {
        $original = new Unity(0.12);
        $asUnity = $original->asUnity();
        self::assertInstanceOf(Unity::class, $asUnity);
        self::assertEquals(0.12, $asUnity->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Unity(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = new Unity(0.12);
        self::assertEquals('0.12', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Unity(0.12);
        self::assertEquals('', $original->getUnitName());
    }
}
