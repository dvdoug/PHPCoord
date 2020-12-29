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
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPUnit\Framework\TestCase;

class UnitOfMeasureFactoryTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = UnitOfMeasureFactory::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    /**
     * @dataProvider unitsOfMeasure
     */
    public function testCanCreateAllUnits(string $srid): void
    {
        $dummyValue = 1;
        if (in_array($srid, [Angle::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE, Angle::EPSG_DEGREE_HEMISPHERE, Angle::EPSG_DEGREE_MINUTE_HEMISPHERE], true)) {
            $dummyValue = '1°N';
        } elseif (in_array($srid, [Angle::EPSG_HEMISPHERE_DEGREE, Angle::EPSG_HEMISPHERE_DEGREE_MINUTE, Angle::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND], true)) {
            $dummyValue = 'N1°';
        } elseif (in_array($srid, [Angle::EPSG_SEXAGESIMAL_DMS, Angle::EPSG_SEXAGESIMAL_DM], true)) {
            $dummyValue = '1.0';
        } elseif (in_array($srid, [Angle::EPSG_SEXAGESIMAL_DMS_S], true)) {
            $dummyValue = '10000.0';
        }
        $newUnit = UnitOfMeasureFactory::makeUnit($dummyValue, $srid);
        self::assertInstanceOf(UnitOfMeasure::class, $newUnit);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownUnitOfMeasureException::class);
        $newUnit = UnitOfMeasureFactory::makeUnit(1, 'foo');
    }

    public function unitsOfMeasure(): array
    {
        $data = [];
        foreach (UnitOfMeasureFactory::getSupportedSRIDs() as $srid => $name) {
            if ($srid !== Angle::EPSG_DEGREE_SUPPLIER_TO_DEFINE_REPRESENTATION) { // cannot test this, it's a nonsense unit
                $data[$name] = [$srid];
            }
        }

        return $data;
    }
}
