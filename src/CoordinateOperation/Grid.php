<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;

use function unpack;
use function assert;

/**
 * @internal
 */
abstract class Grid
{
    protected const BOM = "\xEF\xBB\xBF";

    protected const STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE = 1;

    protected const STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE = 2;

    protected const STORAGE_ORDER_DECREASING_LATITUDE_INCREASING_LONGITUDE = 3;

    protected const STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE = 4;

    protected int $storageOrder;

    protected GridFile $gridFile;

    /**
     * @return array<Angle|Length>
     */
    abstract public function getValues(float $x, float $y): array;

    /**
     * @return array<int|string, int|float|string>
     */
    protected function unpack(string $format, string $string, int $offset = 0): array
    {
        $result = unpack($format, $string, $offset);
        assert($result !== false, 'unpack() failed');

        return $result;
    }
}
