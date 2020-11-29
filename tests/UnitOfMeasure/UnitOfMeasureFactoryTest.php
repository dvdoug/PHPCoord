<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use function in_array;
use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPUnit\Framework\TestCase;

class UnitOfMeasureFactoryTest extends TestCase
{
    /**
     * @var UnitOfMeasureFactory
     */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new UnitOfMeasureFactory();
    }

    /**
     * @dataProvider unitsOfMeasure
     */
    public function testCanCreateAllUnits(string $srid): void
    {
        $dummyValue = 1;
        if (in_array($srid, [UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE, UnitOfMeasure::EPSG_ANGLE_DEGREE_HEMISPHERE, UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE], true)) {
            $dummyValue = '1°N';
        } elseif (in_array($srid, [UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE, UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE, UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND], true)) {
            $dummyValue = 'N1°';
        } elseif (in_array($srid, [UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DMS, UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DM], true)) {
            $dummyValue = '1.0';
        } elseif (in_array($srid, [UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DMS_S], true)) {
            $dummyValue = '10000.0';
        }
        $newUnit = $this->factory::makeUnit($dummyValue, $srid);
        self::assertInstanceOf(UnitOfMeasure::class, $newUnit);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownUnitOfMeasureException::class);
        $newUnit = $this->factory::makeUnit(1, 'foo');
    }

    public function unitsOfMeasure(): array
    {
        $data = [];
        foreach (UnitOfMeasureFactory::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
