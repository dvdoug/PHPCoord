<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new Link(0.5965163445478405);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new Link(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new Link(0.12);
        self::assertEquals('link', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new Link(1))->add(new Link(2));
        self::assertInstanceOf(Link::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Link(4))->subtract(new Link(3));
        self::assertInstanceOf(Link::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new Link(1))->multiply(2.5);
        self::assertInstanceOf(Link::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Link(3))->divide(2);
        self::assertInstanceOf(Link::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
