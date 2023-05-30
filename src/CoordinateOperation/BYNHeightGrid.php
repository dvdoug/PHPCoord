<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function assert;
use function in_array;
use function is_int;

class BYNHeightGrid extends GeographicGeoidHeightGrid
{
    use BiquadraticInterpolation;

    private string $shortFormatChar = 'v';
    private string $longFormatChar = 'V';
    private string $doubleFormatChar = 'e';
    private string $floatFormatChar = 'g';
    private int $dataSize;
    private float $conversionFactor;

    public function __construct(string $filename)
    {
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE;
        $this->gridFile = new GridFile($filename);

        $this->gridFile->fseek(0);
        $rawData = $this->gridFile->fread(80);
        if ($this->unpack('vByteOrder', $rawData, 50)['ByteOrder'] === 1) {
            $this->shortFormatChar = 'n';
            $this->longFormatChar = 'N';
            $this->doubleFormatChar = 'E';
            $this->floatFormatChar = 'G';
        }

        $data = $this->unpack("{$this->longFormatChar}SOUTH/{$this->longFormatChar}NORTH/{$this->longFormatChar}WEST/{$this->longFormatChar}EAST/{$this->shortFormatChar}DLAT/{$this->shortFormatChar}DLON/{$this->shortFormatChar}GLOBAL/{$this->shortFormatChar}TYPE/{$this->doubleFormatChar}FACTOR/{$this->shortFormatChar}SIZEOF/x4/{$this->shortFormatChar}DATA/{$this->shortFormatChar}SUBTYPE/{$this->shortFormatChar}DATUM/{$this->shortFormatChar}ELLIPSOID/{$this->shortFormatChar}BYTEORDER/{$this->shortFormatChar}SCALE/{$this->doubleFormatChar}WO/{$this->doubleFormatChar}GM/{$this->shortFormatChar}TIDESYSTEM/{$this->shortFormatChar}REFREALISATION/{$this->floatFormatChar}EPOCH/{$this->shortFormatChar}PTTYPE/x2", $rawData);

        foreach ($data as $key => $value) {
            if (in_array($key, ['SOUTH', 'EAST', 'NORTH', 'WEST']) && $value > 2147483647) {
                $data[$key] -= 4294967295;
            }
        }

        assert($data['DATA'] === 0); // actual values, not errors
        assert($data['TYPE'] === 1); // ellipsoid separation
        assert($data['SIZEOF'] === 2 || $data['SIZEOF'] === 4); // sensible data type

        $this->startX = (new ArcSecond($data['WEST']))->asDegrees()->getValue();
        $this->startY = (new ArcSecond($data['SOUTH']))->asDegrees()->getValue();
        $this->endX = (new ArcSecond($data['EAST']))->asDegrees()->getValue();
        $this->endY = (new ArcSecond($data['NORTH']))->asDegrees()->getValue();
        $this->columnGridInterval = (new ArcSecond($data['DLON']))->asDegrees()->getValue();
        $this->rowGridInterval = (new ArcSecond($data['DLAT']))->asDegrees()->getValue();
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;
        $this->dataSize = $data['SIZEOF'];
        $this->conversionFactor = $data['FACTOR'];
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

        $offset = 80 + $recordId * $this->dataSize;
        $this->gridFile->fseek($offset);
        $rawRow = $this->gridFile->fread($this->dataSize);
        $dataType = $this->dataSize === 2 ? $this->shortFormatChar : $this->longFormatChar;
        $shift = $this->unpack("{$dataType}shift", $rawRow)['shift'];
        assert(is_int($shift));
        if ($this->dataSize === 4 && $shift > 2147483647) {
            $shift -= 4294967295;
        } elseif ($this->dataSize === 2 && $shift > 32767) {
            $shift -= 65535;
        }
        $shift = $shift / $this->conversionFactor;

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$shift]
        );
    }
}
