<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Length\Metre;
use SplFixedArray;

use function array_unique;
use function assert;
use function count;
use function end;
use function explode;
use function round;
use function sort;
use function str_replace;
use function trim;

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

        $xs = [];
        $ys = [];
        while (!$this->gridFile->eof()) {
            $row = str_replace(self::BOM, '', trim($this->gridFile->fgets()));
            if ($row === '') {
                continue;
            }
            $data = explode(',', $row);
            $xs[] = (float) $data[0];
            $ys[] = (float) $data[1];
        }
        $xs = array_unique($xs);
        $ys = array_unique($ys);
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

        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            $this->data[$i] = 0.0;
        }

        $this->gridFile->rewind();
        while (!$this->gridFile->eof()) {
            $row = str_replace(self::BOM, '', trim($this->gridFile->fgets()));
            if ($row === '') {
                continue;
            }
            $rowData = explode(',', $row);
            $longitude = (float) $rowData[0];
            $latitude = (float) $rowData[1];
            $index = (int) round((($latitude - $this->startY) / $this->rowGridInterval) * $this->numberOfColumns + ($longitude - $this->startX) / $this->columnGridInterval);
            $this->data[$index] = (float) $rowData[2];
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
