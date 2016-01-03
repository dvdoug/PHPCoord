<?php

namespace PHPCoord;

class UTMRefTest extends \PHPUnit_Framework_TestCase
{

    public function testToString()
    {

        $UTMRef = new UTMRef(699375, 5713970, 0, 'U', 30);
        $expected = "30U 699375 5713970";

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testLatLng()
    {

        $UTMRef = new UTMRef(699375, 5713970, 0, 'U', 30);
        $LatLng = $UTMRef->toLatLng();
        $LatLng->toOSGB36();

        $expected = "(51.54098, -0.12301)";

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testLatLngSouthernHemisphere()
    {

        $UTMRef = new UTMRef(334786, 6252080, 0, 'H', 56);
        $LatLng = $UTMRef->toLatLng();

        $expected = "(-33.85798, 151.21404)";

        self::assertEquals($expected, $LatLng->__toString());
    }

}
