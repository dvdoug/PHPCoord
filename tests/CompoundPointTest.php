<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTime;
use DateTimeImmutable;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class CompoundPointTest extends TestCase
{
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
            Compound::fromSRID(Compound::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT)
        );
        $from->calculateDistance($to);
    }

    public function testVerticalOffsetAndSlope(): void
    {
        $from = CompoundPoint::create(GeographicPoint::create(new Radian(0.826122513), new Radian(0.168715161), null, Geographic2D::fromSRID(Geographic2D::EPSG_ETRS89)), VerticalPoint::create(new Metre(473), Vertical::fromSRID(Vertical::EPSG_EVRF2007_HEIGHT)), Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_EVRF2007_HEIGHT));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_EVRF2000_HEIGHT);
        $to = $from->verticalOffsetAndSlope($toCRS, new Radian(0.818850307), new Radian(0.142826110), new Metre(-0.245), new Radian(-0.000001018), new Radian(-0.000000155), 4258);

        self::assertEqualsWithDelta(0.826122513, $to->getHorizontalPoint()->getLatitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(0.168715161, $to->getHorizontalPoint()->getLongitude()->asRadians()->getValue(), 0.0000000001);
        self::assertEqualsWithDelta(472.69, $to->getVerticalPoint()->getHeight()->asMetres()->getValue(), 0.001);
    }

    public function testAutoConversionTokyoJSLDToWGS84(): void
    {
        $from = CompoundPoint::create(GeographicPoint::create(new Degree(35.689722), new Degree(139.692222), null, Geographic2D::fromSRID(Geographic2D::EPSG_TOKYO)), VerticalPoint::create(new Metre(100), Vertical::fromSRID(Vertical::EPSG_JSLD69_HEIGHT)), Compound::fromSRID(Compound::EPSG_TOKYO_PLUS_JSLD69_HEIGHT));
        $toCRS = Geographic3D::fromSRID(Geographic3D::EPSG_WGS_84);
        $to = $from->convert($toCRS);

        self::assertEqualsWithDelta(35.692958, $to->getLatitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(139.689019, $to->getLongitude()->getValue(), 0.000001);
        self::assertEqualsWithDelta(138.5, $to->getHeight()->getValue(), 0.001);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid, bool $reversible): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);

        $sourceCRS = Compound::fromSRID($sourceCrsSrid);
        $sourceHorizontalCRS = $sourceCRS->getHorizontal();
        if ($sourceHorizontalCRS instanceof Geographic2D) {
            $latitude = new Degree(($operation['bounding_box']['north'] + $operation['bounding_box']['south']) / 2);

            $longitude = new Degree(($operation['bounding_box']['west'] + $operation['bounding_box']['east']) / 2);
            if ($operation['bounding_box']['east'] < $operation['bounding_box']['west'] && $longitude->getValue() <= 0) {
                $longitude = $longitude->add(new Degree(180));
            }
            $horizontalPoint = GeographicPoint::create($latitude, $longitude, null, $sourceHorizontalCRS);
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
        $crss = Compound::getSupportedSRIDs();
        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            if (isset($crss[$transformation['source_crs']])) {
                $toTest[] = [
                    $transformation['source_crs'],
                    $transformation['target_crs'],
                    $transformation['operation'],
                    $transformation['reversible'],
                ];
            }
        }

        return $toTest;
    }
}
