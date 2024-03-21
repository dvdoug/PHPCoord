<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTime;
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
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2DSRIDData;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

use function class_exists;
use function str_ends_with;

class GeographicPoint2DTest extends TestCase
{
    use Geographic2DSRIDData;

    #[DataProvider('supportedOperations')]
    #[Group('integration')]
    public function testOperations(string $sourceCrsSrid, string $targetCrsSrid, string $operationSrid): void
    {
        $operation = CoordinateOperations::getOperationData($operationSrid);
        $method = CoordinateOperationMethods::getMethodData($operation['method']);
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

        if ($method['reversible']) {
            $reversedPoint = $newPoint->performOperation($operationSrid, $sourceCRS, true);

            self::assertEquals($sourceCRS, $reversedPoint->getCRS());
            self::assertEqualsWithDelta($originalPoint->getLatitude()->getValue(), $reversedPoint->getLatitude()->getValue(), 0.002);
            self::assertEqualsWithDelta($originalPoint->getLongitude()->getValue(), $reversedPoint->getLongitude()->getValue(), 0.002);
            if ($sourceHeight) {
                self::assertEqualsWithDelta($originalPoint->getHeight()->getValue(), $reversedPoint->getHeight()->getValue(), 0.002);
            } else {
                self::assertNull($reversedPoint->getHeight());
            }
        }
    }

    public static function supportedOperations(): array
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
                    ];
                }
            }
        }

        return $toTest;
    }
}
