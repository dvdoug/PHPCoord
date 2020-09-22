<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPUnit\Framework\TestCase;

class CoordinateReferenceSystemTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider coordinateReferenceSystems
     */
    public function testCanCreateAllInDB(int $epsgCode): void
    {
        $object = CoordinateReferenceSystem::fromEPSGCode($epsgCode);
        self::assertInstanceOf(CoordinateReferenceSystem::class, $object);
    }

    public function testExceptionOnUnknownEPSGCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = CoordinateReferenceSystem::fromEPSGCode(PHP_INT_MAX);
    }

    public function coordinateReferenceSystems(): array
    {
        $repository = new Repository();

        $data = [];
        foreach ($repository->getCoordinateReferenceSystems() as $coordinateSystem) {
            $data[$coordinateSystem['coord_ref_sys_name']] = [$coordinateSystem['coord_ref_sys_code']];
        }

        // dataproviders are run before the suite starts, this allows the repository to actually get tested
        $repository->clearCache();

        return $data;
    }
}
