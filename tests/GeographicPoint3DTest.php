<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTime;
use PHPCoord\CoordinateOperation\BEVHeightETRS89EVRF2000AustriaProvider;
use PHPCoord\CoordinateOperation\BYNNAD83CSRSCGG2013aProvider;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformationsAfrica;
use PHPCoord\CoordinateOperation\CRSTransformationsAntarctic;
use PHPCoord\CoordinateOperation\CRSTransformationsArctic;
use PHPCoord\CoordinateOperation\CRSTransformationsAsia;
use PHPCoord\CoordinateOperation\CRSTransformationsEurope;
use PHPCoord\CoordinateOperation\CRSTransformationsGlobal;
use PHPCoord\CoordinateOperation\CRSTransformationsNorthAmerica;
use PHPCoord\CoordinateOperation\CRSTransformationsOceania;
use PHPCoord\CoordinateOperation\CRSTransformationsSouthAmerica;
use PHPCoord\CoordinateOperation\DATITRF2005SALLDProvider;
use PHPCoord\CoordinateOperation\GTXGDA2020AHDProvider;
use PHPCoord\CoordinateOperation\GTXNZGeoid2016Provider;
use PHPCoord\CoordinateOperation\GUGiKHeightETRF2000Baltic1986PolandProvider;
use PHPCoord\CoordinateOperation\IGNESHeightETRS89REDNAPSpainProvider;
use PHPCoord\CoordinateOperation\IGNFHeightRGF93v2bNGFIGN69FranceProvider;
use PHPCoord\CoordinateOperation\KMSETRS89NN2000Provider;
use PHPCoord\CoordinateOperation\KMSPOSGAR2007SRVN16Provider;
use PHPCoord\CoordinateOperation\OSGM15BelfastProvider;
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

use function class_exists;
use function str_ends_with;

class GeographicPoint3DTest extends TestCase
{
    use Geographic3DSRIDData;

    public function testGeographic3DTo2DPlusGravityHeightOSGM15(): void
    {
        if (!class_exists(OSTN15OSGM15Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(53.77911025760), new Degree(-3.04045490691), new Metre(64.940));
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
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(53.77911025760), new Degree(-3.04045490691), new Metre(64.940));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_ODN_HEIGHT);
        $to = $from->geographic3DToGravityHeightOSGM15($toCRS, (new OSTN15OSGM15Provider())->provideGrid());

        self::assertEqualsWithDelta(12.658, $to->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightGTXNZ(): void
    {
        if (!class_exists(GTXNZGeoid2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_NZGD2000), new Degree(-36.9003), new Degree(174.7794), new Metre(50));
        $toCRS = Compound::fromSRID(Compound::EPSG_NZGD2000_PLUS_NZVD2016_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new GTXNZGeoid2016Provider())->provideGrid());

        self::assertEqualsWithDelta(-36.9003, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(174.7794, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(15.715, $to->getVerticalPoint()->getHeight()->getValue(), 0.0001);
    }

    public function testGeographic3DGravityHeightGTXNZ(): void
    {
        if (!class_exists(GTXNZGeoid2016Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_NZGD2000), new Degree(-36.9003), new Degree(174.7794), new Metre(50));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT);
        $to = $from->geographic3DToGravityHeightFromGrid($toCRS, (new GTXNZGeoid2016Provider())->provideGrid());

        self::assertEqualsWithDelta(15.715, $to->getHeight()->getValue(), 0.0001);
    }

    public function testGeographic3DTo2DPlusGravityHeightGTXAustralia(): void
    {
        if (!class_exists(GTXGDA2020AHDProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-oceania');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_GDA2020), new Degree(-36.9003), new Degree(144.7794), new Metre(50));
        $toCRS = Compound::fromSRID(Compound::EPSG_GDA2020_PLUS_AHD_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new GTXGDA2020AHDProvider())->provideGrid());

        self::assertEqualsWithDelta(-36.9003, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(144.7794, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(43.504, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightIGNFFrance(): void
    {
        if (!class_exists(IGNFHeightRGF93v2bNGFIGN69FranceProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_RGF93_V2B), new Degree(48.858222), new Degree(2.2945), new Metre(50));
        $toCRS = Compound::fromSRID(Compound::EPSG_RGF93_V2B_PLUS_NGF_IGN69_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new IGNFHeightRGF93v2bNGFIGN69FranceProvider())->provideGrid());

        self::assertEqualsWithDelta(48.858222, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(2.2945, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(6.187, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightIGNESSpain(): void
    {
        if (!class_exists(IGNESHeightETRS89REDNAPSpainProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(41.403611), new Degree(2.174444), new Metre(0));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_ALICANTE_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new IGNESHeightETRS89REDNAPSpainProvider())->provideGrid());

        self::assertEqualsWithDelta(41.403611, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(2.174444, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-49.196, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DGravityHeightIGNESSpain(): void
    {
        if (!class_exists(IGNESHeightETRS89REDNAPSpainProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(41.403611), new Degree(2.174444), new Metre(0));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_ALICANTE_HEIGHT);
        $to = $from->geographic3DToGravityHeightFromGrid($toCRS, (new IGNESHeightETRS89REDNAPSpainProvider())->provideGrid());

        self::assertEqualsWithDelta(-49.196, $to->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightGUGiKPoland(): void
    {
        if (!class_exists(GUGiKHeightETRF2000Baltic1986PolandProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRF2000_PL), new Degree(50.053889), new Degree(19.934722), new Metre(0));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRF2000_PL_PLUS_BALTIC_1986_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new GUGiKHeightETRF2000Baltic1986PolandProvider())->provideGrid());

        self::assertEqualsWithDelta(50.053889, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(19.934722, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-39.8409, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DGravityHeightGUGiKPoland(): void
    {
        if (!class_exists(GUGiKHeightETRF2000Baltic1986PolandProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRF2000_PL), new Degree(50.053889), new Degree(19.934722), new Metre(0));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_BALTIC_1986_HEIGHT);
        $to = $from->geographic3DToGravityHeightFromGrid($toCRS, (new GUGiKHeightETRF2000Baltic1986PolandProvider())->provideGrid());

        self::assertEqualsWithDelta(-39.8409, $to->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightBEVAustria(): void
    {
        if (!class_exists(BEVHeightETRS89EVRF2000AustriaProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(48.27091391), new Degree(16.29473899), new Metre(0));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_EVRF2000_AUSTRIA_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new BEVHeightETRS89EVRF2000AustriaProvider())->provideGrid());

        self::assertEqualsWithDelta(48.27091391, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(16.29473899, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-44.8984, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DGravityHeightBEVAustria(): void
    {
        if (!class_exists(BEVHeightETRS89EVRF2000AustriaProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(48.27091391), new Degree(16.29473899), new Metre(0));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_EVRF2000_AUSTRIA_HEIGHT);
        $to = $from->geographic3DToGravityHeightFromGrid($toCRS, (new BEVHeightETRS89EVRF2000AustriaProvider())->provideGrid());

        self::assertEqualsWithDelta(-44.8984, $to->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightBYNCanada(): void
    {
        if (!class_exists(BYNNAD83CSRSCGG2013aProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-northamerica');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_NAD83_CSRS), new Degree(43.6426), new Degree(-79.3871), new Metre(0));
        $toCRS = Compound::fromSRID(Compound::EPSG_NAD83_CSRS_PLUS_CGVD2013_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new BYNNAD83CSRSCGG2013aProvider())->provideGrid());

        self::assertEqualsWithDelta(43.6426, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-79.3871, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(36.072, $to->getVerticalPoint()->getHeight()->getValue(), 0.01);
    }

    public function testGeographic3DToGravityHeightBYNCanada(): void
    {
        if (!class_exists(BYNNAD83CSRSCGG2013aProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-northamerica');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_NAD83_CSRS), new Degree(43.6426), new Degree(-79.3871), new Metre(0));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_CGVD2013_CGG2013A_HEIGHT);
        $to = $from->geographic3DToGravityHeightFromGrid($toCRS, (new BYNNAD83CSRSCGG2013aProvider())->provideGrid());

        self::assertEqualsWithDelta(36.072, $to->getHeight()->getValue(), 0.01);
    }

    public function testGeographic3DTo2DPlusGravityHeightKMSNorway(): void
    {
        if (!class_exists(KMSETRS89NN2000Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(59.964611), new Degree(10.666611), new Metre(0));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_NN2000_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new KMSETRS89NN2000Provider())->provideGrid());

        self::assertEqualsWithDelta(59.964611, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(10.666611, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-39.3902, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DToGravityHeightKMSNorway(): void
    {
        if (!class_exists(KMSETRS89NN2000Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(59.964611), new Degree(10.666611), new Metre(0));
        $toCRS = Vertical::fromSRID(Vertical::EPSG_NN2000_HEIGHT);
        $to = $from->geographic3DToGravityHeightFromGrid($toCRS, (new KMSETRS89NN2000Provider())->provideGrid());

        self::assertEqualsWithDelta(-39.3902, $to->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightKMSArgentina(): void
    {
        if (!class_exists(KMSPOSGAR2007SRVN16Provider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-southamerica');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_POSGAR_2007), new Degree(-34.431955), new Degree(-61.075266), new Metre(0));
        $toCRS = Compound::fromSRID(Compound::EPSG_POSGAR_2007_PLUS_SRVN16_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new KMSPOSGAR2007SRVN16Provider())->provideGrid());

        self::assertEqualsWithDelta(-34.431955, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-61.075266, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-18.048, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightSouthAfrica(): void
    {
        if (!class_exists(DATITRF2005SALLDProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-africa');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ITRF2005), new Degree(-30.237), new Degree(22.455), new Metre(0));
        $toCRS = Compound::fromSRID(Compound::EPSG_ITRF2005_PLUS_SA_LLD_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new DATITRF2005SALLDProvider())->provideGrid());

        self::assertEqualsWithDelta(-30.237, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(22.455, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-32.783, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    public function testGeographic3DTo2DPlusGravityHeightIreland(): void
    {
        if (!class_exists(OSGM15BelfastProvider::class)) {
            self::markTestSkipped('Requires phpcoord/datapack-europe');
        }
        $from = GeographicPoint::create(Geographic3D::fromSRID(Geographic3D::EPSG_ETRS89), new Degree(54.91386860), new Degree(-6.12946233), new Metre(192.1404));
        $toCRS = Compound::fromSRID(Compound::EPSG_ETRS89_PLUS_BELFAST_HEIGHT);
        $to = $from->geographic3DTo2DPlusGravityHeightFromGrid($toCRS, (new OSGM15BelfastProvider())->provideGrid());

        self::assertEqualsWithDelta(54.91386860, $to->getHorizontalPoint()->getLatitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(-6.12946233, $to->getHorizontalPoint()->getLongitude()->getValue(), 0.00000000001);
        self::assertEqualsWithDelta(135.8810, $to->getVerticalPoint()->getHeight()->getValue(), 0.001);
    }

    /**
     * @group integration
     * @dataProvider supportedOperations
     */
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid, bool $reversible): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);
        $operationExtent = BoundingArea::createFromExtentCodes($operation['extent']);
        $centre = $operationExtent->getPointInside();

        $sourceCRS = Geographic::fromSRID($sourceCrsSrid);
        $centre[1] = $centre[1]->subtract($sourceCRS->getDatum()->getPrimeMeridian()->getGreenwichLongitude()); // compensate for non-Greenwich prime meridian
        $sourceHeight = $sourceCRS instanceof Geographic3D ? new Metre(0) : null;
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();

        $originalPoint = GeographicPoint::create($sourceCRS, $centre[0], $centre[1], $sourceHeight, $epoch);
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
        foreach ([...CRSTransformationsGlobal::getSupportedTransformations(), ...CRSTransformationsAfrica::getSupportedTransformations(), ...CRSTransformationsAntarctic::getSupportedTransformations(), ...CRSTransformationsArctic::getSupportedTransformations(), ...CRSTransformationsAsia::getSupportedTransformations(), ...CRSTransformationsEurope::getSupportedTransformations(), ...CRSTransformationsNorthAmerica::getSupportedTransformations(), ...CRSTransformationsOceania::getSupportedTransformations(), ...CRSTransformationsSouthAmerica::getSupportedTransformations()] as $transformation) {
            $needsNonExistentFile = false;

            if (isset(static::$sridData[$transformation['source_crs']])) {
                // filter out operations that require a grid file that we don't have
                foreach (CoordinateOperations::getParamData($transformation['operation']) as $paramName => $paramValue) {
                    if (str_ends_with($paramName, 'File') && $paramValue !== null && !class_exists($paramValue)) {
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
