<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class BritishNationalGridPointTest extends TestCase
{
    public function testFromEightFigureString(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('NN16607120');
        $expected = '(216600, 771200)';
        self::assertEquals($expected, $point);
    }

    public function testFromFourFigureString(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('TQ3084');
        $expected = '(530000, 184000)';
        self::assertEquals($expected, $point);
    }

    public function testFromSevenFigureString(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $point = BritishNationalGridPoint::fromGridReference('AB1234567');
    }

    public function testFromSixFigureString(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('TQ301842');
        $expected = '(530100, 184200)';
        self::assertEquals($expected, $point);
    }

    public function testFromSixFigureString2(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('HU396753');
        $expected = '(439600, 1175300)';
        self::assertEquals($expected, $point);
    }

    public function testFromTenFigureString(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('NN1660471209');
        $expected = '(216604, 771209)';
        self::assertEquals($expected, $point);
    }

    public function testFromTwoFigureString(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('TQ38');
        $expected = '(530000, 180000)';
        self::assertEquals($expected, $point);
    }

    public function testToEightFigureString(): void
    {
        $point = new BritishNationalGridPoint(new Metre(216600), new Metre(771200));
        $expected = 'NN16607120';
        self::assertEquals($expected, $point->asGridReference(8));
    }

    public function testToEightFigureWithSpacesString(): void
    {
        $point = new BritishNationalGridPoint(new Metre(216600), new Metre(771200));
        $expected = 'NN 1660 7120';
        self::assertEquals($expected, $point->asGridReferenceWithSpaces(8));
    }

    public function testToFourFigureString(): void
    {
        $point = new BritishNationalGridPoint(new Metre(530140), new Metre(184184));
        $expected = 'TQ3084';
        self::assertEquals($expected, $point->asGridReference(4));
    }

    public function testToSevenFigureString(): void
    {
        $this->expectException(InvalidCoordinateException::class);
        $point = new BritishNationalGridPoint(new Metre(216604), new Metre(771209));
        $point->asGridReference(7);
    }

    public function testToSixFigureString(): void
    {
        $point = new BritishNationalGridPoint(new Metre(530140), new Metre(184184));
        $expected = 'TQ301841';
        self::assertEquals($expected, $point->asGridReference(6));
    }

    public function testToSixFigureString2(): void
    {
        $point = new BritishNationalGridPoint(new Metre(439145), new Metre(274187));
        $expected = 'SP391741';
        self::assertEquals($expected, $point->asGridReference(6));
    }

    public function testToSixFigureString3(): void
    {
        $point = new BritishNationalGridPoint(new Metre(216600), new Metre(771200));
        $expected = 'NN166712';
        self::assertEquals($expected, $point->asGridReference(6));
    }

    public function testToTenFigureString(): void
    {
        $point = new BritishNationalGridPoint(new Metre(216604), new Metre(771209));
        $expected = 'NN1660471209';
        self::assertEquals($expected, $point->asGridReference(10));
    }

    public function testToTwoFigureString(): void
    {
        $point = new BritishNationalGridPoint(new Metre(530140), new Metre(184184));
        $expected = 'TQ38';
        self::assertEquals($expected, $point->asGridReference(2));
    }

    public function testGridReferenceWhenComponentIsOutsideSixDigits(): void
    {
        // Northing >= 1000000: the old code treated the millions digit as the 100km digit.
        $kirkwall = new BritishNationalGridPoint(new Metre(344909), new Metre(1011238));
        self::assertEquals('HY4490911238', $kirkwall->asGridReference(10));
        self::assertEquals('HY 449 112', $kirkwall->asGridReferenceWithSpaces(6));

        $lerwick = new BritishNationalGridPoint(new Metre(447000), new Metre(1141000));
        self::assertEquals('HU4700041000', $lerwick->asGridReference(10));
        self::assertEquals('HU 470 410', $lerwick->asGridReferenceWithSpaces(6));

        $unst = new BritishNationalGridPoint(new Metre(460000), new Metre(1210000));
        self::assertEquals('HP6000010000', $unst->asGridReference(10));
        self::assertEquals('HP 600 100', $unst->asGridReferenceWithSpaces(6));

        // Easting or northing < 100000 was only padded out to six digits at length 10.
        $southDevon = new BritishNationalGridPoint(new Metre(270000), new Metre(30000));
        self::assertEquals('SX700300', $southDevon->asGridReference(6));
        self::assertEquals('SX 70 30', $southDevon->asGridReferenceWithSpaces(4));

        $westernIsles = new BritishNationalGridPoint(new Metre(90000), new Metre(870000));
        self::assertEquals('NF900700', $westernIsles->asGridReference(6));
        self::assertEquals('NF 90 70', $westernIsles->asGridReferenceWithSpaces(4));
    }

    public function testRoundTripping1(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('SX 70000 30000');
        self::assertEquals('SX 70000 30000', $point->asGridReferenceWithSpaces(10));
    }

    public function testRoundTripping2(): void
    {
        $point = BritishNationalGridPoint::fromGridReference('NF 90000 70000');
        self::assertEquals('NF 90000 70000', $point->asGridReferenceWithSpaces(10));
    }
}
