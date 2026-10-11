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

class NADCON5GridTest extends TestCase
{
    public function testLittleEndianGridNodeMatchesRecord(): void
    {
        if (!class_exists(NADCON5NAD83PA11PATRF20222020HawaiiLatitudeProvider::class)) {
            self::markTestSkipped('North America datapack not installed');
        }

        $latitudeGrid = (new NADCON5NAD83PA11PATRF20222020HawaiiLatitudeProvider())->provideGrid();
        $longitudeGrid = (new NADCON5NAD83PA11PATRF20222020HawaiiLongitudeProvider())->provideGrid();
        $heightGrid = (new NADCON5NAD83PA11PATRF20222020HawaiiHeightProvider())->provideGrid();

        self::assertEqualsWithDelta(0.043948, $latitudeGrid->getValues(-158.0, 20.0)[0], 1e-6);
        self::assertEqualsWithDelta(-0.112621, $longitudeGrid->getValues(-158.0, 20.0)[0], 1e-6);
        self::assertEqualsWithDelta(0.234657, $heightGrid->getValues(-158.0, 20.0)[0], 1e-6);
    }
}
