<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPUnit\Framework\TestCase;

class CoordinateOperationMethodsTest extends TestCase
{
    public function testReturnsExpectedFunctionForOffsets(): void
    {
        self::assertEquals('offsets', CoordinateOperationMethods::getFunctionName('urn:ogc:def:method:EPSG::9656'));
    }
}
