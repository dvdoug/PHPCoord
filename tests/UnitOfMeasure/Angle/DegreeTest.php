<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure\Angle;

use InvalidArgumentException;
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

    public function testDMSDegreeOnly(): void
    {
        $original = Degree::fromDegreeMinuteSecond('1');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMSDegreeAndSymbolOnly(): void
    {
        $original = Degree::fromDegreeMinuteSecond('1°');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMSDegreeAndMinutesOnly(): void
    {
        $original = Degree::fromDegreeMinuteSecond('1°30′');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSDegreeAndMinutesOnlyQuoteAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteSecond('1°30\'');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSZeroSeconds(): void
    {
        $original = Degree::fromDegreeMinuteSecond('1°30′0″');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSQuotesAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteSecond('1°30\'0"');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSFractionalSeconds(): void
    {
        $original = Degree::fromDegreeMinuteSecond('1°30′30.75″');
        self::assertEquals(1.5085416666666667, $original->getValue());
    }

    public function testDMSNegativeDegreeFractionalSecondsMinusAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteSecond('-1°30′30.75″');
        self::assertEquals(-1.5085416666666667, $original->getValue());
    }

    public function testDMSNegativeDegreeFractionalSecondsHyphenMinusAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteSecond('−1°30′30.75″');
        self::assertEquals(-1.5085416666666667, $original->getValue());
    }

    public function testDMSInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromDegreeMinuteSecond('1deg30′30.75″');
    }

    public function testDMDegreeOnly(): void
    {
        $original = Degree::fromDegreeMinute('1');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMDegreeAndSymbolOnly(): void
    {
        $original = Degree::fromDegreeMinute('1°');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMDegreeAndMinutesOnly(): void
    {
        $original = Degree::fromDegreeMinute('1°30′');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMDegreeAndMinutesOnlyQuoteAsSymbol(): void
    {
        $original = Degree::fromDegreeMinute('1°30\'');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMZeroMinutes(): void
    {
        $original = Degree::fromDegreeMinute('1°0′');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMFractionalSeconds(): void
    {
        $original = Degree::fromDegreeMinute('1°30.75′');
        self::assertEquals(1.5125, $original->getValue());
    }

    public function testDMNegativeDegreeFractionalSecondsMinusAsSymbol(): void
    {
        $original = Degree::fromDegreeMinute('-1°30.75′');
        self::assertEquals(-1.5125, $original->getValue());
    }

    public function testDMNegativeDegreeFractionalSecondsHyphenMinusAsSymbol(): void
    {
        $original = Degree::fromDegreeMinute('−1°30.75′');
        self::assertEquals(-1.5125, $original->getValue());
    }

    public function testDMInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromDegreeMinute('1deg30.75′');
    }
}
