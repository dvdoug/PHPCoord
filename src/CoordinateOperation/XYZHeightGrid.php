<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use Composer\Pcre\Preg;
use PHPCoord\UnitOfMeasure\Length\Metre;
use SplFixedArray;

use function array_fill;
use function array_unique;
use function assert;
use function count;
use function end;
use function round;
use function sort;
use function str_replace;

/**
 * Comma-separated longitude, latitude, offset. One node per line.
 */
class XYZHeightGrid extends GeographicGeoidHeightGrid
{
    use BilinearInterpolation;

    /**
     * @var SplFixedArray<float>
     */
    private SplFixedArray $data;

    public function __construct(string $filename)
    {
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE;
        $this->gridFile = new GridFile($filename);

        $size = $this->gridFile->getSize();
        $contents = $size > 0 ? $this->gridFile->fread($size) : '';
        Preg::matchAll('/^([^,\r\n]+),([^,\r\n]+),([^,\r\n]+)/m', str_replace(self::BOM, '', $contents), $matches);
        /** @var list<string> $longitudeStrings */
        $longitudeStrings = $matches[1];
        /** @var list<string> $latitudeStrings */
        $latitudeStrings = $matches[2];
        /** @var list<string> $heightStrings */
        $heightStrings = $matches[3];
        $longitudes = [];
        $latitudes = [];
        $heights = [];
        $recordCount = count($longitudeStrings);
        for ($k = 0; $k < $recordCount; ++$k) {
            $longitudes[] = (float) $longitudeStrings[$k];
            $latitudes[] = (float) $latitudeStrings[$k];
            $heights[] = (float) $heightStrings[$k];
        }

        $xs = array_unique($longitudes);
        $ys = array_unique($latitudes);
        sort($xs);
        sort($ys);

        $this->startX = $xs[0];
        $this->startY = $ys[0];
        $this->endX = (float) end($xs);
        $this->endY = (float) end($ys);
        $this->numberOfColumns = count($xs);
        $this->numberOfRows = count($ys);
        $this->columnGridInterval = ($this->endX - $this->startX) / ($this->numberOfColumns - 1);
        $this->rowGridInterval = ($this->endY - $this->startY) / ($this->numberOfRows - 1);

        /** @var SplFixedArray<float> $data */
        $data = SplFixedArray::fromArray(array_fill(0, $this->numberOfColumns * $this->numberOfRows, 0.0));
        $this->data = $data;
        $records = count($longitudes);
        for ($k = 0; $k < $records; ++$k) {
            $index = (int) round((($latitudes[$k] - $this->startY) / $this->rowGridInterval) * $this->numberOfColumns + ($longitudes[$k] - $this->startX) / $this->columnGridInterval);
            $this->data[$index] = $heights[$k];
        }
    }

    /**
     * @return Metre[]
     */
    public function getValues(float $x, float $y): array
    {
        $shift = $this->interpolate($x, $y)[0];

        return [new Metre($shift)];
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordId = $latitudeIndex * $this->numberOfColumns + $longitudeIndex;

        assert($this->data[$recordId] !== null);
        $record = $this->data[$recordId];

        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        return new GridValues($longitude, $latitude, [$record]);
    }
}
