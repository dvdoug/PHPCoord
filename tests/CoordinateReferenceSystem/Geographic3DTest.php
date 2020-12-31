<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPUnit\Framework\TestCase;

class Geographic3DTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider coordinateReferenceSystems
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = Geographic3D::fromSRID($srid);
        self::assertInstanceOf(Geographic3D::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Geographic3D::fromSRID('foo');
    }

    public function coordinateReferenceSystems(): array
    {
        $data = [];
        foreach (Geographic3D::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
