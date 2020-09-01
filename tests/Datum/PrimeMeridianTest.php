<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownPrimeMeridianException;
use PHPUnit\Framework\TestCase;

class PrimeMeridianTest extends TestCase
{
    /**
     * @dataProvider primeMeridians
     */
    public function testCanCreateAllInDB(int $epsgCode): void
    {
        $object = PrimeMeridian::fromEPSGCode($epsgCode);
        self::assertInstanceOf(PrimeMeridian::class, $object);
    }

    public function testExceptionOnUnknownEPSGCode(): void
    {
        $this->expectException(UnknownPrimeMeridianException::class);
        $object = PrimeMeridian::fromEPSGCode(PHP_INT_MAX);
    }

    public function testGreenwich(): void
    {
        $object = PrimeMeridian::fromEPSGCode(PrimeMeridianIds::EPSG_GREENWICH);
        self::assertEquals('Greenwich', $object->getName());
        self::assertEquals('0°', $object->getGreenwichLongitude()->getFormattedValue());
    }

    public function primeMeridians(): array
    {
        $repository = new Repository();

        $data = [];
        foreach ($repository->getPrimeMeridians() as $primeMeridian) {
            $data[$primeMeridian['prime_meridian_name']] = [$primeMeridian['prime_meridian_code']];
        }

        return $data;
    }
}
