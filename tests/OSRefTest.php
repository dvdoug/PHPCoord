<?php

namespace PHPCoord;

use PHPUnit\Framework\TestCase;

class OSRefTest extends TestCase
{

    public function testToString()
    {

        $OSRef = new OSRef(530140, 184184);
        $expected = "(530140, 184184)";

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testLatLngWorkHQ()
    {

        $OSRef = new OSRef(530140, 184184);
        $LatLng = $OSRef->toLatLng();

        $expected = "(51.54105, -0.12319)";

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testLatLngOSWorkedExample()
    {

        $OSRef = new OSRef(651410, 313177);
        $LatLng = $OSRef->toLatLng();

        $expected = "(52.65757, 1.71792)";

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testToTwoFigureString()
    {

        $OSRef = new OSRef(530140, 184184);

        $expected = 'TQ38';

        self::assertEquals($expected, $OSRef->toTwoFigureReference());
    }

    public function testToFourFigureString()
    {

        $OSRef = new OSRef(530140, 184184);

        $expected = 'TQ3084';

        self::assertEquals($expected, $OSRef->toFourFigureReference());
    }

    public function testToSixFigureString()
    {

        $OSRef = new OSRef(530140, 184184);

        $expected = 'TQ301841';

        self::assertEquals($expected, $OSRef->toSixFigureReference());
    }

    public function testToSixFigureString2()
    {

        $OSRef = new OSRef(439145, 274187);

        $expected = 'SP391741';

        self::assertEquals($expected, $OSRef->toSixFigureReference());
    }

    public function testToSixFigureString3()
    {

        $OSRef = new OSRef(216600, 771200);

        $expected = 'NN166712';

        self::assertEquals($expected, $OSRef->toSixFigureReference());
    }

    public function testToEightFigureString()
    {

        $OSRef = new OSRef(216600, 771200);

        $expected = 'NN16607120';

        self::assertEquals($expected, $OSRef->toEightFigureReference());
    }

    public function testToTenFigureString()
    {

        $OSRef = new OSRef(216600, 771200);

        $expected = 'NN1660071200';

        self::assertEquals($expected, $OSRef->toTenFigureReference());
    }

    public function testFromSixFigureString()
    {

        $OSRef = OSRef::fromSixFigureReference('TQ301842');
        $expected = "(530100, 184200)";

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testFromSixFigureString2()
    {

        $OSRef = OSRef::fromSixFigureReference('HU396753');
        $expected = "(439600, 1175300)";

        self::assertEquals($expected, $OSRef->__toString());
    }

    public function testIssue7() {

        $osRef = new OSRef(322000, 241000);
        $osLatLng = $osRef->toLatLng();
        $osLatLng->toWGS84();

        self::assertEquals(52.06186, $osLatLng->getLat());
        self::assertEquals(-3.13916, $osLatLng->getLng());
    }

    public function testGetters() {
        $osRef = new OSRef(100000, 200000, 123);
        self::assertEquals(100000, $osRef->getX());
        self::assertEquals(200000, $osRef->getY());
        self::assertEquals(123, $osRef->getH());
        self::assertEquals(RefEll::airy1830(), $osRef->getRefEll());
    }

    public function testDistance() {
        //old OS HQ
        $from = new OSRef(438700, 114800, 0, RefEll::airy1830());

        //Tower of London
        $to = new OSRef(533600, 180500, 0, RefEll::airy1830());

        $distance = round($from->distance($to));
        self::assertEquals(115423, $distance);
    }

}
