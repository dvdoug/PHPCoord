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
        self::assertEqualsWithDelta(0.017453292519943, $asRadian->getValue(), 0.00000000000001);
    }

    public function testGetValue(): void
    {
        $original = new Degree(1);
        self::assertEquals(1, $original->getValue());
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

    public function testSexagesimalDMSFractionalSeconds(): void
    {
        $original = Degree::fromSexagesimalDMS('52.0922178');
        self::assertEqualsWithDelta(0.910296727, $original->asRadians()->getValue(), 0.000000001);
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

    public function testAdd(): void
    {
        $result = (new Degree(20))->add(new Degree(24));
        self::assertInstanceOf(Degree::class, $result);
        self::assertEquals(44, $result->getValue());
    }

    public function testAddMixedUnit(): void
    {
        $result = (new Degree(20))->add(new ArcSecond(3600));
        self::assertInstanceOf(Degree::class, $result);
        self::assertEquals(21, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new Degree(20))->subtract(new Degree(24));
        self::assertInstanceOf(Degree::class, $result);
        self::assertEquals(-4, $result->getValue());
    }

    public function testSubtractMixedUnit(): void
    {
        $result = (new Degree(20))->subtract(new ArcSecond(3600));
        self::assertInstanceOf(Degree::class, $result);
        self::assertEqualsWithDelta(19, $result->getValue(), 0.00000000000001);
    }

    public function testMultiply(): void
    {
        $result = (new Degree(20))->multiply(4);
        self::assertInstanceOf(Degree::class, $result);
        self::assertEquals(80, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new Degree(20))->divide(4);
        self::assertInstanceOf(Degree::class, $result);
        self::assertEquals(5, $result->getValue());
    }

    public function testFormatStatueOfLiberty(): void
    {
        $latitude = new Degree(40.689167);
        $longitude = new Degree(-74.044444);

        self::assertSame('40.689167', $latitude->formatAs(Angle::EPSG_DEGREE, true));
        self::assertSame('40.689167°N', $latitude->formatAs(Angle::EPSG_DEGREE_HEMISPHERE, true));
        self::assertSame('N40.689167°', $latitude->formatAs(Angle::EPSG_HEMISPHERE_DEGREE, true));
        self::assertSame('40°41′21.0012″', $latitude->formatAs(Angle::EPSG_DEGREE_MINUTE_SECOND, true));
        self::assertSame('40°41′21.0012″N', $latitude->formatAs(Angle::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE, true));
        self::assertSame('N40°41′21.0012″', $latitude->formatAs(Angle::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND, true));
        self::assertSame('40.41210012', $latitude->formatAs(Angle::EPSG_SEXAGESIMAL_DMS, true));

        self::assertSame('-74.044444', $longitude->formatAs(Angle::EPSG_DEGREE, false));
        self::assertSame('74.044444°W', $longitude->formatAs(Angle::EPSG_DEGREE_HEMISPHERE, false));
        self::assertSame('W74.044444°', $longitude->formatAs(Angle::EPSG_HEMISPHERE_DEGREE, false));
        self::assertSame('-74°2′39.9984″', $longitude->formatAs(Angle::EPSG_DEGREE_MINUTE_SECOND, false));
        self::assertSame('74°2′39.9984″W', $longitude->formatAs(Angle::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE, false));
        self::assertSame('W74°2′39.9984″', $longitude->formatAs(Angle::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND, false));
        self::assertSame('-74.02399984', $longitude->formatAs(Angle::EPSG_SEXAGESIMAL_DMS, false));
    }

    public function testFormatUsesTheRequestedDecimalPlaces(): void
    {
        $latitude = new Degree(-33.85859491);

        self::assertSame('-33.8585949', $latitude->formatAs(Angle::EPSG_DEGREE, true, 7));
        self::assertSame('33.8585949°S', $latitude->formatAs(Angle::EPSG_DEGREE_HEMISPHERE, true, 7));
        self::assertSame('-33°51′30.942″', $latitude->formatAs(Angle::EPSG_DEGREE_MINUTE_SECOND, true, 7));
        self::assertSame('-33.5130942', $latitude->formatAs(Angle::EPSG_SEXAGESIMAL_DMS, true, 7));
    }

    public function testFormatCarriesSecondsIntoTheNextMinute(): void
    {
        $angle = new Degree(59.99996 / 3600);

        self::assertSame('0°1′0.0000″', $angle->formatAs(Angle::EPSG_DEGREE_MINUTE_SECOND, true));
        self::assertSame('0.01000000', $angle->formatAs(Angle::EPSG_SEXAGESIMAL_DMS, true));
    }

    public function testFormatZeroHemisphereIsNorthOrEast(): void
    {
        $latitude = new Degree(0);
        $longitude = new Degree(-0.0);

        self::assertSame('0°N', $latitude->formatAs(Angle::EPSG_DEGREE_HEMISPHERE, true));
        self::assertSame('E0°', $longitude->formatAs(Angle::EPSG_HEMISPHERE_DEGREE, false));
    }

    public function testFormatRoundTripsThroughMakeUnit(): void
    {
        $samples = [
            [new Degree(40.689167), true],
            [new Degree(-74.044444), false],
            [new Degree(0), true],
            [new Degree(-40.5), true],
            [new Degree(180), false],
        ];
        $formats = [
            Angle::EPSG_DEGREE,
            Angle::EPSG_DEGREE_HEMISPHERE,
            Angle::EPSG_HEMISPHERE_DEGREE,
            Angle::EPSG_DEGREE_MINUTE_SECOND,
            Angle::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE,
            Angle::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND,
            Angle::EPSG_SEXAGESIMAL_DMS,
        ];

        foreach ($samples as [$angle, $latitude]) {
            foreach ($formats as $format) {
                $parsed = Angle::makeUnit($angle->formatAs($format, $latitude), $format);
                self::assertEqualsWithDelta($angle->getValue(), $parsed->getValue(), 0.0000001);
            }
        }
    }
}
