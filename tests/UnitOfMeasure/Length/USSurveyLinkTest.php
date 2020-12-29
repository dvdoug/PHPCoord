<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class USSurveyLinkTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new USSurveyLink(0.5965151515151516);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEquals(0.12, $asMetre->getValue());
    }

    public function testGetValue(): void
    {
        $original = new USSurveyLink(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new USSurveyLink(0.12);
        self::assertEquals('US survey link', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new USSurveyLink(1))->add((new USSurveyLink(2)));
        self::assertInstanceOf(USSurveyLink::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new USSurveyLink(4))->subtract((new USSurveyLink(3)));
        self::assertInstanceOf(USSurveyLink::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new USSurveyLink(1))->multiply(2.5);
        self::assertInstanceOf(USSurveyLink::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new USSurveyLink(3))->divide(2);
        self::assertInstanceOf(USSurveyLink::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
