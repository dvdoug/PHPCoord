<?php

declare(strict_types=1);

namespace PHPCoord;

use PHPUnit\Framework\TestCase;

class IrishGridRefTest extends TestCase
{
    public function testToString(): void
    {
        $IrishGridRef = new IrishGridRef(315904, 234671);
        $expected = '(315904, 234671)';

        self::assertEquals($expected, $IrishGridRef->__toString());
    }

    public function testLatLngOSIWorkedExample(): void
    {
        $IrishGridRef = new IrishGridRef(271707, 248880);
        $LatLng = $IrishGridRef->toLatLng();

        $expected = '(53.48505, -6.91966)';

        self::assertEquals($expected, $LatLng->__toString());
    }

    public function testToSixFigureRef(): void
    {
        $IrishGridRef = new IrishGridRef(315904, 234671);

        $expected = 'O159346';

        self::assertEquals($expected, $IrishGridRef->toSixFigureReference());
    }

    public function testFromSixFigureRef(): void
    {
        $IrishGridRef = IrishGridRef::fromSixFigureReference('N000500');
        $expected = '(200000, 250000)';

        self::assertEquals($expected, $IrishGridRef->__toString());
    }

    public function testFromSixFigureRef2(): void
    {
        $IrishGridRef = IrishGridRef::fromSixFigureReference('W675718');
        $expected = '(167500, 71800)';

        self::assertEquals($expected, $IrishGridRef->__toString());
    }

    public function testFromSixFigureRef3(): void
    {
        $IrishGridRef = IrishGridRef::fromSixFigureReference('J321739');
        $expected = '(332100, 373900)';

        self::assertEquals($expected, $IrishGridRef->__toString());
    }
}
