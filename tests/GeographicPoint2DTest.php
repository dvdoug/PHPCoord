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
use PHPCoord\CoordinateOperation\CoordinateOperationParams;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2DSRIDData;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPUnit\Framework\TestCase;

class GeographicPoint2DTest extends TestCase
{
    use Geographic2DSRIDData;

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
        $sourceHeight = $sourceCRS instanceof Geographic3D ? new Metre(0) : null;
        $targetCRS = CoordinateReferenceSystem::fromSRID($targetCrsSrid);

        $epoch = new DateTime();

        $originalPoint = GeographicPoint::create($centre[0], $centre[1], $sourceHeight, $sourceCRS, $epoch);
        $newPoint = $originalPoint->performOperation($operationSrid, $targetCRS, false);
        self::assertInstanceOf(Point::class, $newPoint);
        self::assertEquals($targetCRS, $newPoint->getCRS());

        if ($reversible) {
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

    public function supportedOperations(): array
    {
        $toTest = [];
        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            $needsNonExistentFile = false;
            $operationsInTransformation = [];

            $operation = CoordinateOperations::getOperationData($transformation['operation']);
            if (isset($operation['operations'])) {
                foreach ($operation['operations'] as $subOperation) {
                    $operationsInTransformation[] = $subOperation['operation'];
                }
            } else {
                $operationsInTransformation[] = $transformation['operation'];
            }

            if (isset(static::$sridData[$transformation['source_crs']])) {
                foreach ($operationsInTransformation as $operationInTransformation) {
                    //filter out operations that require a grid file that we don't have
                    foreach (CoordinateOperationParams::getParamData($operationInTransformation) as $param) {
                        if (isset($param['fileProvider']) && !class_exists($param['fileProvider'])) {
                            $needsNonExistentFile = true;
                        }
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
