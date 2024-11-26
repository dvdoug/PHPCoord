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
use function end;
use function explode;
use function round;
use function sort;
use function trim;
use function assert;

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

        // these are not rectangular!!
        $xs = [];
        $ys = [];
        $this->gridFile->seek(1);
        while ($row = $this->gridFile->fgets()) {
            $data = explode(';', trim($row));
            $xs[] = (float) $data[1];
            $ys[] = (float) $data[0];
        }
        $xs = array_unique($xs);
        $ys = array_unique($ys);
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

        // init with 0
        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            $this->data[$i] = 0.0;
        }

        // fill in with actual values
        $this->gridFile->seek(1);
        while ($row = $this->gridFile->fgets()) {
            /** @var float[] $rowData */
            $rowData = explode(';', trim($row));

            $index = (int) round((($rowData[0] - $this->startY) / $this->rowGridInterval) * $this->numberOfColumns + ($rowData[1] - $this->startX) / $this->columnGridInterval);
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
