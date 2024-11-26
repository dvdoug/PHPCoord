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
use function trim;
use function assert;

class OSGM15IrelandGrid extends GeographicGeoidHeightGrid
{
    use BilinearInterpolation;

    /**
     * @var SplFixedArray<float>
     */
    private SplFixedArray $textData;

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE;

        $header = Preg::split('/\s+/', trim($this->gridFile->fgets()));

        $this->startX = (float) $header[2];
        $this->startY = (float) $header[0];
        $this->endX = (float) $header[3];
        $this->endY = (float) $header[1];
        $this->columnGridInterval = (float) $header[5];
        $this->rowGridInterval = (float) $header[4];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;

        $this->textData = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);
        $index = 0;
        while (!$this->gridFile->eof()) {
            $rawData = trim($this->gridFile->fgets());
            if ($rawData) {
                $values = explode(' ', trim(Preg::replace('/\s+/', ' ', $rawData)));
                foreach ($values as $value) {
                    $this->textData[$index] = (float) $value;
                    ++$index;
                }
            }
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

    private function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordId = ($this->numberOfRows - $latitudeIndex - 1) * $this->numberOfColumns + $longitudeIndex;
        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        assert($this->textData[$recordId] !== null);

        return new GridValues(
            $longitude,
            $latitude,
            [$this->textData[$recordId]]
        );
    }
}
