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
use function assert;
use function count;
use function explode;
use function implode;
use function max;
use function min;
use function round;
use function str_ends_with;
use function str_replace;

class GUGiKHeightGrid extends GeographicGeoidHeightGrid
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
        $this->columnGridInterval = 0.01; // always
        $this->rowGridInterval = 0.01; // always

        $size = $this->gridFile->getSize();
        $contents = $size > 0 ? $this->gridFile->fread($size) : '';
        $lines = $contents === '' ? [] : explode("\n", $contents);
        if ($lines !== [] && str_ends_with($contents, "\n")) {
            array_pop($lines);
        }

        $i = 0;
        $lineCount = count($lines);
        do {
            $headerLine = str_replace(self::BOM, '', $lines[$i] ?? '');
            ++$i;
        } while ($headerLine !== '' && ($headerLine[0] ?? '') === '#' && $i < $lineCount);

        Preg::matchAll('/^([^\t\r\n]*)\t([^\t\r\n]*)\t([^\t\r\n]*)/m', implode("\n", array_slice($lines, $i)), $matches);
        /** @var list<string> $latitudeStrings */
        $latitudeStrings = $matches[1];
        /** @var list<string> $longitudeStrings */
        $longitudeStrings = $matches[2];
        /** @var list<string> $heightStrings */
        $heightStrings = $matches[3];
        /** @var non-empty-list<float> $latitudes */
        $latitudes = [];
        /** @var non-empty-list<float> $longitudes */
        $longitudes = [];
        $heights = [];
        $recordCount = count($latitudeStrings);
        for ($k = 0; $k < $recordCount; ++$k) {
            $latitudes[] = (float) $latitudeStrings[$k];
            $longitudes[] = (float) $longitudeStrings[$k];
            $heights[] = (float) $heightStrings[$k];
        }

        $startX = min($longitudes);
        $endX = max($longitudes);
        $startY = min($latitudes);
        $endY = max($latitudes);

        $this->startX = $startX;
        $this->startY = $startY;
        $this->numberOfColumns = (int) (string) (($endX - $startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($endY - $startY) / $this->rowGridInterval) + 1;

        // Not every node of the rectangle is in the file, so a gap stays 0.
        /** @var SplFixedArray<float> $data */
        $data = SplFixedArray::fromArray(array_fill(0, $this->numberOfColumns * $this->numberOfRows, 0.0));
        $this->data = $data;
        $records = count($latitudes);
        // The first data line is included in the extent above and left at 0.
        for ($k = 1; $k < $records; ++$k) {
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
