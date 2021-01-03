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
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\UnitOfMeasure\Length\Foot;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPUnit\Framework\TestCase;

class VerticalPointTest extends TestCase
{
    public function testVertical(): void
    {
        $object = VerticalPoint::create(new Metre(123), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertNull($object->getCoordinateEpoch());
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithEpochDateTime(): void
    {
        $object = VerticalPoint::create(new Metre(123), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new DateTime('2003-02-01'));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithEpochDateTimeImmutable(): void
    {
        $object = VerticalPoint::create(new Metre(123), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT), new DateTimeImmutable('2003-02-01'));
        self::assertEquals(123, $object->getHeight()->getValue());
        self::assertEquals('urn:ogc:def:crs:EPSG::3855', $object->getCRS()->getSrid());
        self::assertEquals('2003-02-01', $object->getCoordinateEpoch()->format('Y-m-d'));
        self::assertEquals('(123)', $object->__toString());
    }

    public function testVerticalWithFeetAsUnits(): void
    {
        $object = VerticalPoint::create(new Foot(123), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        self::assertEquals(37.4904, $object->getHeight()->getValue());
    }

    public function testDistanceCalculation(): void
    {
        $from = VerticalPoint::create(new Metre(100), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        $to = VerticalPoint::create(new Metre(80), Vertical::fromSRID(Vertical::EPSG_EGM2008_HEIGHT));
        self::assertEqualsWithDelta(20, $from->calculateDistance($to)->getValue(), 0.000001);
    }

    public function testVerticalOffset(): void
    {
        $from = VerticalPoint::create(new Metre(2.55), Vertical::fromSRID(Vertical::EPSG_BALTIC_1977_HEIGHT));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_BLACK_SEA_HEIGHT);
        $to = $from->verticalOffset($toCRS, new Metre(0.4));

        self::assertEqualsWithDelta(2.95, $to->getHeight()->getValue(), 0.001);
    }

    public function testHeightDepthReversal(): void
    {
        $from = VerticalPoint::create(new Metre(2.55), Vertical::fromSRID(Vertical::EPSG_BALTIC_1977_HEIGHT));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_BALTIC_1977_HEIGHT);
        $to = $from->heightDepthReversal($toCRS);

        self::assertEqualsWithDelta(-2.55, $to->getHeight()->getValue(), 0.001);
    }

    public function testChangeOfVerticalUnit(): void
    {
        $from = VerticalPoint::create(new Foot(1), Vertical::fromSRID(Vertical::EPSG_POOLBEG_HEIGHT_FT_BR36));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_POOLBEG_HEIGHT_M);
        $to = $from->changeOfVerticalUnit($toCRS, new Unity(0));

        self::assertEqualsWithDelta(0.3048, $to->getHeight()->getValue(), 0.001);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid, bool $reversible): void
    {
        $sourceCRS = Vertical::fromSRID($sourceCrsSrid);
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();

        $originalPoint = VerticalPoint::create(new Metre(0), $sourceCRS, $epoch);
        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($reversible) {
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true);

            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getHeight()->getValue(), $reversedPoint->getHeight()->getValue(), 0.0001);
        }
    }

    public function supportedOperations(): array
    {
        $toTest = [];
        $crss = Vertical::getSupportedSRIDs();
        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            if ($transformation['method'] === CoordinateOperationMethods::EPSG_VERTICAL_OFFSET_AND_SLOPE) { // tested as part of CompoundPoint
                continue;
            }

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
