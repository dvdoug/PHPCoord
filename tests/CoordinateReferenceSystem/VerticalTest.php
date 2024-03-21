<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
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

    public function testCanGetSupportedWithHelp(): void
    {
        $supported = Vertical::getSupportedSRIDsWithHelp();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsArray($value);
        }
    }

    #[DataProvider('coordinateReferenceSystems')]
    #[Group('integration')]
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

    public static function coordinateReferenceSystems(): array
    {
        $return = [];
        foreach (static::$sridData as $srid => $data) {
            $return[$data['name']] = [$srid];
        }

        return $return;
    }
}
