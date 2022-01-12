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
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\Datum\Datum;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Datum\PrimeMeridian;
use PHPCoord\Exception\UnknownSRIDException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;
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
     * @dataProvider series2200PrimeMeridianData
     */
    public function testSeries2200PrimeMeridians(string $epsgCode, string $name, string $longitudeFromGreenwich, string $longitudeFromGreenwichDegrees): void
    {
        $meridian = PrimeMeridian::fromSRID('urn:ogc:def:meridian:EPSG::' . $epsgCode);
        $this->assertEquals($name, $meridian->getName());

        if ($meridian->getGreenwichLongitude() instanceof Degree) {
            $this->assertEqualsWithDelta($longitudeFromGreenwichDegrees, $meridian->getGreenwichLongitude()->getValue(), 0.0000001);
        } else {
            $this->assertEqualsWithDelta($longitudeFromGreenwich, $meridian->getGreenwichLongitude()->getValue(), 0.0000001);
        }
    }

    public function series2200PrimeMeridianData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2203_PrimeMeridian.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[3], $row[5]];
        }
    }

    /**
     * @dataProvider series2200DatumData
     */
    public function testSeries2200Datums(string $epsgCode, string $name, string $ellipsoidName, string $primeMeridianName): void
    {
        $datum = Datum::fromSRID('urn:ogc:def:datum:EPSG::' . $epsgCode);
        $this->assertEquals($name, Datum::getSupportedSRIDs()['urn:ogc:def:datum:EPSG::' . $epsgCode]);
        $this->assertEquals($ellipsoidName, $datum->getEllipsoid()->getName());
        $this->assertEquals($primeMeridianName, $datum->getPrimeMeridian()->getName());
    }

    public function series2200DatumData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2204_GeodeticDatum.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[3], $row[4]];
        }
    }

    /**
     * @dataProvider series2200GeodeticCRSData
     */
    public function testSeries2200GeodeticCRSs(string $epsgCode, string $type, string $name, string $datumCode): void
    {
        $crs = CoordinateReferenceSystem::fromSRID('urn:ogc:def:crs:EPSG::' . $epsgCode);
        $this->assertEquals($name, $crs->getName());

        if ($datumCode === '6258') { // treat ensemble as latest as code does
            $datumCode = '1206';
        } elseif ($datumCode === '6326') { // treat ensemble as latest as code does
            $datumCode = '1309';
        }

        $this->assertEquals('urn:ogc:def:datum:EPSG::' . $datumCode, $crs->getDatum()->getSRID());

        if ($crs instanceof Geocentric) {
            $this->assertEquals('X', $crs->getCoordinateSystem()->getAxes()[0]->getAbbreviation());
            $this->assertEquals('Y', $crs->getCoordinateSystem()->getAxes()[1]->getAbbreviation());
            $this->assertEquals('Z', $crs->getCoordinateSystem()->getAxes()[2]->getAbbreviation());
        } elseif ($crs instanceof Geographic2D) {
            $this->assertEquals('Lat', $crs->getCoordinateSystem()->getAxes()[0]->getAbbreviation());
            $this->assertEquals('Lon', $crs->getCoordinateSystem()->getAxes()[1]->getAbbreviation());
        } elseif ($crs instanceof Geographic3D) {
            $this->assertEquals('Lat', $crs->getCoordinateSystem()->getAxes()[0]->getAbbreviation());
            $this->assertEquals('Lon', $crs->getCoordinateSystem()->getAxes()[1]->getAbbreviation());
            $this->assertEquals('h', $crs->getCoordinateSystem()->getAxes()[2]->getAbbreviation());
        }
    }

    public function series2200GeodeticCRSData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2205_GeodeticCRS.txt');

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
