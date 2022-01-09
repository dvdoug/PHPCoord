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

            $decimalPlaces = min(10, strlen(substr($baseUnitsPerUnit, strpos($baseUnitsPerUnit, '.') + 1)));
            $this->assertEqualsWithDelta($baseUnitsPerUnit, $actualBaseUnitsPerUnit->getValue(), 1 / 10 ** $decimalPlaces);
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
