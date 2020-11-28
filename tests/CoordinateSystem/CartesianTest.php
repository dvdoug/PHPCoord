<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\Exception\UnknownCoordinateSystemException;
use PHPUnit\Framework\TestCase;

class CartesianTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider cartesian
     */
    public function testCanCreateSupportedCartesian(string $srid): void
    {
        $object = Cartesian::fromSRID($srid);
        self::assertInstanceOf(CoordinateSystem::class, $object);
    }

    public function testExceptionOnUnknownSRIDCodeCartesian(): void
    {
        $this->expectException(UnknownCoordinateSystemException::class);
        $object = Cartesian::fromSRID('foo');
    }

    public function cartesian(): array
    {
        $data = [];
        foreach (Cartesian::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
