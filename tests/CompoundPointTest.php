<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use function class_exists;
use DateTime;
use DateTimeImmutable;
use PHPCoord\CoordinateOperation\CoordinateOperationParams;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\CoordinateOperation\GTXNZGeoid2016Provider;
use PHPCoord\CoordinateOperation\OSTN15OSGM15Provider;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CompoundSRIDData;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class CompoundPointTest extends TestCase
{
    use CompoundSRIDData;

    public function testCompound(): void
    {
        $object = CompoundPoint::create(
            ProjectedPoint::create(new Metre(123), new Metre(456), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        self::assertEquals(123, $object->getHorizontalPoint()->getEasting()->getValue());
        self::assertEquals(456, $object->getHorizontalPoint()->getNorthing()->getValue());
        self::assertEquals(789, $object->getVerticalPoint()->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::6893', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('((123, 456), (789))', $object->__toString());
    }

    public function testCompoundWithEpochDateTime(): void
    {
        $object = CompoundPoint::create(
            ProjectedPoint::create(new Metre(123), new Metre(456), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT),
            new DateTime('2003-02-01')
        );
        self::assertEquals(123, $object->getHorizontalPoint()->getEasting()->getValue());
        self::assertEquals(456, $object->getHorizontalPoint()->getNorthing()->getValue());
        self::assertEquals(789, $object->getVerticalPoint()->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::6893', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('((123, 456), (789))', $object->__toString());
    }

    public function testCompoundWithEpochDateTimeImmutable(): void
    {
        $object = CompoundPoint::create(
            ProjectedPoint::create(new Metre(123), new Metre(456), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT),
            new DateTimeImmutable('2003-02-01')
        );
        self::assertEquals(123, $object->getHorizontalPoint()->getEasting()->getValue());
        self::assertEquals(456, $object->getHorizontalPoint()->getNorthing()->getValue());
        self::assertEquals(789, $object->getVerticalPoint()->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::6893', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('((123, 456), (789))', $object->__toString());
    }

    public function testDistanceCalculation(): void
    {
        $from = CompoundPoint::create(
            ProjectedPoint::create(new Metre(438700), new Metre(114800), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        $to = CompoundPoint::create(
            ProjectedPoint::create(new Metre(533600), new Metre(180500), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        self::assertEqualsWithDelta(115423.134596, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testDistanceDifferentCRS(): void
    {
        $this->expectException(InvalidCoordinateReferenceSystemException::class);
        $from = CompoundPoint::create(
            ProjectedPoint::create(new Metre(438700), new Metre(114800), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT)
        );
        $to = CompoundPoint::create(
            ProjectedPoint::create(new Metre(533600), new Metre(180500), null, null, Projected::fromSRID(Projected::EPSG_WGS_84_WORLD_MERCATOR)),
            VerticalPoint::create(new Metre(789), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT)),
            Compound::fromSRID(Compound::EPSG_OSGB36_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT)
        );
        $from->calculateDistance($to);
    }

    public function testGeographic3DTo2DPlusGravityHeightOSGM15(): void
    {
        if (!class_exists(OSTN15OSGM15Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = CompoundPoint::create(
            GeographicPoint::create(
                new Degree(53.77911025760),
                new Degree(-3.04045490691),
                null,
                Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89)
            ),
            VerticalPoint::create(
                new Metre(12.658),
                Vertical::fromSRID(Vertical::EPSG_ODN_HEIGHT)
            ),
            Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_ODN_HEIGHT)
        );
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89);
        $to = $from->geographic3DTo2DPlusGravityHeightOSGM15($toCRS, (new OSTN15OSGM15Provider())->provideGrid(), Geographic2D::EPSG_ETRS89);

        self::assertEqualsWithDelta(53.77911025760, $to->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-3.04045490691, $to->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(64.940, $to->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightGTX(): void
    {
        if (!class_exists(GTXNZGeoid2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $from = CompoundPoint::create(
            GeographicPoint::create(
                new Degree(-36.9003),
                new Degree(174.7794),
                null,
                Geographic2D::fromSRID(Geographic2D::EPSG_NZGD2000)
            ),
            VerticalPoint::create(
                new Metre(15.715),
                Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT)
            ),
            Compound::fromSRID(Compound::EPSG_NZGD2000_PLUS_NZVD2016_HEIGHT)
        );
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_NZGD2000);
        $to = $from->geographic3DTo2DPlusGravityHeightGTX($toCRS, (new GTXNZGeoid2016Provider())->provideGrid(), '');

        self::assertEqualsWithDelta(-36.9003, $to->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(174.7794, $to->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(50.000, $to->getHeight()->getValue(), 0.0001);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid, bool $reversible): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);
        $operationExtent = BoundingArea::createFromExtentCodes($operation['extent_code']);

        $sourceCRS = Compound::fromSRID($sourceCrsSrid);
        $sourceHorizontalCRS = $sourceCRS->getHorizontal();
        if ($sourceHorizontalCRS instanceof Geographic2D) {
            $centre = $operationExtent->getPointInside();
            $centre[1] = $centre[1]->subtract($sourceCRS->getHorizontal()->getDatum()->getPrimeMeridian()->getGreenwichLongitude()); //compensate for non-Greenwich prime meridian

            $horizontalPoint = GeographicPoint::create($centre[0], $centre[1], null, $sourceHorizontalCRS);
        } elseif ($sourceHorizontalCRS instanceof Geographic2D) {
            $horizontalPoint = ProjectedPoint::create(new Metre(0), new Metre(0), new Metre(0), new Metre(0), $sourceHorizontalCRS);
        }
        $verticalCRS = $sourceCRS->getVertical();
        $verticalPoint = VerticalPoint::create(new Metre(0), $verticalCRS);
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();

        $originalPoint = CompoundPoint::create($horizontalPoint, $verticalPoint, $sourceCRS, $epoch);
        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($reversible) {
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true);

            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getVerticalPoint()->getHeight()->getValue(), $reversedPoint->getVerticalPoint()->getHeight()->getValue(), 0.001);

            if ($sourceCRS instanceof Geographic) {
                self::assertEqualsWithDelta($originalPoint->getHorizontalPoint()->getLatitude()->getValue(), $reversedPoint->getHorizontalPoint()->getLatitude()->getValue(), 0.001);
                self::assertEqualsWithDelta($originalPoint->getHorizontalPoint()->getLongitude()->getValue(), $reversedPoint->getHorizontalPoint()->getLongitude()->getValue(), 0.001);
            }
        }
    }

    public function supportedOperations(): array
    {
        $toTest = [];
        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            $needsNonExistentFile = false;

            if (isset(static::$sridData[$transformation['source_crs']])) {
                //filter out operations that require a grid file that we don't have
                foreach (CoordinateOperationParams::getParamData($transformation['operation']) as $param) {
                    if (isset($param['fileProvider']) && !class_exists($param['fileProvider'])) {
                        $needsNonExistentFile = true;
                    }
                }

                if (!$needsNonExistentFile) {
                    $toTest[$transformation['operation'] . ' ' . $transformation['name'] . ': ' . $transformation['source_crs'] . '->' . $transformation['target_crs']] = [
                        $transformation['source_crs'],
                        $transformation['target_crs'],
                        $transformation['operation'],
                        $transformation['reversible'],
                    ];
                }
            }
        }

        return $toTest;
    }
}
