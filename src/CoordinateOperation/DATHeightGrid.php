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

use function round;
use function trim;

use const PHP_INT_MAX;

class DATHeightGrid extends GeographicGeoidHeightGrid
{
    use BilinearInterpolation;

    public function __construct(string $filename)
    {
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE;
        $this->gridFile = new GridFile($filename);

        // these files have no headers...
        $firstLineData = Preg::split('/\s+/', trim($this->gridFile->fgets()));
        $secondLineData = Preg::split('/\s+/', trim($this->gridFile->fgets()));

        $this->gridFile->seek(PHP_INT_MAX);
        $numberOfValues = $this->gridFile->key();
        $this->gridFile->seek($numberOfValues - 1);
        $lastLineData = Preg::split('/\s+/', trim($this->gridFile->fgets()));

        $this->startX = (float) $firstLineData[1];
        $this->startY = (float) $firstLineData[0];
        $this->endX = (float) $lastLineData[1];
        $this->endY = (float) $lastLineData[0];
        $this->columnGridInterval = (float) $secondLineData[1] - (float) $firstLineData[1];
        $this->numberOfColumns = (int) round(($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = $numberOfValues / $this->numberOfColumns;
        $this->rowGridInterval = ((float) $lastLineData[0] - (float) $firstLineData[0]) / ($this->numberOfRows - 1);
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

        $this->gridFile->seek($recordId);
        $record = (float) Preg::split('/\s+/', trim($this->gridFile->fgets()))[2];

        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        return new GridValues($longitude, $latitude, [$record]);
    }
}
