<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace UnitOfMeasure;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Factory;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /** @var Factory */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new Factory();
    }

    /**
     * @dataProvider unitsOfMeasure
     */
    public function testCanCreateAllUnits(int $epsgId): void
    {
        $dummyValue = 1;
        if (in_array($epsgId, [9108, 9116, 9118], true)) {
            $dummyValue = '1°N';
        } elseif (in_array($epsgId, [9117, 9119, 9120], true)) {
            $dummyValue = 'N1°';
        } elseif (in_array($epsgId, [9110, 9111], true)) {
            $dummyValue = '1.0';
        } elseif (in_array($epsgId, [9121], true)) {
            $dummyValue = '10000.0';
        }
        $newUnit = $this->factory::makeUnit($dummyValue, $epsgId);
        self::assertInstanceOf(UnitOfMeasure::class, $newUnit);
    }

    public function testExceptionOnUnknownEPSGId(): void
    {
        $this->expectException(UnknownUnitOfMeasureException::class);
        $newUnit = $this->factory::makeUnit(1, 0);
    }

    public function unitsOfMeasure(): array
    {
        $repository = new Repository();

        $data = [];
        foreach ($repository->getUnitsOfMeasure(true) as $measure) {
            $data[$measure['unit_of_meas_name']] = [$measure['uom_code']];
        }

        return $data;
    }
}
