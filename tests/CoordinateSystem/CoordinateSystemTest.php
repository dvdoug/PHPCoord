<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownCoordinateSystemException;
use PHPUnit\Framework\TestCase;

class CoordinateSystemTest extends TestCase
{
    /**
     * @dataProvider coordinateSystems
     */
    public function testCanCreateAllInDB(int $epsgCode): void
    {
        $object = CoordinateSystem::fromEPSGCode($epsgCode);
        self::assertInstanceOf(CoordinateSystem::class, $object);
    }

    public function testExceptionOnUnknownEPSGCode(): void
    {
        $this->expectException(UnknownCoordinateSystemException::class);
        $object = CoordinateSystem::fromEPSGCode(PHP_INT_MAX);
    }

    public function coordinateSystems(): array
    {
        $repository = new Repository();

        $data = [];
        foreach ($repository->getCoordinateSystems() as $coordinateSystem) {
            $data[$coordinateSystem['coord_sys_name']] = [$coordinateSystem['coord_sys_code']];
        }

        return $data;
    }
}
