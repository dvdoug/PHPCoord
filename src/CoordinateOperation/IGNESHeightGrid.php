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

use function explode;
use function strlen;
use function trim;
use function assert;

class IGNESHeightGrid extends GeographicGeoidHeightGrid
{
    use BilinearInterpolation;

    /**
     * @var SplFixedArray<array<float>>
     */
    private SplFixedArray $data;

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);
        $this->init();
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
        $recordId = ($this->numberOfRows - $latitudeIndex - 1) * $this->numberOfColumns + $longitudeIndex;

        assert($this->data[$recordId] !== null);
        $record = $this->data[$recordId];

        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        return new GridValues($longitude, $latitude, $record);
    }

    private function init(): void
    {
        $headerRegexp = '^\s+(-?[\d.]+)\s+(-?[\d.]+)\s+(-?[\d.]+)\s+(-?[\d.]+)\s+([\d.]+)\s+([\d.]+)';
        $header = $this->gridFile->fgets();

        Preg::match('/' . $headerRegexp . '/', $header, $headerParts);

        $this->columnGridInterval = (float) $headerParts[4] / 60;
        $this->rowGridInterval = (float) $headerParts[3] / 60;
        $this->numberOfColumns = (int) $headerParts[6];
        $this->numberOfRows = (int) $headerParts[5];
        $this->startX = (float) $headerParts[2];
        if ($this->startX > 180) {
            $this->startX -= 360;
        }
        $this->endX = $this->startX + ($this->numberOfColumns - 1) * $this->columnGridInterval;
        $this->endY = (float) $headerParts[1];
        $this->startY = $this->endY - ($this->numberOfRows - 1) * $this->rowGridInterval;

        // these files are not 1 record per line so direct file access is not possible. Read into memory instead :/

        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);

        $rawData = $this->gridFile->fread($this->gridFile->getSize() - strlen($header));
        $values = explode(' ', trim(Preg::replace('/\s+/', ' ', $rawData)));

        $cursor = 0;
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            $rowData = [(float) $values[$cursor]];
            ++$cursor;

            $this->data[$i] = $rowData;
        }
    }
}
