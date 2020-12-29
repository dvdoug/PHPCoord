<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class USSurveyChainTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new USSurveyChain(0.0059651515151515145);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new USSurveyChain(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new USSurveyChain(0.12);
        self::assertEquals('US survey chain', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new USSurveyChain(1))->add((new USSurveyChain(2)));
        self::assertInstanceOf(USSurveyChain::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new USSurveyChain(4))->subtract((new USSurveyChain(3)));
        self::assertInstanceOf(USSurveyChain::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new USSurveyChain(1))->multiply(2.5);
        self::assertInstanceOf(USSurveyChain::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new USSurveyChain(3))->divide(2);
        self::assertInstanceOf(USSurveyChain::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
