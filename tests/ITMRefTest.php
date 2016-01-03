<?php

namespace PHPCoord;

class ITMRefTest extends \PHPUnit_Framework_TestCase
{

    public function testToString()
    {

        $ITMRef = new ITMRef(715830, 734697);
        $expected = "(715830, 734697)";

        self::assertEquals($expected, $ITMRef->__toString());
    }

    public function testLatLng()
    {

        $ITMRef = new ITMRef(715830, 734697);
        $LatLng = $ITMRef->toLatLng();

        $expected = "(53.34979, -6.26025)";

        self::assertEquals($expected, $LatLng->__toString());
    }

}
