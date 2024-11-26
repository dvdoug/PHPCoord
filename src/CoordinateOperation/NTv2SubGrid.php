<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Angle\ArcSecond;

class NTv2SubGrid extends Grid
{
    use BilinearInterpolation;

    private const RECORD_SIZE = 16;

    private int $offsetStart;
    private string $floatFormatChar;

    public function __construct(
        string $filename,
        int $offsetStart,
        float $minLatitude,
        float $maxLatitude,
        float $minLongitude,
        float $maxLongitude,
        float $latitudeInterval,
        float $longitudeInterval,
        string $floatFormatChar
    ) {
        $this->gridFile = new GridFile($filename);
        $this->offsetStart = $offsetStart;
        $this->startX = $minLongitude;
        $this->endX = $maxLongitude;
        $this->startY = $minLatitude;
        $this->endY = $maxLatitude;
        $this->columnGridInterval = $longitudeInterval;
        $this->rowGridInterval = $latitudeInterval;
        $this->floatFormatChar = $floatFormatChar;
        $this->numberOfColumns = (int) (($this->endX - $this->startX) / $this->columnGridInterval);
        $this->numberOfRows = (int) (($this->endY - $this->startY) / $this->rowGridInterval);
    }

    /**
     * @return ArcSecond[]
     */
    public function getValues(float $x, float $y): array
    {
        $shifts = $this->interpolate($x, $y);

        return [new ArcSecond($shifts[0]), new ArcSecond(-$shifts[1])]; // NTv2 is longitude positive *west*
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordIndex = $latitudeIndex * ($this->numberOfColumns + 1) + $longitudeIndex;
        $recordOffset = $this->offsetStart + ((11 + $recordIndex) * self::RECORD_SIZE);
        $this->gridFile->fseek($recordOffset);
        $rawRecord = $this->gridFile->fread(self::RECORD_SIZE);

        /** @var float[] $shifts */
        $shifts = $this->unpack("{$this->floatFormatChar}LATITUDE_SHIFT/{$this->floatFormatChar}LONGITUDE_SHIFT/{$this->floatFormatChar}LATITUDE_ACCURACY/{$this->floatFormatChar}LONGITUDE_ACCURACY", $rawRecord);

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$shifts['LATITUDE_SHIFT'], $shifts['LONGITUDE_SHIFT']]
        );
    }
}
