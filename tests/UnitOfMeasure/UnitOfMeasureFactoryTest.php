<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPUnit\Framework\TestCase;

class UnitOfMeasureFactoryTest extends TestCase
{
    /** @var UnitOfMeasureFactory */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new UnitOfMeasureFactory();
    }

    /**
     * @dataProvider unitsOfMeasure
     */
    public function testCanCreateAllUnits(int $epsgCode): void
    {
        $dummyValue = 1;
        if (in_array($epsgCode, [9108, 9116, 9118], true)) {
            $dummyValue = '1°N';
        } elseif (in_array($epsgCode, [9117, 9119, 9120], true)) {
            $dummyValue = 'N1°';
        } elseif (in_array($epsgCode, [9110, 9111], true)) {
            $dummyValue = '1.0';
        } elseif (in_array($epsgCode, [9121], true)) {
            $dummyValue = '10000.0';
        }
        $newUnit = $this->factory::makeUnit($dummyValue, $epsgCode);
        self::assertInstanceOf(UnitOfMeasure::class, $newUnit);
    }

    public function testExceptionOnUnknownEPSGCode(): void
    {
        $this->expectException(UnknownUnitOfMeasureException::class);
        $newUnit = $this->factory::makeUnit(1, 0);
    }

    public function unitsOfMeasure(): array
    {
        $repository = new Repository();

        $data = [];
        foreach ($repository->getUnitsOfMeasure() as $measure) {
            $data[$measure['unit_of_meas_name']] = [$measure['uom_code']];
        }

        return $data;
    }
}
