<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownEllipsoidException;
use PHPUnit\Framework\TestCase;

class EllipsoidTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider ellipsoids
     */
    public function testCanCreateAllInDB(int $epsgCode): void
    {
        $object = Ellipsoid::fromEPSGCode($epsgCode);
        self::assertInstanceOf(Ellipsoid::class, $object);
    }

    public function testExceptionOnUnknownEPSGCode(): void
    {
        $this->expectException(UnknownEllipsoidException::class);
        $object = Ellipsoid::fromEPSGCode(PHP_INT_MAX);
    }

    public function testAiry1830(): void
    {
        $object = Ellipsoid::fromEPSGCode(Ellipsoid::EPSG_AIRY_1830);
        self::assertEquals('6377563.396m', $object->getSemiMajorAxis()->getFormattedValue());
        self::assertEquals('6356256.9092373m', $object->getSemiMinorAxis()->getFormattedValue());
    }

    public function ellipsoids(): array
    {
        $repository = new Repository();

        $data = [];
        foreach ($repository->getEllipsoids() as $ellipsoid) {
            $data[$ellipsoid['ellipsoid_name']] = [$ellipsoid['ellipsoid_code']];
        }

        // dataproviders are run before the suite starts, this allows the repository to actually get tested
        $repository->clearCache();

        return $data;
    }
}
