<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\GIGS;

use function explode;
use Generator;
use function min;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\UnknownSRIDException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;
use SplFileObject;
use function str_replace;
use function strlen;
use function strpos;
use function substr;

class GIGSTest extends TestCase
{
    /**
     * @dataProvider series2200UnitData
     */
    public function testSeries2200Units(string $epsgCode, string $unitType, string $unitName, string $baseUnitsPerUnit): void
    {
        $unit = UnitOfMeasureFactory::makeUnit(1, 'urn:ogc:def:uom:EPSG::' . $epsgCode);
        $this->assertEquals(str_replace('sexagesimal DMS', 'degree', $unitName), $unit->getUnitName());

        if ($baseUnitsPerUnit !== 'NULL') {
            $actualBaseUnitsPerUnit = match (true) {
                $unit instanceof Angle => $unit->asRadians(),
                $unit instanceof Length => $unit->asMetres(),
                $unit instanceof Scale => $unit->asUnity(),
            };

            $delta = 1 / 10 ** min(10, strlen(substr($baseUnitsPerUnit, strpos($baseUnitsPerUnit, '.') + 1)));
            $this->assertEqualsWithDelta($baseUnitsPerUnit, $actualBaseUnitsPerUnit->getValue(), $delta);
        }
    }

    public function series2200UnitData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2201_Unit.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[2], $row[4]];
        }
    }

    /**
     * @dataProvider series2200EllipsoidData
     */
    public function testSeries2200Ellipsoids(string $epsgCode, string $name, string $semiMajorAxis, string $semiMajorAxisUnitName, string $semiMajorAxisAsMetres, string $inverseFlattening, string $semiMinorAxis): void
    {
        $ellipsoid = Ellipsoid::fromSRID('urn:ogc:def:ellipsoid:EPSG::' . $epsgCode);
        $this->assertEquals($name, $ellipsoid->getName());
        $this->assertEquals($semiMajorAxis, $ellipsoid->getSemiMajorAxis()->getValue());
        $this->assertEquals($semiMajorAxisUnitName, $ellipsoid->getSemiMajorAxis()->getUnitName());

        if ($semiMinorAxis !== 'NULL') {
            $this->assertEquals($semiMinorAxis, $ellipsoid->getSemiMinorAxis()->getValue());
        } else {
            $this->assertEquals($inverseFlattening, $ellipsoid->getInverseFlattening());
        }

        if ($semiMajorAxisUnitName !== 'metre') {
            $delta = 1 / 10 ** min(10, strlen(substr($semiMajorAxisAsMetres, strpos($semiMajorAxisAsMetres, '.') + 1)));
            $this->assertEqualsWithDelta($semiMajorAxisAsMetres, $ellipsoid->getSemiMajorAxis()->asMetres()->getValue(), $delta);
        }
    }

    public function series2200EllipsoidData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2202_Ellipsoid.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[3], $row[4], $row[6], $row[7], $row[8]];
        }
    }

    /**
     * @dataProvider series7000DeprecationData
     */
    public function testSeries7000Deprecation(string $epsgCode, string $entityType): void
    {
        $this->expectException(UnknownSRIDException::class);

        $object = match ($entityType) {
            'Coordinate_Operation' => CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgCode),
            'Coordinate Reference System' => CoordinateReferenceSystem::fromSRID('urn:ogc:def:crs:EPSG::' . $epsgCode),
        };
    }

    public function series7000DeprecationData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 7000 Deprecation test data/ASCII/GIGS_dep_7001.txt');

        foreach ($body as $row) {
            yield [$row[0], $row[1]];
        }
    }

    private function parseDataFile(string $filename): array
    {
        $file = new SplFileObject($filename);

        $header = [];
        $body = [];
        while (!$file->eof()) {
            $line = $file->fgets();
            if ($line !== '') {
                if ($line[0] === '#') {
                    $header[] = $line;
                } else {
                    $body[] = explode("\t", $line);
                }
            }
        }

        return [$header, $body];
    }
}
