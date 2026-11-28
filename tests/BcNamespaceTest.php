<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\Point\GeographicPoint;
use PHPCoord\Point\ProjectedPoint;
use PHPCoord\Point\UTMPoint;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function class_exists;
use function spl_autoload_register;

#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(false)]
class BcNamespaceTest extends TestCase
{
    public function testPointClassesAreNotLoadedEagerly(): void
    {
        self::assertFalse(class_exists(ProjectedPoint::class, false));
        self::assertFalse(class_exists('PHPCoord\ProjectedPoint', false));
    }

    public function testOldNameIsAutoloaded(): void
    {
        self::assertTrue(class_exists('PHPCoord\UTMPoint'));
        self::assertSame(UTMPoint::class, (new ReflectionClass('PHPCoord\UTMPoint'))->getName());
    }

    public function testOldNameIsAutoloadedCaseInsensitively(): void
    {
        self::assertTrue(class_exists('phpcoord\utmpoint'));
        self::assertSame(UTMPoint::class, (new ReflectionClass('PHPCoord\UTMPoint'))->getName());
    }

    public function testOldNameIsDeclaredWithClass(): void
    {
        $point = GeographicPoint::create(Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84), new Degree(50), new Degree(14));
        $acceptsOldName = static fn (\PHPCoord\GeographicPoint $point): Point => $point;

        self::assertSame($point, $acceptsOldName($point));
        self::assertTrue($point instanceof \PHPCoord\GeographicPoint);
    }

    public function testOldNameIsDeclaredWithClassLoadedByOtherAutoloader(): void
    {
        spl_autoload_register(static function (string $class): void {
            if ($class === UTMPoint::class) {
                require __DIR__ . '/../src/Point/UTMPoint.php';
            }
        }, true, true);

        self::assertTrue(class_exists(UTMPoint::class));
        self::assertTrue(class_exists('PHPCoord\UTMPoint', false));
    }
}
