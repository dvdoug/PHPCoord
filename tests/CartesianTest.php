<?php

declare(strict_types=1);
namespace PHPCoord;

use PHPUnit\Framework\TestCase;

class CartesianTest extends TestCase
{

    public function testHelmertOSWorkedExample()
    {

        $tx = -446.448;
        $ty = 125.157;
        $tz = -542.060;
        $s = 0.0000204894;
        $rx = deg2rad(-0.1502 / 3600);
        $ry = deg2rad(-0.2470 / 3600);
        $rz = deg2rad(-0.8421 / 3600);

        $orig = new Cartesian(3909833.018, -147097.138, 5020322.478, RefEll::wgs84());
        $new = $orig->transformDatum(RefEll::airy1830(), $tx, $ty, $tz, $s, $rx, $ry, $rz);

        self::assertEquals(3909460.068, round($new->getX(), 3));
        self::assertEquals(-146987.302, round($new->getY(), 3));
        self::assertEquals(5019888.070, round($new->getZ(), 3));
    }

    public function testToString() {
        $c = new Cartesian(1,2,3, RefEll::wgs84());

        self::assertEquals('(1, 2, 3)', $c->__toString());
    }

    public function testGetters() {
        $c = new Cartesian(1,2,3, RefEll::wgs84());
        self::assertEquals(1, $c->getX());
        self::assertEquals(2, $c->getY());
        self::assertEquals(3, $c->getZ());
        self::assertEquals(RefEll::wgs84(), $c->getRefEll());
    }

}
