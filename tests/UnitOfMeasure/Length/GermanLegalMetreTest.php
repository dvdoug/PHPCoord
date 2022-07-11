<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class GermanLegalMetreTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new GermanLegalMetre(0.11999836844218346);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new GermanLegalMetre(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new GermanLegalMetre(0.12);
        self::assertEquals('German legal metre', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new GermanLegalMetre(1))->add(new GermanLegalMetre(2));
        self::assertInstanceOf(GermanLegalMetre::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new GermanLegalMetre(4))->subtract(new GermanLegalMetre(3));
        self::assertInstanceOf(GermanLegalMetre::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new GermanLegalMetre(1))->multiply(2.5);
        self::assertInstanceOf(GermanLegalMetre::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new GermanLegalMetre(3))->divide(2);
        self::assertInstanceOf(GermanLegalMetre::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
