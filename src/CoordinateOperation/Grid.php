<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use SplFileObject;

/**
 * @internal
 */
abstract class Grid
{
    protected const STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE = 1;

    protected const STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE = 2;

    protected const STORAGE_ORDER_DECREASING_LATITUDE_INCREASING_LONGITUDE = 3;

    protected const STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE = 4;

    protected int $storageOrder;

    protected SplFileObject $gridFile;

    abstract public function getValues(float $x, float $y): array;
}
