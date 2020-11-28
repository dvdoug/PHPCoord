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

class EllipsoidalTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider ellipsoidal
     */
    public function testCanCreateSupportedEllipsoidal(string $srid): void
    {
        $object = Ellipsoidal::fromSRID($srid);
        self::assertInstanceOf(CoordinateSystem::class, $object);
    }

    public function testExceptionOnUnknownSRIDCodeEllipsoidal(): void
    {
        $this->expectException(UnknownCoordinateSystemException::class);
        $object = Ellipsoidal::fromSRID('foo');
    }

    public function ellipsoidal(): array
    {
        $data = [];
        foreach (Ellipsoidal::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
