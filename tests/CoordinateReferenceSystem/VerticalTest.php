<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\CoordinateOperation\CRSTransformations;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPUnit\Framework\TestCase;

use function count;

class VerticalTest extends TestCase
{
    use VerticalSRIDData;

    public function testCanGetSupported(): void
    {
        $supported = Vertical::getSupportedSRIDs();
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
        $object = Vertical::fromSRID($srid);
        self::assertInstanceOf(Vertical::class, $object);
    }

    public function testExceptionOnUnknownSRIDCode(): void
    {
        $this->expectException(UnknownCoordinateReferenceSystemException::class);
        $object = Vertical::fromSRID('foo');
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
