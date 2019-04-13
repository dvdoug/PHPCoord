<?php

declare(strict_types=1);

namespace PHPCoord;

use PHPUnit\Framework\TestCase;

class ITMRefTest extends TestCase
{
    public function testToString(): void
    {
        $ITMRef = new ITMRef(715830, 734697);
        $expected = '(715830, 734697)';

        self::assertEquals($expected, $ITMRef->__toString());
    }

    public function testToLatLng(): void
    {
        $ITMRef = new ITMRef(715830, 734697);
        $LatLng = $ITMRef->toLatLng();

        $expected = '(53.34979, -6.26025)';

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testFromLatLng(): void
    {
        $LatLng = new LatLng(53.34979, -6.26025, 0, RefEll::wgs84());
        $ITMRef = $LatLng->toITMRef();

        $expected = '(715830, 734697)';

        self::assertEquals($expected, $ITMRef->__toString());
    }
}
