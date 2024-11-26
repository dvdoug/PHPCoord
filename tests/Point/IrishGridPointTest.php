<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class IrishGridPointTest extends TestCase
{
    public function testFromSixFigureRef(): void
    {
        $point = IrishGridPoint::fromGridReference('N000500');
        $expected = '(200000, 250000)';
        self::assertEquals($expected, $point);
    }

    public function testFromSixFigureRef2(): void
    {
        $point = IrishGridPoint::fromGridReference('W675718');
        $expected = '(167500, 71800)';
        self::assertEquals($expected, $point);
    }

    public function testFromSixFigureRef3(): void
    {
        $point = IrishGridPoint::fromGridReference('J321739');
        $expected = '(332100, 373900)';
        self::assertEquals($expected, $point);
    }

    public function testToSixFigureRef(): void
    {
        $point = new IrishGridPoint(new Metre(315904), new Metre(234671));
        $expected = 'O159346';
        self::assertEquals($expected, $point->asGridReference(6));
    }

    public function testToString(): void
    {
        $point = new IrishGridPoint(new Metre(315904), new Metre(234671));
        $expected = '(315904, 234671)';
        self::assertEquals($expected, $point);
    }
}
