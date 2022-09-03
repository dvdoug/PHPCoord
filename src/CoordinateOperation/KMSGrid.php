<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Length\Metre;
use SplFileObject;
use SplFixedArray;

use function assert;
use function explode;
use function intdiv;
use function preg_replace;
use function preg_split;
use function trim;
use function unpack;

/**
 * @see https://github.com/Kortforsyningen/kmsgrid/blob/master/kmsgrid.py for documentation
 */
class KMSGrid extends GeographicGeoidHeightGrid
{
    use BilinearInterpolation;

    private int $binaryHeaderLength = 64;
    private bool $isBinary;
    private string $integerFormatChar = 'V';
    private string $doubleFormatChar = 'e';
    private string $floatFormatChar = 'g';
    private SplFixedArray $textData;

    public function __construct($filename)
    {
        $this->gridFile = new SplFileObject($filename);
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE;

        $firstChar = $this->gridFile->fread(1);

        if ($firstChar === ' ') {
            $this->isBinary = false;

            $header = preg_split('/\s+/', trim($this->gridFile->fgets()));

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
                    $values = explode(' ', trim(preg_replace('/\s+/', ' ', $rawData)));
                    foreach ($values as $value) {
                        $this->textData[$index] = (float) $value;
                        ++$index;
                    }
                }
            }
        } else {
            $this->isBinary = true;

            $this->gridFile->fseek(0);
            $rawHeader = $this->gridFile->fread($this->binaryHeaderLength);
            $icode = unpack("{$this->integerFormatChar}ICODE", $rawHeader)['ICODE'];

            if ($icode !== 777) {
                $this->integerFormatChar = 'N';
                $this->doubleFormatChar = 'E';
                $this->floatFormatChar = 'G';
                $icode = unpack("{$this->integerFormatChar}ICODE", $rawHeader)['ICODE'];
            }

            assert($icode === 777);

            $header = unpack("{$this->integerFormatChar}ICODE/{$this->doubleFormatChar}BMIN/{$this->doubleFormatChar}BMAX/{$this->doubleFormatChar}LMIN/{$this->doubleFormatChar}LMAX/{$this->doubleFormatChar}DB/{$this->doubleFormatChar}DL/{$this->integerFormatChar}DATUM/{$this->integerFormatChar}CSTM/{$this->integerFormatChar}MODE", $rawHeader);
            $this->startX = $header['LMIN'];
            $this->startY = $header['BMIN'];
            $this->endX = $header['LMAX'];
            $this->endY = $header['BMAX'];
            $this->columnGridInterval = $header['DL'];
            $this->rowGridInterval = $header['DB'];
            $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
            $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;

            // there's a weird 16 records per block thing here, columns extend beyond declared boundaries
            $this->numberOfColumns = intdiv($this->numberOfColumns + 16 - 1, 16) * 16;
        }

        if ($this->startX > 180) { // normalise if necessary
            $this->startX -= 360;
        }
    }

    /**
     * @return Metre[]
     */
    public function getValues($x, $y): array
    {
        $shift = $this->interpolate($x, $y)[0];

        return [new Metre($shift)];
    }

    private function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordId = ($this->numberOfRows - $latitudeIndex - 1) * $this->numberOfColumns + $longitudeIndex;
        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        if ($this->isBinary) {
            $offset = $this->binaryHeaderLength + $recordId * 4;
            $this->gridFile->fseek($offset);
            $rawRow = $this->gridFile->fread(4);
            $data = unpack("{$this->floatFormatChar}shift", $rawRow);

            return new GridValues(
                $longitude,
                $latitude,
                [$data['shift']]
            );
        } else {
            return new GridValues(
                $longitude,
                $latitude,
                [$this->textData[$recordId]]
            );
        }
    }
}
