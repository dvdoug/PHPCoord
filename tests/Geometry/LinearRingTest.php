<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use PHPCoord\Exception\InvalidGeometryException;
use PHPUnit\Framework\TestCase;

class LinearRingTest extends TestCase
{
    public function testNotEnoughElements(): void
    {
        $this->expectException(InvalidGeometryException::class);
        new LinearRing(
            new Position(0, 0),
            new Position(1, 1),
            new Position(2, 2)
        );
    }

    public function testNotClosed(): void
    {
        $this->expectException(InvalidGeometryException::class);
        new LinearRing(
            new Position(0, 0),
            new Position(1, 1),
            new Position(2, 2),
            new Position(3, 3)
        );
    }

    public function testClosed(): void
    {
        $this->assertInstanceOf(LinearRing::class, new LinearRing(
            new Position(0, 0),
            new Position(1, 1),
            new Position(2, 2),
            new Position(0, 0)
        ));
    }
}
