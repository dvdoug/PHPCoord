<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\GIGS;

use function array_filter;
use function array_flip;
use function array_map;
use function class_exists;
use function explode;
use Generator;
use function in_array;
use function lcfirst;
use function min;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\NTv2NAD27NAD83CSRS1997QuebecProvider;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Datum\Datum;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Datum\PrimeMeridian;
use PHPCoord\Exception\UnknownCoordinateOperationException;
use PHPCoord\Exception\UnknownSRIDException;
use PHPCoord\GeocentricPoint;
use PHPCoord\GeographicPoint;
use PHPCoord\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Grad;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Length\USSurveyFoot;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use PHPUnit\Framework\TestCase;
use function preg_match;
use SplFileObject;
use function str_contains;
use function str_replace;
use function strlen;
use function strpos;
use function substr;
use function trim;
use function ucwords;

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
     * @dataProvider series2200GeodeticDatumData
     */
    public function testSeries2200GeodeticDatums(string $epsgCode, string $name, string $ellipsoidName, string $primeMeridianName): void
    {
        $datum = Datum::fromSRID('urn:ogc:def:datum:EPSG::' . $epsgCode);
        $this->assertEquals($name, Datum::getSupportedSRIDs()['urn:ogc:def:datum:EPSG::' . $epsgCode]);
        $this->assertEquals($ellipsoidName, $datum->getEllipsoid()->getName());
        $this->assertEquals($primeMeridianName, $datum->getPrimeMeridian()->getName());
    }

    public function series2200GeodeticDatumData(): Generator
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
     * @dataProvider series2200ProjectedCRSData
     */
    public function testSeries2200ProjectedCRSs(string $epsgCode, string $datumCode, string $name): void
    {
        $crs = Projected::fromSRID('urn:ogc:def:crs:EPSG::' . $epsgCode);
        $this->assertEquals($name, $crs->getName());
        $this->assertEquals('urn:ogc:def:datum:EPSG::' . $datumCode, $crs->getDatum()->getSRID());
    }

    public function series2200ProjectedCRSData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2207_ProjectedCRS.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[3]];
        }
    }

    /**
     * @dataProvider series2200VerticalDatumData
     */
    public function testSeries2200VerticalDatums(string $epsgCode, string $name): void
    {
        $datum = Datum::fromSRID('urn:ogc:def:datum:EPSG::' . $epsgCode);
        $this->assertEquals($name, Datum::getSupportedSRIDs()['urn:ogc:def:datum:EPSG::' . $epsgCode]);
    }

    public function series2200VerticalDatumData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2209_VerticalDatum.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1]];
        }
    }

    /**
     * @dataProvider series2200VerticalCRSData
     */
    public function testSeries2200VerticalCRSs(string $epsgCode, string $name, string $datumCode): void
    {
        $crs = Vertical::fromSRID('urn:ogc:def:crs:EPSG::' . $epsgCode);
        $this->assertEquals($name, $crs->getName());
        $this->assertEquals('urn:ogc:def:datum:EPSG::' . $datumCode, $crs->getDatum()->getSRID());
    }

    public function series2200VerticalCRSData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2210_VerticalCRS.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[3]];
        }
    }

    /**
     * @dataProvider series2200OperationData
     */
    public function testSeries2200Operations(string $epsgCode, string $name, string $method): void
    {
        $operation = CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgCode);
        $this->assertEquals($name, $operation['name']);
        // $this->assertEquals('urn:ogc:def:datum:EPSG::' . $datumCode, $crs->getDatum()->getSRID());
    }

    public function series2200OperationData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2206_Conversion.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[3]];
        }

        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2208_CoordTfm.txt');

        foreach ($body as $row) {
            if ($row[4] !== 'NADCON') {
                yield '#' . $row[0] => [$row[0], $row[1], $row[4]];
            }
        }

        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 2200 Predefined Geodetic Data Objects test data/ASCII/GIGS_lib_2211_VertTfm.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[3]];
        }
    }

    /**
     * @dataProvider series3200UnitData
     */
    public function testSeries3200Units(string $gigsCode, string $unitType, string $unitName, string $baseUnitsPerUnit, string $epsgCode): void
    {
        if ($unitType === 'Angle') {
            $gigsUnitClassName = "GIGSUnit{$gigsCode}";
            $gigsUnitClass = <<<ENDOFCLASS
                namespace PHPCoord\UnitOfMeasure\Angle;
                class {$gigsUnitClassName} extends Angle {

                    public function __construct(private float \$angle)
                    {
                    }

                    public function asRadians(): Radian
                    {
                        return new Radian(\$this->angle * {$baseUnitsPerUnit});
                    }

                    public function getValue(): float
                    {
                        return \$this->angle;
                    }

                    public function getUnitName(): string
                    {
                        return '{$unitName}';
                    }
                }
                ENDOFCLASS;
            eval($gigsUnitClass);
            Angle::registerCustomUnit('urn:ogc:def:uom:GIGS::' . $gigsCode, $unitName, 'PHPCoord\UnitOfMeasure\Angle\\' . $gigsUnitClassName);
            $gigsUnit = Angle::makeUnit(1, 'urn:ogc:def:uom:GIGS::' . $gigsCode);
            $actualBaseUnitsPerGigsUnit = $gigsUnit->asRadians();

            $epsgUnit = Angle::makeUnit(1, 'urn:ogc:def:uom:EPSG::' . $epsgCode);
            $actualBaseUnitsPerEPSGUnit = $epsgUnit->asRadians();
        } elseif ($unitType === 'Linear') {
            $gigsUnitClassName = "GIGSUnit{$gigsCode}";
            $gigsUnitClass = <<<ENDOFCLASS
                namespace PHPCoord\UnitOfMeasure\Length;
                class {$gigsUnitClassName} extends Length {

                    public function __construct(private float \$length)
                    {
                    }

                    public function asMetres(): Metre
                    {
                        return new Metre(\$this->length * {$baseUnitsPerUnit});
                    }

                    public function getValue(): float
                    {
                        return \$this->length;
                    }

                    public function getUnitName(): string
                    {
                        return '{$unitName}';
                    }
                }
                ENDOFCLASS;
            eval($gigsUnitClass);
            Length::registerCustomUnit('urn:ogc:def:uom:GIGS::' . $gigsCode, $unitName, 'PHPCoord\UnitOfMeasure\Length\\' . $gigsUnitClassName);
            $gigsUnit = Length::makeUnit(1, 'urn:ogc:def:uom:GIGS::' . $gigsCode);
            $actualBaseUnitsPerGigsUnit = $gigsUnit->asMetres();

            $epsgUnit = Length::makeUnit(1, 'urn:ogc:def:uom:EPSG::' . $epsgCode);
            $actualBaseUnitsPerEPSGUnit = $epsgUnit->asMetres();
        } elseif ($unitType === 'Scale') {
            $gigsUnitClassName = "GIGSUnit{$gigsCode}";
            $gigsUnitClass = <<<ENDOFCLASS
                namespace PHPCoord\UnitOfMeasure\Scale;
                class {$gigsUnitClassName} extends Scale {

                    public function __construct(private float \$scale)
                    {
                    }

                    public function asUnity(): Unity
                    {
                        return new Unity(\$this->scale * {$baseUnitsPerUnit});
                    }

                    public function getValue(): float
                    {
                        return \$this->scale;
                    }

                    public function getUnitName(): string
                    {
                        return '{$unitName}';
                    }
                }
                ENDOFCLASS;
            eval($gigsUnitClass);
            Scale::registerCustomUnit('urn:ogc:def:uom:GIGS::' . $gigsCode, $unitName, 'PHPCoord\UnitOfMeasure\Scale\\' . $gigsUnitClassName);
            $gigsUnit = Scale::makeUnit(1, 'urn:ogc:def:uom:GIGS::' . $gigsCode);
            $actualBaseUnitsPerGigsUnit = $gigsUnit->asUnity();

            $epsgUnit = Scale::makeUnit(1, 'urn:ogc:def:uom:EPSG::' . $epsgCode);
            $actualBaseUnitsPerEPSGUnit = $epsgUnit->asUnity();
        }

        $delta = 1 / 10 ** min(10, strlen(substr($baseUnitsPerUnit, strpos($baseUnitsPerUnit, '.') + 1)));
        $this->assertEqualsWithDelta($baseUnitsPerUnit, $actualBaseUnitsPerGigsUnit->getValue(), $delta);
        $this->assertEqualsWithDelta($baseUnitsPerUnit, $actualBaseUnitsPerEPSGUnit->getValue(), $delta);
        $this->assertSame($unitName, $gigsUnit->getUnitName());
    }

    public function series3200UnitData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3201_Unit.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[2], $row[3], $row[5]];
        }
    }

    /**
     * @depends testSeries3200Units
     * @dataProvider series3200EllipsoidData
     */
    public function testSeries3200Ellipsoids(string $gigsCode, string $gigsName, string $semiMajorAxis, $unitName, string $inverseFlattening, string $semiMinorAxis): void
    {
        if ($semiMinorAxis === '0' && $inverseFlattening === '0') {
            $semiMinorAxis = $semiMajorAxis;
        } elseif ($semiMinorAxis === '0') {
            $semiMinorAxis = $semiMajorAxis - ($semiMajorAxis / $inverseFlattening);
        }

        foreach (Length::getSupportedSRIDs() as $srid => $name) {
            if ($name === $unitName) {
                Ellipsoid::registerCustomEllipsoid('urn:ogc:def:ellipsoid:GIGS::' . $gigsCode, $gigsName, (float) $semiMajorAxis, (float) $semiMinorAxis, $srid);
                break;
            }
        }

        $this->assertInstanceOf(Ellipsoid::class, Ellipsoid::fromSRID('urn:ogc:def:ellipsoid:GIGS::' . $gigsCode));
    }

    public function series3200EllipsoidData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3202_Ellipsoid.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5]];
        }
    }

    /**
     * @depends testSeries3200Units
     * @dataProvider series3200PrimeMeridianData
     */
    public function testSeries3200PrimeMeridians(string $gigsCode, string $gigsName, string $longitudeFromGreenwich, string $unitName): void
    {
        if ($unitName !== 'sexagesimal DMS') {
            $longitudeFromGreenwich = (float) $longitudeFromGreenwich;
        }

        foreach (Angle::getSupportedSRIDs() as $srid => $name) {
            if ($name === $unitName) {
                PrimeMeridian::registerCustomMeridian('urn:ogc:def:meridian:GIGS::' . $gigsCode, $gigsName, $longitudeFromGreenwich, $srid);
                break;
            }
        }

        $this->assertInstanceOf(PrimeMeridian::class, PrimeMeridian::fromSRID('urn:ogc:def:meridian:GIGS::' . $gigsCode));
    }

    public function series3200PrimeMeridianData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3203_PrimeMeridian.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[2], $row[3]];
        }
    }

    /**
     * @depends testSeries3200Ellipsoids
     * @depends testSeries3200PrimeMeridians
     * @dataProvider series3200GeodeticDatumData
     */
    public function testSeries3200GeodeticDatums(string $gigsCode, string $name, string $ellipsoidName, string $primeMeridianName): void
    {
        $ellipsoid = array_flip(Ellipsoid::getSupportedSRIDs())[$ellipsoidName];
        $primeMeridian = array_flip(PrimeMeridian::getSupportedSRIDs())[$primeMeridianName];
        Datum::registerCustomDatum('urn:ogc:def:datum:GIGS::' . $gigsCode, $name, Datum::DATUM_TYPE_GEODETIC, $ellipsoid, $primeMeridian, null);

        $this->assertInstanceOf(Datum::class, Datum::fromSRID('urn:ogc:def:datum:GIGS::' . $gigsCode));
    }

    public function series3200GeodeticDatumData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3204_GeodeticDatum.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[2], $row[3], $row[4]];
        }
    }

    /**
     * @depends testSeries3200GeodeticDatums
     * @dataProvider series3200GeodeticCRSData
     */
    public function testSeries3200GeodeticCRSs(string $gigsCode, string $name, string $type, string $datumCode, string $epsgCSCode): void
    {
        if ($type === 'Geocentric') {
            Geocentric::registerCustomCRS('urn:ogc:def:crs:GIGS::' . $gigsCode, $name, 'urn:ogc:def:cs:EPSG::' . $epsgCSCode, 'urn:ogc:def:datum:GIGS::' . $datumCode, [1262]);
            $crs = Geocentric::fromSRID('urn:ogc:def:crs:GIGS::' . $gigsCode);
        } elseif ($type === 'Geographic 2D') {
            Geographic2D::registerCustomCRS('urn:ogc:def:crs:GIGS::' . $gigsCode, $name, 'urn:ogc:def:cs:EPSG::' . $epsgCSCode, 'urn:ogc:def:datum:GIGS::' . $datumCode, [1262]);
            $crs = Geographic2D::fromSRID('urn:ogc:def:crs:GIGS::' . $gigsCode);
        } elseif ($type === 'Geographic 3D') {
            Geographic3D::registerCustomCRS('urn:ogc:def:crs:GIGS::' . $gigsCode, $name, 'urn:ogc:def:cs:EPSG::' . $epsgCSCode, 'urn:ogc:def:datum:GIGS::' . $datumCode, [1262]);
            $crs = Geographic3D::fromSRID('urn:ogc:def:crs:GIGS::' . $gigsCode);
        }

        $this->assertEquals($name, $crs->getName());
    }

    public function series3200GeodeticCRSData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3205_GeodeticCRS.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[2], $row[3], $row[4], $row[5]];
        }
    }

    /**
     * @dataProvider series3200ConversionData
     */
    public function testSeries3200Conversions(string $gigsCode, string $name, string $methodName, string $param1Name, string $param1Value, string $param1Unit, string $param2Name, string $param2Value, string $param2Unit, string $param3Name, string $param3Value, string $param3Unit, string $param4Name, string $param4Value, string $param4Unit, string $param5Name, string $param5Value, string $param5Unit, string $param6Name, string $param6Value, string $param6Unit, string $param7Name, string $param7Value, string $param7Unit, string $epsgOperationCode): void
    {
        $uoms = [
            'NULL' => '',
            'degree' => Angle::EPSG_DEGREE,
            'grad' => Angle::EPSG_GRAD,
            'sexagesimal DMS' => Angle::EPSG_SEXAGESIMAL_DMS,
            'metre' => Length::EPSG_METRE,
            'foot' => Length::EPSG_FOOT,
            'US survey foot' => Length::EPSG_US_SURVEY_FOOT,
            'Unity' => Scale::EPSG_UNITY,
        ];

        $params = [
            $this->makeParamName($param1Name) => [
                'value' => $param1Value !== 'NULL' ? $param1Value : null,
                'uom' => $uoms[$param1Unit],
                'reverses' => false,
            ],
            $this->makeParamName($param2Name) => [
                'value' => $param2Value !== 'NULL' ? $param2Value : null,
                'uom' => $uoms[$param2Unit],
                'reverses' => false,
            ],
            $this->makeParamName($param3Name) => [
                'value' => $param3Value !== 'NULL' ? $param3Value : null,
                'uom' => $uoms[$param3Unit],
                'reverses' => false,
            ],
            $this->makeParamName($param4Name) => [
                'value' => $param4Value !== 'NULL' ? $param4Value : null,
                'uom' => $uoms[$param4Unit],
                'reverses' => false,
            ],
            $this->makeParamName($param5Name) => [
                'value' => $param5Value !== 'NULL' ? $param5Value : null,
                'uom' => $uoms[$param5Unit],
                'reverses' => false,
            ],
            $this->makeParamName($param6Name) => [
                'value' => $param6Value !== 'NULL' ? $param6Value : null,
                'uom' => $uoms[$param6Unit],
                'reverses' => false,
            ],
            $this->makeParamName($param7Name) => [
                'value' => $param7Value !== 'NULL' ? $param7Value : null,
                'uom' => $uoms[$param7Unit],
                'reverses' => false,
            ],
        ];

        $params = array_filter($params, fn ($param) => $param['value'] !== null);
        $params = array_map(
            static function ($param) {
                $param['value'] = $param['uom'] === Angle::EPSG_SEXAGESIMAL_DMS ? $param['value'] : (float) $param['value'];

                return $param;
            },
            $params
        );

        $method = match ($methodName) {
            'Transverse Mercator' => CoordinateOperationMethods::EPSG_TRANSVERSE_MERCATOR,
            'Transverse Mercator (South Orientated)' => CoordinateOperationMethods::EPSG_TRANSVERSE_MERCATOR_SOUTH_ORIENTATED,
            'Oblique Stereographic' => CoordinateOperationMethods::EPSG_OBLIQUE_STEREOGRAPHIC,
            'Mercator (variant A)' => CoordinateOperationMethods::EPSG_MERCATOR_VARIANT_A,
            'Mercator (variant B)' => CoordinateOperationMethods::EPSG_MERCATOR_VARIANT_B,
            'Lambert Conic Conformal (1SP)' => CoordinateOperationMethods::EPSG_LAMBERT_CONIC_CONFORMAL_1SP,
            'Lambert Conic Conformal (2SP)' => CoordinateOperationMethods::EPSG_LAMBERT_CONIC_CONFORMAL_2SP,
            'Albers Equal Area' => CoordinateOperationMethods::EPSG_ALBERS_EQUAL_AREA,
            'American Polyconic' => CoordinateOperationMethods::EPSG_AMERICAN_POLYCONIC,
            'Hotine Oblique Mercator (variant A)' => CoordinateOperationMethods::EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_A,
            'Hotine Oblique Mercator (variant B)' => CoordinateOperationMethods::EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_B,
            'Cassini-Soldner' => CoordinateOperationMethods::EPSG_CASSINI_SOLDNER,
            'Lambert Azimuthal Equal Area' => CoordinateOperationMethods::EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA,
        };

        CoordinateOperations::registerCustomOperation('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode, $name, $method, [1262], $params);

        if ($epsgOperationCode) {
            $originalOperation = CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgOperationCode);
            $originalParams = CoordinateOperations::getParamData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgOperationCode);

            $gigsOperation = CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode);
            $gigsParams = CoordinateOperations::getParamData('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode);

            $this->assertEquals($originalOperation['method'], $gigsOperation['method']);
            $this->assertEquals($originalParams, $gigsParams);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }

    public function series3200ConversionData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3206_Conversion.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[7], $row[8], $row[9], $row[11], $row[12], $row[13], $row[15], $row[16], $row[17], $row[19], $row[20], $row[21], $row[22], $row[23], $row[24], $row[25], $row[26], $row[27], $row[28]];
        }
    }

    /**
     * @depends testSeries3200GeodeticCRSs
     * @dataProvider series3200ProjectionData
     */
    public function testSeries3200Projections(string $gigsCode, string $name, string $baseCRSCode, string $baseCRSName, string $derivingConversionCode, string $derivingConversionName, string $csEPSGCode, string $epsgCode): void
    {
        $baseCRS = Geographic2D::fromSRID('urn:ogc:def:crs:GIGS::' . $baseCRSCode);
        $this->assertSame($baseCRSName, $baseCRS->getName());

        Projected::registerCustomCRS('urn:ogc:def:crs:GIGS::' . $gigsCode, $name, 'urn:ogc:def:crs:GIGS::' . $baseCRSCode, 'urn:ogc:def:coordinateOperation:GIGS::' . $derivingConversionCode, 'urn:ogc:def:cs:EPSG::' . $csEPSGCode, [1262]);
        CoordinateOperations::registerCustomTransformation('urn:ogc:def:coordinateOperation:GIGS::' . $derivingConversionCode, $derivingConversionName, 'urn:ogc:def:crs:GIGS::' . $baseCRSCode, 'urn:ogc:def:crs:GIGS::' . $gigsCode, 0, true);

        $this->assertInstanceOf(Projected::class, Projected::fromSRID('urn:ogc:def:crs:GIGS::' . $gigsCode));
    }

    public function series3200ProjectionData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3207_ProjectedCRS.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[16]];
        }
    }

    /**
     * @dataProvider series3200TransformationData
     */
    public function testSeries3200Transformations(string $gigsCode, string $name, string $gigsSourceCRS, string $gigsTargetCRS, string $methodName, string $param1Name, string $param1Value, string $param1Unit, string $param2Name, string $param2Value, string $param2Unit, string $param3Name, string $param3Value, string $param3Unit, string $param4Name, string $param4Value, string $param4Unit, string $param5Name, string $param5Value, string $param5Unit, string $param6Name, string $param6Value, string $param6Unit, string $param7Name, string $param7Value, string $param7Unit, string $param8Name, string $param8Value, string $param8Unit, string $param9Name, string $param9Value, string $param9Unit, string $param10Name, string $param10Value, string $param10Unit, string $epsgOperationCode): void
    {
        $uoms = [
            'NULL' => '',
            'degree' => Angle::EPSG_DEGREE,
            'sexagesimal degree' => Angle::EPSG_SEXAGESIMAL_DMS,
            'arc-second' => Angle::EPSG_ARC_SECOND,
            'microradian' => Angle::EPSG_MICRORADIAN,
            'grad' => Angle::EPSG_GRAD,
            'metre' => Length::EPSG_METRE,
            'parts per million' => Scale::EPSG_PARTS_PER_MILLION,
        ];

        $params = [
            $this->makeParamName($param1Name) => [
                'value' => $param1Value !== 'NULL' ? $param1Value : null,
                'uom' => $uoms[$param1Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param2Name) => [
                'value' => $param2Value !== 'NULL' ? $param2Value : null,
                'uom' => $uoms[$param2Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param3Name) => [
                'value' => $param3Value !== 'NULL' ? $param3Value : null,
                'uom' => $uoms[$param3Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param4Name) => [
                'value' => $param4Value !== 'NULL' ? $param4Value : null,
                'uom' => $uoms[$param4Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param5Name) => [
                'value' => $param5Value !== 'NULL' ? $param5Value : null,
                'uom' => $uoms[$param5Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param6Name) => [
                'value' => $param6Value !== 'NULL' ? $param6Value : null,
                'uom' => $uoms[$param6Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param7Name) => [
                'value' => $param7Value !== 'NULL' ? $param7Value : null,
                'uom' => $uoms[$param7Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param8Name) => [
                'value' => $param8Value !== 'NULL' ? $param8Value : null,
                'uom' => $uoms[$param8Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param9Name) => [
                'value' => $param9Value !== 'NULL' ? $param9Value : null,
                'uom' => $uoms[$param9Unit],
                'reverses' => true,
            ],
            $this->makeParamName($param10Name) => [
                'value' => $param10Value !== 'NULL' ? $param10Value : null,
                'uom' => $uoms[$param10Unit],
                'reverses' => true,
            ],
        ];

        $params = array_filter($params, fn ($param) => $param['value'] !== null);
        foreach ($params as $paramName => $param) {
            if (str_contains($paramName, 'File')) {
                $params[$paramName]['fileProvider'] = match ($param['value']) {
                    'QUE27-98.gsb' => NTv2NAD27NAD83CSRS1997QuebecProvider::class,
                    default => 'Unsupported',
                };
                if (!class_exists($params[$paramName]['fileProvider'])) {
                    $this->markTestSkipped('Unsupported file');
                }
                unset($params[$paramName]['value']);
                unset($params[$paramName]['uom']);
            } else {
                $params[$paramName]['value'] = $param['uom'] === Angle::EPSG_SEXAGESIMAL_DMS ? $param['value'] : (float) $param['value'];
            }
        }

        $method = match ($methodName) {
            'Geocentric translations' => CoordinateOperationMethods::EPSG_GEOCENTRIC_TRANSLATIONS_GEOG2D_DOMAIN,
            'Position Vector 7-param. transformation' => CoordinateOperationMethods::EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG2D_DOMAIN,
            'Coordinate Frame rotation' => CoordinateOperationMethods::EPSG_COORDINATE_FRAME_ROTATION_GEOG2D_DOMAIN,
            'Molodensky-Badekas 10-parameter transformation' => CoordinateOperationMethods::EPSG_MOLODENSKY_BADEKAS_PV_GEOG2D_DOMAIN,
            'Longitude rotation' => CoordinateOperationMethods::EPSG_LONGITUDE_ROTATION,
            'NTv2' => CoordinateOperationMethods::EPSG_NTV2,
            'NADCON' => CoordinateOperationMethods::EPSG_NADCON5_2D,
        };

        CoordinateOperations::registerCustomOperation('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode, $name, $method, [1262], $params);
        CoordinateOperations::registerCustomTransformation('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode, $name, 'urn:ogc:def:crs:GIGS::' . $gigsSourceCRS, 'urn:ogc:def:crs:GIGS::' . $gigsTargetCRS, 0, true);

        $gigsOperation = CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode);
        $gigsParams = CoordinateOperations::getParamData('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode);

        if ($epsgOperationCode) {
            try {
                $originalOperation = CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgOperationCode);
                $originalParams = CoordinateOperations::getParamData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgOperationCode);
                $this->assertEquals($originalOperation['method'], $gigsOperation['method']);
                $this->assertEquals($originalParams, $gigsParams);
            } catch (UnknownCoordinateOperationException) {
                $this->expectNotToPerformAssertions(); // some EPSG operations are excluded
            }
        } else {
            $this->expectNotToPerformAssertions();
        }
    }

    public function series3200TransformationData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3208_CoordTfm.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[2], $row[4], $row[7], $row[8], $row[9], $row[10], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18], $row[19], $row[20], $row[21], $row[22], $row[23], $row[24], $row[25], $row[26], $row[27], $row[28], $row[29], $row[30], $row[31], $row[32], $row[33], $row[34], $row[35], $row[36], $row[37], $row[38], $row[39]];
        }
    }

    /**
     * @dataProvider series3200VerticalDatumData
     */
    public function testSeries3200VerticalDatums(string $gigsCode, string $name): void
    {
        Datum::registerCustomDatum('urn:ogc:def:datum:GIGS::' . $gigsCode, $name, Datum::DATUM_TYPE_VERTICAL, null, null, null);

        $this->assertInstanceOf(Datum::class, Datum::fromSRID('urn:ogc:def:datum:GIGS::' . $gigsCode));
    }

    public function series3200VerticalDatumData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3209_VerticalDatum.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1]];
        }
    }

    /**
     * @depends testSeries3200VerticalDatums
     * @dataProvider series3200VerticalCRSData
     */
    public function testSeries3200VerticalCRSs(string $gigsCode, string $name, string $datumCode, string $epsgCSCode): void
    {
        Vertical::registerCustomCRS('urn:ogc:def:crs:GIGS::' . $gigsCode, $name, 'urn:ogc:def:cs:EPSG::' . $epsgCSCode, 'urn:ogc:def:datum:GIGS::' . $datumCode, [1262]);
        $crs = Vertical::fromSRID('urn:ogc:def:crs:GIGS::' . $gigsCode);

        $this->assertEquals($name, $crs->getName());
    }

    public function series3200VerticalCRSData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3210_VerticalCRS.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[1], $row[2], $row[3]];
        }
    }

    /**
     * @dataProvider series3200VerticalTransformationData
     */
    public function testSeries3200VerticalTransformations(string $gigsCode, string $name, string $gigsSourceCRS, string $gigsTargetCRS, string $methodName, string $param1Name, string $param1Value, string $param1Unit, string $param2Name, string $param2Value, string $param2Unit, string $param3Name, string $param3Value, string $param3Unit, string $param4Name, string $param4Value, string $param4Unit, string $param5Name, string $param5Value, string $param5Unit, string $epsgOperationCode): void
    {
        if ($epsgOperationCode) {
            $originalOperation = CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgOperationCode);
            $originalParams = CoordinateOperations::getParamData('urn:ogc:def:coordinateOperation:EPSG::' . $epsgOperationCode);

            $uoms = [
                'NULL' => '',
                'metre' => Length::EPSG_METRE,
            ];

            $params = [
                $this->makeParamName($param1Name) => [
                    'value' => $param1Value !== 'NULL' ? $param1Value : null,
                    'uom' => $uoms[$param1Unit],
                    'reverses' => true,
                ],
                $this->makeParamName($param2Name) => [
                    'value' => $param2Value !== 'NULL' ? $param2Value : null,
                    'uom' => $uoms[$param2Unit],
                    'reverses' => true,
                ],
                $this->makeParamName($param3Name) => [
                    'value' => $param3Value !== 'NULL' ? $param3Value : null,
                    'uom' => $uoms[$param3Unit],
                    'reverses' => true,
                ],
                $this->makeParamName($param4Name) => [
                    'value' => $param4Value !== 'NULL' ? $param4Value : null,
                    'uom' => $uoms[$param4Unit],
                    'reverses' => true,
                ],
                $this->makeParamName($param5Name) => [
                    'value' => $param5Value !== 'NULL' ? $param5Value : null,
                    'uom' => $uoms[$param5Unit],
                    'reverses' => true,
                ],
            ];

            $params = array_filter($params, fn ($param) => $param['value'] !== null);
            foreach ($params as $name => $param) {
                $param[$name]['value'] = $param['uom'] === Angle::EPSG_SEXAGESIMAL_DMS ? $param['value'] : (float) $param['value'];
            }

            $method = match ($methodName) {
                'Vertical offset' => CoordinateOperationMethods::EPSG_VERTICAL_OFFSET,
            };

            CoordinateOperations::registerCustomOperation('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode, $name, $method, [1262], $params);
            CoordinateOperations::registerCustomTransformation('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode, $name, 'urn:ogc:def:crs:GIGS::' . $gigsSourceCRS, 'urn:ogc:def:crs:GIGS::' . $gigsTargetCRS, 0, true);

            $gigsOperation = CoordinateOperations::getOperationData('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode);
            $gigsParams = CoordinateOperations::getParamData('urn:ogc:def:coordinateOperation:GIGS::' . $gigsCode);

            $this->assertEquals($originalOperation['method'], $gigsOperation['method']);
            $this->assertEquals($originalParams, $gigsParams);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }

    public function series3200VerticalTransformationData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 3200 User-defined Geodetic Data Objects test data/ASCII/GIGS_user_3211_VertTfm.txt');

        foreach ($body as $row) {
            yield '#' . $row[0] => [$row[0], $row[5], $row[1], $row[3], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18], $row[19], $row[20], $row[21], $row[22], $row[23]];
        }
    }

    /**
     * @depends testSeries3200GeodeticCRSs
     * @depends testSeries3200Projections
     * @depends testSeries3200Conversions
     * @dataProvider series5100TransverseMercatorPart1Data
     * @dataProvider series5100TransverseMercatorPart2Data
     * @dataProvider series5100TransverseMercatorPart3Data
     * @dataProvider series5100TransverseMercatorPart4Data
     * @dataProvider series5100LCC1Part1Data
     * @dataProvider series5100LCC1Part2Data
     * @dataProvider series5100LCC2Part1Data
     * @dataProvider series5100LCC2Part2Data
     * @dataProvider series5100LCC2Part3Data
     * @dataProvider series5100OblStereoData
     * @dataProvider series5100HOMBPart1Data
     * @dataProvider series5100HOMBPart2Data
     * @dataProvider series5100HOMAData
     * @dataProvider series5100AmericanPolyconicData
     * @dataProvider series5100CassiniSoldnerData
     * @dataProvider series5100AlbersData
     * @dataProvider series5100LAEAData
     * @dataProvider series5100MercatorAPart1Data
     * @dataProvider series5100MercatorAPart2Data
     * @dataProvider series5100MercatorBData
     * @dataProvider series5100TransverseMercatorSouthOrientatedData
     */
    public function testSeries5100Projections(Angle $latitude, Angle $longitude, Length $easting, Length $northing, bool $inReverse, string $geographicCRSSrid, string $projectedCRSSrid, float $cartesianTolerance, float $geographicTolerance, float $roundTripCartesianTolerance, float $roundTripGeographicTolerance, bool $roundTripPoint): void
    {
        $geographicCRS = Geographic2D::fromSRID($geographicCRSSrid);
        $projectedCRS = Projected::fromSRID($projectedCRSSrid);

        $geographicPoint = GeographicPoint::create(
            $geographicCRS,
            $latitude,
            $longitude,
        );
        $projectedPoint = ProjectedPoint::create(
            $projectedCRS,
            $easting,
            $northing,
            $easting->multiply(-1),
            $northing->multiply(-1),
        );

        if (!$inReverse) {
            $convertedProjectedPoint = $geographicPoint->convert($projectedCRS);
            $this->assertEqualsWithDelta($projectedPoint->getEasting()->getValue(), $convertedProjectedPoint->getEasting()->getValue(), $cartesianTolerance);
            $this->assertEqualsWithDelta($projectedPoint->getNorthing()->getValue(), $convertedProjectedPoint->getNorthing()->getValue(), $cartesianTolerance);

            if ($roundTripPoint) {
                $convertedGeographicPoint = $convertedProjectedPoint->convert($geographicCRS);
                $this->assertEqualsWithDelta($geographicPoint->getLatitude()->getValue(), $convertedGeographicPoint->getLatitude()->getValue(), $roundTripGeographicTolerance);
                $this->assertEqualsWithDelta($geographicPoint->getLongitude()->getValue(), $convertedGeographicPoint->getLongitude()->getValue(), $roundTripGeographicTolerance);
            }
        } else {
            $convertedGeographicPoint = $projectedPoint->convert($geographicCRS);
            $this->assertEqualsWithDelta($geographicPoint->getLatitude()->getValue(), $convertedGeographicPoint->getLatitude()->getValue(), $geographicTolerance);
            $this->assertEqualsWithDelta($geographicPoint->getLongitude()->getValue(), $convertedGeographicPoint->getLongitude()->getValue(), $geographicTolerance);

            if ($roundTripPoint) {
                $convertedProjectedPoint = $convertedGeographicPoint->convert($projectedCRS);
                $this->assertEqualsWithDelta($projectedPoint->getEasting()->getValue(), $convertedProjectedPoint->getEasting()->getValue(), $roundTripCartesianTolerance);
                $this->assertEqualsWithDelta($projectedPoint->getNorthing()->getValue(), $convertedProjectedPoint->getNorthing()->getValue(), $roundTripCartesianTolerance);
            }
        }
    }

    public function series5100TransverseMercatorPart1Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5101_TM_output_part1_JHS.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64003';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62007';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100TransverseMercatorPart2Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5101_TM_output_part2_JHS.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64003';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62001';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100TransverseMercatorPart3Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5101_TM_output_part3_JHS.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64009';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62014';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100TransverseMercatorPart4Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5101_TM_output_part4_JHS.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62018';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[4]), new Metre((float) $row[3]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100LCC1Part1Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5102_LCC1_output_part1.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64020';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62035';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100LCC1Part2Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5102_LCC1_output_part2.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64011';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62026';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Grad((float) $row[1]), new Grad((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100LCC2Part1Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5103_LCC2_output_part1.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64008';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62013';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100LCC2Part2Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5103_LCC2_output_part2.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62024';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Foot((float) $row[3]), new Foot((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100LCC2Part3Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5103_LCC2_output_part3.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62024';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new USSurveyFoot((float) $row[3]), new USSurveyFoot((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100OblStereoData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5104_OblStereo_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64006';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62011';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100HOMBPart1Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5105_HOM-B_output_part1.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62020';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100HOMBPart2Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5105_HOM-B_output_part2.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64015';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62036';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100HOMAData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5106_HOM-A_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62021';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100AmericanPolyconicData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5107_AmPolyC_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62019';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100CassiniSoldnerData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5108_Cass_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62022';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100AlbersData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5109_Albers_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64009';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62016';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100LAEAData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5110_LAEA_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62023';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[4]), new Metre((float) $row[3]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100MercatorAPart1Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5111_MercA_output_part1.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64014';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62037';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100MercatorAPart2Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5111_MercA_output_part2.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64007';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62012';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Metre((float) $row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100MercatorBData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5112_MercB_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64017';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62034';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[4]), new Metre((float) $row[3]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    public function series5100TransverseMercatorSouthOrientatedData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5100 Conversion test data/ASCII/GIGS_conv_5113_TMSO_output.txt');

        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64010';
        $projectedCRSSrid = 'urn:ogc:def:crs:GIGS::62017';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) -$row[3]), new Metre((float) -$row[4]), $direction, $geographicCRSSrid, $projectedCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point'];
        }
    }

    /**
     * @depends testSeries3200GeodeticCRSs
     * @dataProvider series5200GeogGeocenData
     */
    public function testSeries5200GeographicGeocentric(Length $x, Length $y, Length $z, Angle $latitude, Angle $longitude, Length $height, bool $inReverse, string $geocentricCRSSrid, string $geographicCRSSrid, float $cartesianTolerance, float $geographicTolerance, float $roundTripCartesianTolerance, float $roundTripGeographicTolerance, bool $roundTripPoint): void
    {
        $geocentricCRS = Geocentric::fromSRID($geocentricCRSSrid);
        $geographicCRS = Geographic3D::fromSRID($geographicCRSSrid);

        $geocentricPoint = GeocentricPoint::create(
            $geocentricCRS,
            $x,
            $y,
            $z,
        );
        $geographicPoint = GeographicPoint::create(
            $geographicCRS,
            $latitude,
            $longitude,
            $height
        );

        if (!$inReverse) {
            $convertedGeographicPoint = $geocentricPoint->geographicGeocentric($geographicCRS);
            $this->assertEqualsWithDelta($geographicPoint->getLatitude()->getValue(), $convertedGeographicPoint->getLatitude()->getValue(), $geographicTolerance);
            $this->assertEqualsWithDelta($geographicPoint->getLongitude()->getValue(), $convertedGeographicPoint->getLongitude()->getValue(), $geographicTolerance);
            $this->assertEqualsWithDelta($geographicPoint->getHeight()->getValue(), $convertedGeographicPoint->getHeight()->getValue(), $cartesianTolerance);

            if ($roundTripPoint) {
                $convertedGeocentricPoint = $convertedGeographicPoint->geographicGeocentric($geocentricCRS);
                $this->assertEqualsWithDelta($geocentricPoint->getX()->getValue(), $convertedGeocentricPoint->getX()->getValue(), $roundTripCartesianTolerance);
                $this->assertEqualsWithDelta($geocentricPoint->getY()->getValue(), $convertedGeocentricPoint->getY()->getValue(), $roundTripCartesianTolerance);
                $this->assertEqualsWithDelta($geocentricPoint->getZ()->getValue(), $convertedGeocentricPoint->getZ()->getValue(), $roundTripCartesianTolerance);
            }
        } else {
            $convertedGeocentricPoint = $geographicPoint->geographicGeocentric($geocentricCRS);
            $this->assertEqualsWithDelta($geocentricPoint->getX()->getValue(), $convertedGeocentricPoint->getX()->getValue(), $cartesianTolerance);
            $this->assertEqualsWithDelta($geocentricPoint->getY()->getValue(), $convertedGeocentricPoint->getY()->getValue(), $cartesianTolerance);
            $this->assertEqualsWithDelta($geocentricPoint->getZ()->getValue(), $convertedGeocentricPoint->getZ()->getValue(), $cartesianTolerance);

            if ($roundTripPoint) {
                $convertedGeographicPoint = $convertedGeocentricPoint->geographicGeocentric($geographicCRS);
                $this->assertEqualsWithDelta($geographicPoint->getLatitude()->getValue(), $convertedGeographicPoint->getLatitude()->getValue(), $roundTripGeographicTolerance);
                $this->assertEqualsWithDelta($geographicPoint->getLongitude()->getValue(), $convertedGeographicPoint->getLongitude()->getValue(), $roundTripGeographicTolerance);
                $this->assertEqualsWithDelta($geographicPoint->getHeight()->getValue(), $convertedGeographicPoint->getHeight()->getValue(), $roundTripCartesianTolerance);
            }
        }
    }

    public function series5200GeogGeocenData(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5200 Coordinate transformation test data/ASCII/GIGS_tfm_5201_GeogGeocen_output.txt');

        $geocentricCRSSrid = 'urn:ogc:def:crs:GIGS::64001';
        $geographicCRSSrid = 'urn:ogc:def:crs:GIGS::64002';

        foreach ($body as $row) {
            $direction = match ($row['8']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Metre((float) $row[1]), new Metre((float) $row[2]), new Metre((float) $row[3]), new Degree((float) $row[4]), new Degree((float) $row[5]), new Metre((float) $row[6]), $direction, $geocentricCRSSrid, $geographicCRSSrid, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[9]) && $row[9] === 'Round Trip calculation point'];
        }
    }

    /**
     * @depends testSeries3200GeodeticCRSs
     * @depends testSeries3200Transformations
     * @dataProvider series5200PosVecPart1Data
     * @dataProvider series5200PosVecPart2Data
     */
    public function testSeries5200Transformations(Angle $latitude1, Angle $longitude1, ?Length $height1, Angle $latitude2, Angle $longitude2, ?Length $height2, bool $inReverse, string $geographicCRSSrid1, string $geographicCRSSrid2, float $cartesianTolerance, float $geographicTolerance, float $roundTripCartesianTolerance, float $roundTripGeographicTolerance, bool $roundTripPoint, string $operation): void
    {
        $geographicCRS1 = Geographic::fromSRID($geographicCRSSrid1);
        $geographicCRS2 = Geographic::fromSRID($geographicCRSSrid2);

        $geographicPoint1 = GeographicPoint::create(
            $geographicCRS1,
            $latitude1,
            $longitude1,
            $height1,
        );
        $geographicPoint2 = GeographicPoint::create(
            $geographicCRS2,
            $latitude2,
            $longitude2,
            $height2,
        );

        if (!$inReverse) {
            $convertedGeographicPoint2 = $geographicPoint1->performOperation($operation, $geographicCRS2, false);
            $this->assertEqualsWithDelta($geographicPoint2->getLatitude()->getValue(), $convertedGeographicPoint2->getLatitude()->getValue(), $geographicTolerance);
            $this->assertEqualsWithDelta($geographicPoint2->getLongitude()->getValue(), $convertedGeographicPoint2->getLongitude()->getValue(), $geographicTolerance);
            if ($height1) {
                $this->assertEqualsWithDelta($geographicPoint2->getHeight()->getValue(), $convertedGeographicPoint2->getHeight()->getValue(), $cartesianTolerance);
            }

            if ($roundTripPoint) {
                $originalConvertedGeographicPoint2 = $convertedGeographicPoint2;
                for ($i = 0; $i < 500; ++$i) {
                    $convertedGeographicPoint1 = $convertedGeographicPoint2->performOperation($operation, $geographicCRS1, true);
                    $convertedGeographicPoint2 = $geographicPoint1->performOperation($operation, $geographicCRS2, false);
                }
                $this->assertEqualsWithDelta($originalConvertedGeographicPoint2->getLatitude()->getValue(), $convertedGeographicPoint2->getLatitude()->getValue(), $roundTripGeographicTolerance);
                $this->assertEqualsWithDelta($originalConvertedGeographicPoint2->getLongitude()->getValue(), $convertedGeographicPoint2->getLongitude()->getValue(), $roundTripGeographicTolerance);
                if ($height1) {
                    $this->assertEqualsWithDelta($geographicPoint1->getHeight()->getValue(), $convertedGeographicPoint1->getHeight()->getValue(), $roundTripCartesianTolerance);
                }
            }
        } else {
            $convertedGeographicPoint1 = $geographicPoint2->performOperation($operation, $geographicCRS1, true);
            $this->assertEqualsWithDelta($geographicPoint1->getLatitude()->getValue(), $convertedGeographicPoint1->getLatitude()->getValue(), $geographicTolerance);
            $this->assertEqualsWithDelta($geographicPoint1->getLongitude()->getValue(), $convertedGeographicPoint1->getLongitude()->getValue(), $geographicTolerance);
            if ($height1) {
                $this->assertEqualsWithDelta($geographicPoint1->getHeight()->getValue(), $convertedGeographicPoint1->getHeight()->getValue(), $cartesianTolerance);
            }

            if ($roundTripPoint) {
                $convertedGeographicPoint2 = $convertedGeographicPoint1->performOperation($operation, $geographicCRS2, false);
                $this->assertEqualsWithDelta($geographicPoint2->getLatitude()->getValue(), $convertedGeographicPoint2->getLatitude()->getValue(), $roundTripGeographicTolerance);
                $this->assertEqualsWithDelta($geographicPoint2->getLongitude()->getValue(), $convertedGeographicPoint2->getLongitude()->getValue(), $roundTripGeographicTolerance);
                if ($height1) {
                    $this->assertEqualsWithDelta($geographicPoint2->getHeight()->getValue(), $convertedGeographicPoint2->getHeight()->getValue(), $cartesianTolerance);
                }
            }
        }
    }

    public function series5200PosVecPart1Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5200 Coordinate transformation test data/ASCII/GIGS_tfm_5203_PosVec_output_part1.txt');

        $geographicCRSSrid1 = 'urn:ogc:def:crs:GIGS::64005';
        $geographicCRSSrid2 = 'urn:ogc:def:crs:GIGS::64003';

        foreach ($body as $row) {
            $direction = match ($row['6']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), null,  new Degree((float) $row[3]), new Degree((float) $row[4]), null, $direction, $geographicCRSSrid1, $geographicCRSSrid2, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[7]) && $row[7] === 'Round Trip calculation point', 'urn:ogc:def:coordinateOperation:GIGS::61314'];
        }
    }

    public function series5200PosVecPart2Data(): Generator
    {
        [$header, $body] = $this->parseDataFile(__DIR__ . '/GIGS 5200 Coordinate transformation test data/ASCII/GIGS_tfm_5203_PosVec_output_part2.txt');

        $geographicCRSSrid1 = 'urn:ogc:def:crs:GIGS::64019';
        $geographicCRSSrid2 = 'urn:ogc:def:crs:GIGS::64002';

        foreach ($body as $row) {
            $direction = match ($row['8']) {
                'FORWARD' => false,
                'REVERSE' => true,
            };

            yield '#' . $row[0] => [new Degree((float) $row[1]), new Degree((float) $row[2]), new Metre((float) $row[3]), new Degree((float) $row[4]), new Degree((float) $row[5]), new Metre((float) $row[6]), $direction, $geographicCRSSrid1, $geographicCRSSrid2, (float) $header['Cartesian Tolerance'], (float) $header['Geographic Tolerance'], (float) $header['Round Trip Cartesian Tolerance'], (float) $header['Round Trip Geographic Tolerance'], isset($row[9]) && $row[9] === 'Round Trip calculation point', 'urn:ogc:def:coordinateOperation:GIGS::61314'];
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
            $line = trim($file->fgets());
            if ($line !== '') {
                if ($line[0] === '#') {
                    $header[] = $line;
                } else {
                    $body[] = explode("\t", $line);
                }
            }
        }

        $processedHeader = [];
        foreach ($header as $headerRow) {
            $headerRow = trim($headerRow, ' #');
            if (!$headerRow) {
                break;
            }
            $parts = explode(':', $headerRow);
            $processedHeader[trim($parts[0])] = trim($parts[1]);
        }

        return [$processedHeader, $body];
    }

    private function makeParamName(string $string): string
    {
        $string = str_replace([' ', '-', '(', ')', '"'], '', ucwords($string, ' -()"'));
        if (!preg_match('/^(EPSG|[ABC][uv\d])/', $string)) {
            $string = lcfirst($string);
        }

        if (in_array($string, ['latitudeAndLongitudeDifferenceFile', 'geocentricTranslationFile', 'verticalOffsetFile'], true)) {
            $string = 'offsetsFile';
        }

        return $string;
    }
}
