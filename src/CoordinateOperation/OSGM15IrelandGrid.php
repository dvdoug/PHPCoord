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

use function assert;
use function count;
use function explode;
use function strpos;
use function substr;
use function trim;

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

        $size = $this->gridFile->getSize();
        $contents = $size > 0 ? $this->gridFile->fread($size) : '';
        $splitAt = strpos($contents, "\n");
        $headerLine = $splitAt === false ? $contents : substr($contents, 0, $splitAt);
        $rest = $splitAt === false ? '' : substr($contents, $splitAt + 1);
        $header = Preg::split('/\s+/', trim($headerLine));

        $this->startX = (float) $header[2];
        $this->startY = (float) $header[0];
        $this->endX = (float) $header[3];
        $this->endY = (float) $header[1];
        $this->columnGridInterval = (float) $header[5];
        $this->rowGridInterval = (float) $header[4];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;

        $normalized = trim(Preg::replace('/\s+/', ' ', $rest));
        $values = $normalized === '' ? [] : explode(' ', $normalized);
        $valueCount = count($values);
        /** @var SplFixedArray<float> $textData */
        $textData = new SplFixedArray($valueCount);
        for ($i = 0; $i < $valueCount; ++$i) {
            $textData[$i] = (float) $values[$i];
        }
        $this->textData = $textData;
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
