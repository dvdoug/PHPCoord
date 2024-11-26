<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\Exception\UnknownCoordinateSystemException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

use function count;

class EllipsoidalTest extends TestCase
{
    public function testCanGetSupported(): void
    {
        $supported = Ellipsoidal::getSupportedSRIDs();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsString($value);
        }
    }

    public function testCanGetSupportedWithHelp(): void
    {
        $supported = Ellipsoidal::getSupportedSRIDsWithHelp();
        self::assertGreaterThan(0, count($supported));
        foreach ($supported as $key => $value) {
            self::assertStringStartsWith('urn:ogc:def:', $key);
            self::assertIsArray($value);
        }
    }

    #[DataProvider('ellipsoidal')]
    #[Group('integration')]
    public function testCanCreateSupportedEllipsoidal(string $srid): void
    {
        $object = Ellipsoidal::fromSRID($srid);
        self::assertInstanceOf(CoordinateSystem::class, $object);
    }

    public function testExceptionOnUnknownSRIDCodeEllipsoidal(): void
    {
        $this->expectException(UnknownCoordinateSystemException::class);
        $object = Ellipsoidal::fromSRID('foo');
    }

    public static function ellipsoidal(): array
    {
        $data = [];
        foreach (Ellipsoidal::getSupportedSRIDs() as $srid => $name) {
            $data[$name] = [$srid];
        }

        return $data;
    }
}
