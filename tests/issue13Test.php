<?php

namespace PHPCoord;

use PHPUnit\Framework\TestCase;

class issue13Test extends TestCase
{
    public function test1()
    {
        $gridRef = new AlabamaGrid(441585.5381, 1508073.406);
        $LatLng = $gridRef->toLatLng();

        $expected = '(34.64301, -86.54673)';

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function test2()
    {
        $gridRef = new AlabamaGrid(441443.6833, 1507674.1487);
        $LatLng = $gridRef->toLatLng();

        $expected = '(34.64191, -86.54719)';

        self::assertEquals($expected, $LatLng->__toString());
    }
}
