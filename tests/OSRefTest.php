<?php

declare(strict_types=1);

namespace PHPCoord;

use PHPUnit\Framework\TestCase;

class OSRefTest extends TestCase
{
    public function testToString(): void
    {
        $OSRef = new OSRef(530140, 184184);
        $expected = '(530140, 184184)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testLatLngWorkHQ(): void
    {
        $OSRef = new OSRef(530140, 184184);
        $LatLng = $OSRef->toLatLng();

        $expected = '(51.54105, -0.12319)';

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testLatLngOSWorkedExample(): void
    {
        $OSRef = new OSRef(651410, 313177);
        $LatLng = $OSRef->toLatLng();

        $expected = '(52.65757, 1.71792)';

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testToTwoFigureString(): void
    {
        $OSRef = new OSRef(530140, 184184);

        $expected = 'TQ38';

        self::assertEquals($expected, $OSRef->toGridReference(2));
    }

    public function testFromTwoFigureString(): void
    {
        $OSRef = OSRef::fromGridReference('TQ38');
        $expected = '(530000, 180000)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testToFourFigureString(): void
    {
        $OSRef = new OSRef(530140, 184184);

        $expected = 'TQ3084';

        self::assertEquals($expected, $OSRef->toGridReference(4));
    }

    public function testFromFourFigureString(): void
    {
        $OSRef = OSRef::fromGridReference('TQ3084');
        $expected = '(530000, 184000)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testToSixFigureString(): void
    {
        $OSRef = new OSRef(530140, 184184);

        $expected = 'TQ301841';

        self::assertEquals($expected, $OSRef->toGridReference(6));
    }

    public function testToSixFigureString2(): void
    {
        $OSRef = new OSRef(439145, 274187);

        $expected = 'SP391741';

        self::assertEquals($expected, $OSRef->toGridReference(6));
    }

    public function testToSixFigureString3(): void
    {
        $OSRef = new OSRef(216600, 771200);

        $expected = 'NN166712';

        self::assertEquals($expected, $OSRef->toGridReference(6));
    }

    public function testToEightFigureString(): void
    {
        $OSRef = new OSRef(216600, 771200);

        $expected = 'NN16607120';

        self::assertEquals($expected, $OSRef->toGridReference(8));
    }

    public function testFromEightFigureString(): void
    {
        $OSRef = OSRef::fromGridReference('NN16607120');
        $expected = '(216600, 771200)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testToTenFigureString(): void
    {
        $OSRef = new OSRef(216604, 771209);

        $expected = 'NN1660471209';

        self::assertEquals($expected, $OSRef->toGridReference(10));
    }

    public function testFromTenFigureString(): void
    {
        $OSRef = OSRef::fromGridReference('NN1660471209');
        $expected = '(216604, 771209)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testFromSixFigureString(): void
    {
        $OSRef = OSRef::fromGridReference('TQ301842');
        $expected = '(530100, 184200)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testFromSixFigureString2(): void
    {
        $OSRef = OSRef::fromGridReference('HU396753');
        $expected = '(439600, 1175300)';

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testIssue7(): void
    {
        $osRef = new OSRef(322000, 241000);
        $osLatLng = $osRef->toLatLng();
        $asWGS84 = $osLatLng->toWGS84();

        self::assertEquals(52.06186, $asWGS84->getLat());
        self::assertEquals(-3.13916, $asWGS84->getLng());
    }

    public function testGetters(): void
    {
        $osRef = new OSRef(100000, 200000, 123);
        self::assertEquals(100000, $osRef->getX());
        self::assertEquals(200000, $osRef->getY());
        self::assertEquals(123, $osRef->getH());
        self::assertEquals(RefEll::airy1830(), $osRef->getReferenceEllipsoid());
    }

    public function testDistance(): void
    {
        //old OS HQ
        $from = new OSRef(438700, 114800, 0);

        //Tower of London
        $to = new OSRef(533600, 180500, 0);

        $distance = round($from->distance($to));
        self::assertEquals(115423, $distance);
    }
}
