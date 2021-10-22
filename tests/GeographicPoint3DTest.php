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
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperationParams;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\CoordinateOperation\GTXNZGeoid2016Provider;
use PHPCoord\CoordinateOperation\OSTN15OSGM15Provider;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Geographic3DSRIDData;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class GeographicPoint3DTest extends TestCase
{
    use Geographic3DSRIDData;

    public function testGeographic3DTo2DPlusGravityHeightOSGM15(): void
    {
        if (!class_exists(OSTN15OSGM15Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(new Degree(53.77911025760), new Degree(-3.04045490691), new Metre(64.940), Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_ODN_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightOSGM15($toCRS, (new OSTN15OSGM15Provider())->provideGrid(), Geographic2D::EPSG_ETRS89);

        self::assertEqualsWithDelta(53.77911025760, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-3.04045490691, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(12.658, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DGravityHeightOSGM15(): void
    {
        if (!class_exists(OSTN15OSGM15Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(new Degree(53.77911025760), new Degree(-3.04045490691), new Metre(64.940), Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_ODN_HEIGHT);
        $to = $from->geographic3DToGravityHeightOSGM15($toCRS, (new OSTN15OSGM15Provider())->provideGrid());

        self::assertEqualsWithDelta(12.658, $to->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightGTX(): void
    {
        if (!class_exists(GTXNZGeoid2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $from = GeographicPoint::create(new Degree(-36.9003), new Degree(174.7794), new Metre(50), Geographic3D::fromSRID(Geographic3D::EPSG_NZGD2000));
        $toCRS = Compound::fromSRID(Compound::EPSG_NZGD2000_PLUS_NZVD2016_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightGTX($toCRS, (new GTXNZGeoid2016Provider())->provideGrid(), '');

        self::assertEqualsWithDelta(-36.9003, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(174.7794, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(15.715, $to->getVerticalPoint()->getHeight()->getValue(), 0.0001);
    }

    public function testGeographic3DGravityHeightGTX(): void
    {
        if (!class_exists(GTXNZGeoid2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $from = GeographicPoint::create(new Degree(-36.9003), new Degree(174.7794), new Metre(50), Geographic3D::fromSRID(Geographic3D::EPSG_NZGD2000));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT);
        $to = $from->geographic3DToGravityHeightGTX($toCRS, (new GTXNZGeoid2016Provider())->provideGrid());

        self::assertEqualsWithDelta(15.715, $to->getHeight()->getValue(), 0.0001);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid, bool $reversible): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);
        $operationExtent = BoundingArea::createFromExtentCodes($operation['extent_code']);
        $centre = $operationExtent->getPointInside();

        $sourceCRS = Geographic::fromSRID($sourceCrsSrid);
        $centre[1] = $centre[1]->subtract($sourceCRS->getDatum()->getPrimeMeridian()->getGreenwichLongitude()); //compensate for non-Greenwich prime meridian
        $sourceHeight = $sourceCRS instanceof Geographic3D ? new Metre(0) : null;
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();

        $originalPoint = GeographicPoint::create($centre[0], $centre[1], $sourceHeight, $sourceCRS, $epoch);
        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($reversible) {
            $delta = isset($operation['method']) && $operation['method'] === CoordinateOperationMethods::EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_13 ? 0.01 : 0.001;
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true);

            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getLatitude()->getValue(), $reversedPoint->getLatitude()->getValue(), $delta);
            self::assertEqualsWithDelta($originalPoint->getLongitude()->getValue(), $reversedPoint->getLongitude()->getValue(), $delta);
            if ($sourceHeight) {
                self::assertEqualsWithDelta($originalPoint->getHeight()->getValue(), $reversedPoint->getHeight()->getValue(), $delta);
            } else {
                self::assertNull($reversedPoint->getHeight());
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
