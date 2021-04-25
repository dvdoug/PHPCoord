<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use function count;
use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPUnit\Framework\TestCase;

class Geographic3DTest extends TestCase
{
    use Geographic3DSRIDData;

    public function testCanGetSupported(): void
    {
        $supported = Geographic3D::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    /**
     * @group integration
     * @dataProvider coordinateReferenceSystems
     */
    public function testCanCreateSupported(string $srid): void
    {
        $object = Geographic3D::fromSRID($srid);
        self::assertInstanceOf(Geographic3D::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Geographic3D::fromSRID('foo');
    }

    public function coordinateReferenceSystems(): array
    {
        $crsThatWillBeCreatedViaOperationTesting = [];

        foreach (CRSTransformations::getSupportedTransformations() as $transformation) {
            $crsThatWillBeCreatedViaOperationTesting[$transformation['source_crs']] = $transformation['source_crs'];
            $crsThatWillBeCreatedViaOperationTesting[$transformation['target_crs']] = $transformation['target_crs'];
        }

        $return = [];
        foreach (static::$sridData as $srid => $data) {
            if (!isset($crsThatWillBeCreatedViaOperationTesting[$srid])) {
                $return[$data['name']] = [$srid];
            }
        }

        return $return;
    }
}
