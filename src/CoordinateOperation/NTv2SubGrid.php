<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use SplFileObject;
use function unpack;

class NTv2SubGrid extends SplFileObject
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
        parent::__construct($filename);
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

    public function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordIndex = $latitudeIndex * ($this->numberOfColumns + 1) + $longitudeIndex;
        $recordOffset = $this->offsetStart + ((11 + $recordIndex) * self::RECORD_SIZE);
        $this->fseek($recordOffset);
        $rawRecord = $this->fread(self::RECORD_SIZE);
        $shifts = unpack("{$this->floatFormatChar}LATITUDE_SHIFT/{$this->floatFormatChar}LONGITUDE_SHIFT/{$this->floatFormatChar}LATITUDE_ACCURACY/{$this->floatFormatChar}LONGITUDE_ACCURACY", $rawRecord);

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$shifts['LATITUDE_SHIFT'], $shifts['LONGITUDE_SHIFT']]
        );
    }
}
