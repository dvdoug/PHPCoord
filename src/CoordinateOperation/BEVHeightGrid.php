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
use function array_pop;
use function array_slice;
use function array_unique;
use function assert;
use function count;
use function end;
use function explode;
use function implode;
use function round;
use function sort;
use function str_ends_with;

class BEVHeightGrid extends GeographicGeoidHeightGrid
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
        $lines = $contents === '' ? [] : explode("\n", $contents);
        if ($lines !== [] && str_ends_with($contents, "\n")) {
            array_pop($lines);
        }
        // The first line is the column header.
        Preg::matchAll('/^([^;\r\n]*);([^;\r\n]*);([^;\r\n]*)/m', implode("\n", array_slice($lines, 1)), $matches);
        /** @var list<string> $latitudeStrings */
        $latitudeStrings = $matches[1];
        /** @var list<string> $longitudeStrings */
        $longitudeStrings = $matches[2];
        /** @var list<string> $heightStrings */
        $heightStrings = $matches[3];
        $latitudes = [];
        $longitudes = [];
        $heights = [];
        $recordCount = count($latitudeStrings);
        for ($k = 0; $k < $recordCount; ++$k) {
            $latitudes[] = (float) $latitudeStrings[$k];
            $longitudes[] = (float) $longitudeStrings[$k];
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
        $this->columnGridInterval = round($xs[1] - $xs[0], 7);
        $this->rowGridInterval = round($ys[1] - $ys[0], 7);
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;

        // Not every node of the rectangle is in the file, so a gap stays 0.
        /** @var SplFixedArray<float> $data */
        $data = SplFixedArray::fromArray(array_fill(0, $this->numberOfColumns * $this->numberOfRows, 0.0));
        $this->data = $data;
        $records = count($latitudes);
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
