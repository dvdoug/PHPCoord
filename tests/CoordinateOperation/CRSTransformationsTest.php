<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPUnit\Framework\TestCase;

class CRSTransformationsTest extends TestCase
{
    /**
     * @group integration
     * @dataProvider CRSList
     */
    public function testCanInstantiateAllCRSInData($crsSRID): void
    {
        self::assertInstanceOf(CoordinateReferenceSystem::class, CoordinateReferenceSystem::fromSRID($crsSRID));
    }

    public function CRSList(): array
    {
        $data = [];
        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            $data[$transformation['source_crs']] = [$transformation['source_crs']];
            $data[$transformation['target_crs']] = [$transformation['target_crs']];
        }

        return $data;
    }
}
