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

/**
 * @covers \PHPCoord\UnitOfMeasure\Factory
 */
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
        $newUnit = $this->factory::makeUnit(1, $epsgId);
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
