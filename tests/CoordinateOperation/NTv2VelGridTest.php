<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPUnit\Framework\TestCase;

use function class_exists;

class NTv2VelGridTest extends TestCase
{
    public function testGridCornerMatchesFirstRecord(): void
    {
        if (!class_exists(NTv2VelNAD83CSRSv8CanadaProvider::class)) {
            self::markTestSkipped('North America datapack not installed');
        }

        $grid = (new NTv2VelNAD83CSRSv8CanadaProvider())->provideGrid();
        $values = $grid->getValues(-40.0, 40.0);

        self::assertEqualsWithDelta(1.443107, $values[0]->getValue(), 1e-5);
        self::assertEqualsWithDelta(-0.955935, $values[1]->getValue(), 1e-5);
        self::assertEqualsWithDelta(-1.408325, $values[2]->getValue(), 1e-5);
    }
}
