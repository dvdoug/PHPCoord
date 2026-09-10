<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Length\Millimetre;

class NTv2VelSubGrid extends Grid
{
    use BilinearInterpolation;

    private const RECORD_SIZE = 24;

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
     * East, north, up velocities in millimetres per year.
     * @return Millimetre[]
     */
    public function getValues(float $x, float $y): array
    {
        $velocities = $this->interpolate($x, $y);

        return [new Millimetre($velocities[0]), new Millimetre($velocities[1]), new Millimetre($velocities[2])];
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordIndex = $latitudeIndex * ($this->numberOfColumns + 1) + $longitudeIndex;
        $recordOffset = $this->offsetStart + ((11 + $recordIndex) * self::RECORD_SIZE);
        $this->gridFile->fseek($recordOffset);
        $rawRecord = $this->gridFile->fread(self::RECORD_SIZE);

        /** @var array{EAST: float, NORTH: float, UP: float} $velocities */
        $velocities = $this->unpack("{$this->floatFormatChar}EAST/{$this->floatFormatChar}NORTH/{$this->floatFormatChar}UP/{$this->floatFormatChar}EAST_ACC/{$this->floatFormatChar}NORTH_ACC/{$this->floatFormatChar}UP_ACC", $rawRecord);

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$velocities['EAST'], $velocities['NORTH'], $velocities['UP']]
        );
    }
}
