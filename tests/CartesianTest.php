<?php

namespace PHPCoord;

class CartesianTest extends \PHPUnit_Framework_TestCase
{

    public function testHelmertOSWorkedExample()
    {

        $tx = -446.448;
        $ty = 125.157;
        $tz = -542.060;
        $s = 0.0000204894;
        $rx = -0.1502;
        $ry = -0.2470;
        $rz = -0.8421;

        $c = new Cartesian(3909833.018, -147097.138, 5020322.478, RefEll::WGS84());
        $c->transformDatum(RefEll::Airy1830(), $tx, $ty, $tz, $s, $rx, $ry, $rz);

        self::assertEquals(3909460.068, round($c->getX(), 3));
        self::assertEquals(-146987.302, round($c->getY(), 3));
        self::assertEquals(5019888.070, round($c->getZ(), 3));
   }

}
