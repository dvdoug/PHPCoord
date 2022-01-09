<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class USSurveyFootTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new USSurveyFoot(0.3937);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new USSurveyFoot(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new USSurveyFoot(0.12);
        self::assertEquals('US survey foot', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new USSurveyFoot(1))->add((new USSurveyFoot(2)));
        self::assertInstanceOf(USSurveyFoot::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new USSurveyFoot(4))->subtract((new USSurveyFoot(3)));
        self::assertInstanceOf(USSurveyFoot::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new USSurveyFoot(1))->multiply(2.5);
        self::assertInstanceOf(USSurveyFoot::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new USSurveyFoot(3))->divide(2);
        self::assertInstanceOf(USSurveyFoot::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
