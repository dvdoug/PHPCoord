<?php

namespace PHPCoord;

class OSRefTest extends \PHPUnit_Framework_TestCase
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

}
