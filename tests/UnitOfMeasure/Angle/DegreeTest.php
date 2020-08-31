<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use InvalidArgumentException;
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

    public function testDMSHemisphereDegreeOnly(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1N');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMSHemisphereDegreeAndSymbolOnly(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°N');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMSHemisphereDegreeAndMinutesOnly(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°30′E');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSHemisphereDegreeAndMinutesOnlyQuoteAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°30\'N');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSHemisphereZeroSeconds(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°30′0″E');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSHemisphereQuotesAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°30\'0"N');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMSHemisphereFractionalSeconds(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°30′30.75″E');
        self::assertEquals(1.5085416666666667, $original->getValue());
    }

    public function testDMSWestHemisphereDegreeFractionalSeconds(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°30′30.75″W');
        self::assertEquals(-1.5085416666666667, $original->getValue());
    }

    public function testDMSSouthHemisphereDegreeFractionalSeconds(): void
    {
        $original = Degree::fromDegreeMinuteSecondHemisphere('1°30′30.75″S');
        self::assertEquals(-1.5085416666666667, $original->getValue());
    }

    public function testDMSHemisphereInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromDegreeMinuteSecondHemisphere('1deg30′30.75″');
    }

    public function testDMHemisphereDegreeOnly(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1N');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMHemisphereDegreeAndSymbolOnly(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°N');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMHemisphereDegreeAndMinutesOnly(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°30′E');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMHemisphereDegreeAndMinutesOnlyQuoteAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°30\'N');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMHemisphereZeroMinutes(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°0′E');
        self::assertEquals(1, $original->getValue());
    }

    public function testDMHemisphereQuotesAsSymbol(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°30\'N');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDMHemisphereFractionalMinutes(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°30.75′E');
        self::assertEquals(1.5125, $original->getValue());
    }

    public function testDMWestHemisphereDegreeFractionalMinutes(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°30.75′W');
        self::assertEquals(-1.5125, $original->getValue());
    }

    public function testDMSouthHemisphereDegreeFractionalMinutes(): void
    {
        $original = Degree::fromDegreeMinuteHemisphere('1°30.75′S');
        self::assertEquals(-1.5125, $original->getValue());
    }

    public function testDMHemisphereInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromDegreeMinuteHemisphere('1deg30′30.75″');
    }

    public function testDHemisphereDegreeOnly(): void
    {
        $original = Degree::fromDegreeHemisphere('1N');
        self::assertEquals(1, $original->getValue());
    }

    public function testDHemisphereDegreeAndSymbolOnly(): void
    {
        $original = Degree::fromDegreeHemisphere('1°N');
        self::assertEquals(1, $original->getValue());
    }

    public function testDHemisphereFractionalDegree(): void
    {
        $original = Degree::fromDegreeHemisphere('1.5°E');
        self::assertEquals(1.5, $original->getValue());
    }

    public function testDWestHemisphereDegreeFractionalDegree(): void
    {
        $original = Degree::fromDegreeHemisphere('1.5°W');
        self::assertEquals(-1.5, $original->getValue());
    }

    public function testDSouthHemisphereDegreeFractionalMinutes(): void
    {
        $original = Degree::fromDegreeHemisphere('1.5°S');
        self::assertEquals(-1.5, $original->getValue());
    }

    public function testDHemisphereInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromDegreeHemisphere('1deg30′30.75″');
    }

    public function testSexagesimalDMSS(): void
    {
        $original = Degree::fromSexagesimalDMSS('10000.00');
        self::assertEquals(1, $original->getValue());
    }

    public function testSexagesimalDMSSNegative(): void
    {
        $original = Degree::fromSexagesimalDMSS('-10000.00');
        self::assertEquals(-1, $original->getValue());
    }

    public function testSexagesimalDMSSInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromSexagesimalDMSS('1deg30′30.75″');
    }

    public function testSexagesimalDMS(): void
    {
        $original = Degree::fromSexagesimalDMS('35.3');
        self::assertEquals(35.5, $original->getValue());
    }

    public function testSexagesimalDMSNegative(): void
    {
        $original = Degree::fromSexagesimalDMS('-35.3');
        self::assertEquals(-35.5, $original->getValue());
    }

    public function testSexagesimalDMSInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromSexagesimalDMS('1deg30′30.75″');
    }

    public function testSexagesimalDM(): void
    {
        $original = Degree::fromSexagesimalDM('35.3');
        self::assertEquals(35.5, $original->getValue());
    }

    public function testSexagesimalDMNegative(): void
    {
        $original = Degree::fromSexagesimalDM('-35.3');
        self::assertEquals(-35.5, $original->getValue());
    }

    public function testSexagesimalDMInvalidAngle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $original = Degree::fromSexagesimalDM('1deg30′30.75″');
    }
}
