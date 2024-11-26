<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Angle\ArcSecond;

use function assert;
use function round;
use function usort;

class NTv2Grid extends GeographicGrid
{
    private const RECORD_SIZE = 16;
    private const FLAG_WITHIN_LIMITS = 1;
    private const FLAG_ON_UPPER_LATITUDE = 2;
    private const FLAG_ON_UPPER_LONGITUDE = 3;
    private const FLAG_ON_UPPER_LATITUDE_AND_LONGITUDE = 4;

    private string $integerFormatChar = 'V';
    private string $doubleFormatChar = 'e';
    private string $floatFormatChar = 'g';

    /**
     * @var array<string, array{offsetStart: int, S_LAT: float, N_LAT: float, E_LONG: float, W_LONG: float, LONG_INC: float, LAT_INC: float}>
     */
    private array $subFileMetaData = [];

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE;

        $this->readHeader();
    }

    /**
     * @return ArcSecond[]
     */
    public function getValues(float $x, float $y): array
    {
        // NTv2 is longitude positive *west*
        $x *= -1;

        // NTv2 is in seconds, not degrees
        $x *= 3600;
        $y *= 3600;

        $gridToUse = $this->determineBestGrid($x, $y);

        return $gridToUse->getValues($x, $y);
    }

    private function readHeader(): void
    {
        $this->gridFile->fseek(0);
        $rawData = $this->gridFile->fread(11 * self::RECORD_SIZE);
        if ($this->unpack('VNUM_OREC', $rawData, 8)['NUM_OREC'] !== 11) {
            $this->integerFormatChar = 'N';
            $this->doubleFormatChar = 'E';
            $this->floatFormatChar = 'G';
        }

        /** @var array{NUM_OREC: int, NUM_SREC: int, NUM_FILE: int, GS_TYPE: string} $data */
        $data = $this->unpack("A8/{$this->integerFormatChar}NUM_OREC/x4/A8/{$this->integerFormatChar}NUM_SREC/x4/A8/{$this->integerFormatChar}NUM_FILE/x4/A8/A8GS_TYPE/A8/A8VERSION/A8/A8SYSTEM_F/A8/A8SYSTEM_T/A8/{$this->doubleFormatChar}MAJOR_F/A8/{$this->doubleFormatChar}MINOR_F/A8/{$this->doubleFormatChar}MAJOR_T/A8/{$this->doubleFormatChar}MINOR_T", $rawData);

        assert($data['GS_TYPE'] === 'SECONDS');

        $subFileStart = 11 * self::RECORD_SIZE;
        for ($i = 0; $i < $data['NUM_FILE']; ++$i) {
            $this->gridFile->fseek($subFileStart);
            $subFileRawData = $this->gridFile->fread(11 * self::RECORD_SIZE);
            /** @var array{SUB_NAME: string, S_LAT: float, N_LAT: float, E_LONG: float, W_LONG: float, LONG_INC: float, LAT_INC: float, GS_COUNT: int} $subFileData */
            $subFileData = $this->unpack("A8/A8SUB_NAME/A8/A8PARENT/A8/A8CREATED/A8/A8UPDATED/A8/{$this->doubleFormatChar}S_LAT/A8/{$this->doubleFormatChar}N_LAT/A8/{$this->doubleFormatChar}E_LONG/A8/{$this->doubleFormatChar}W_LONG/A8/{$this->doubleFormatChar}LAT_INC/A8/{$this->doubleFormatChar}LONG_INC/A8/{$this->integerFormatChar}GS_COUNT/x4", $subFileRawData);
            $subFileData['offsetStart'] = $subFileStart;

            // apply rounding to eliminate fp issues when being deserialized
            $subFileData['S_LAT'] = round($subFileData['S_LAT'], 5);
            $subFileData['N_LAT'] = round($subFileData['N_LAT'], 5);
            $subFileData['E_LONG'] = round($subFileData['E_LONG'], 5);
            $subFileData['W_LONG'] = round($subFileData['W_LONG'], 5);
            $this->subFileMetaData[$subFileData['SUB_NAME']] = $subFileData;

            $subFileStart += 11 * self::RECORD_SIZE + $subFileData['GS_COUNT'] * self::RECORD_SIZE;
        }
    }

    private function determineBestGrid(float $longitude, float $latitude): NTv2SubGrid
    {
        $possibleGrids = [];
        foreach ($this->subFileMetaData as $subFileMetaDatum) {
            if ($latitude === $subFileMetaDatum['N_LAT'] && $longitude === $subFileMetaDatum['W_LONG']) {
                $possibleGrids[] = [self::FLAG_ON_UPPER_LATITUDE_AND_LONGITUDE, $subFileMetaDatum];
            } elseif ($longitude === $subFileMetaDatum['W_LONG']) {
                $possibleGrids[] = [self::FLAG_ON_UPPER_LONGITUDE, $subFileMetaDatum];
            } elseif ($latitude === $subFileMetaDatum['N_LAT']) {
                $possibleGrids[] = [self::FLAG_ON_UPPER_LATITUDE, $subFileMetaDatum];
            } elseif ($latitude >= $subFileMetaDatum['S_LAT'] && $latitude <= $subFileMetaDatum['N_LAT'] && $longitude >= $subFileMetaDatum['E_LONG'] && $longitude <= $subFileMetaDatum['W_LONG']) {
                $possibleGrids[] = [self::FLAG_WITHIN_LIMITS, $subFileMetaDatum];
            }
        }

        usort($possibleGrids, static fn ($a, $b) => $a[0] <=> $b[0] ?: $a[1]['LAT_INC'] <=> $b[1]['LAT_INC'] ?: $a[1]['LONG_INC'] <=> $b[1]['LONG_INC']);

        $gridToUse = $possibleGrids[0][1];

        return new NTv2SubGrid(
            $this->gridFile->getPathname(),
            $gridToUse['offsetStart'],
            $gridToUse['S_LAT'],
            $gridToUse['N_LAT'],
            $gridToUse['E_LONG'],
            $gridToUse['W_LONG'],
            $gridToUse['LAT_INC'],
            $gridToUse['LONG_INC'],
            $this->floatFormatChar
        );
    }
}
