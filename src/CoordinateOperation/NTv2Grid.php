<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use InvalidArgumentException;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use SplFileObject;

use function abs;
use function assert;
use function round;
use function unpack;
use function usort;

class NTv2Grid extends SplFileObject
{
    private const RECORD_SIZE = 16;
    private const ITERATION_CONVERGENCE = 0.0001;
    private const FLAG_WITHIN_LIMITS = 1;
    private const FLAG_ON_UPPER_LATITUDE = 2;
    private const FLAG_ON_UPPER_LONGITUDE = 3;
    private const FLAG_ON_UPPER_LATITUDE_AND_LONGITUDE = 4;

    private string $integerFormatChar = 'V';
    private string $doubleFormatChar = 'e';
    private string $floatFormatChar = 'g';

    private array $subFileMetaData = [];

    private int $numberOfOverviewHeaderRecords;
    private int $numberOfSubFileHeaderRecords;
    private int $numberOfGridShiftSubFiles;

    private float $lowerLatitudeLimit;
    private float $upperLatitudeLimit;
    private float $lowerLongitudeLimit;
    private float $upperLongitudeLimit;
    private float $latitudeGridInterval;
    private float $longitudeGridInterval;
    private string $gridShiftDataType;
    private string $systemFrom;
    private string $systemTo;
    private float $semiMinorAxisFrom;
    private float $semiMinorAxisTo;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $this->readHeader();
    }

    public function applyForwardAdjustment(GeographicPoint $point, Geographic $to): GeographicPoint
    {
        $adjustment = $this->getAdjustment($point->getLatitude(), $point->getLongitude());

        $latitude = $point->getLatitude()->add($adjustment[0]);
        $longitude = $point->getLongitude()->add($adjustment[1]);

        return GeographicPoint::create($latitude, $longitude, $point->getHeight(), $to, $point->getCoordinateEpoch());
    }

    public function applyReverseAdjustment(GeographicPoint $point, Geographic $to): GeographicPoint
    {
        $adjustment = [new ArcSecond(0), new ArcSecond(0)];
        $latitude = $point->getLatitude();
        $longitude = $point->getLongitude();

        do {
            $prevAdjustment = $adjustment;
            $adjustment = $this->getAdjustment($latitude, $longitude);
            $latitude = $point->getLatitude()->subtract($adjustment[0]);
            $longitude = $point->getLongitude()->subtract($adjustment[1]);
        } while (abs($adjustment[0]->subtract($prevAdjustment[0])->getValue()) > self::ITERATION_CONVERGENCE && abs($adjustment[1]->subtract($prevAdjustment[1])->getValue()) > self::ITERATION_CONVERGENCE);

        return GeographicPoint::create($latitude, $longitude, $point->getHeight(), $to, $point->getCoordinateEpoch());
    }

    /**
     * @return ArcSecond[]
     */
    private function getAdjustment(Angle $latitude, Angle $longitude): array
    {
        // NTv2 is longitude positive *west*
        $longitude = $longitude->multiply(-1);

        $latitudeAsSeconds = Angle::convert($latitude, Angle::EPSG_ARC_SECOND)->getValue();
        $longitudeAsSeconds = Angle::convert($longitude, Angle::EPSG_ARC_SECOND)->getValue();
        [$flag, $gridToUse] = $this->determineBestGrid($latitudeAsSeconds, $longitudeAsSeconds);

        $rowIndex = (int) (($latitudeAsSeconds - $gridToUse['S_LAT']) / $gridToUse['LAT_INC']);
        $columnIndex = (int) (($longitudeAsSeconds - $gridToUse['E_LONG']) / $gridToUse['LONG_INC']);
        $gridPointsPerRow = (int) (($gridToUse['W_LONG'] - $gridToUse['E_LONG']) / $gridToUse['LONG_INC']) + 1;
        $gridPointsPerColumn = (int) (($gridToUse['N_LAT'] - $gridToUse['S_LAT']) / $gridToUse['LAT_INC']) + 1;
        $numberOfRecords = $gridPointsPerRow * $gridPointsPerColumn;
        assert($numberOfRecords === $gridToUse['GS_COUNT']);

        if ($flag === self::FLAG_WITHIN_LIMITS) {
            $recordIndexLR = $rowIndex * $gridPointsPerRow + $columnIndex;
            $recordIndexLL = $recordIndexLR + 1;
            $recordIndexUR = $recordIndexLR + $gridPointsPerRow;
            $recordIndexUL = $recordIndexUR + 1;
        } elseif ($flag === self::FLAG_ON_UPPER_LATITUDE) {
            $recordIndexLR = $rowIndex * $gridPointsPerRow + $columnIndex;
            $recordIndexLL = $recordIndexLR + 1;
            $recordIndexUR = $recordIndexLR;
            $recordIndexUL = $recordIndexUR;
        } elseif ($flag === self::FLAG_ON_UPPER_LONGITUDE) {
            $recordIndexLR = $rowIndex * $gridPointsPerRow + $columnIndex;
            $recordIndexUR = $recordIndexLR + $gridPointsPerRow;
            $recordIndexLL = $recordIndexLR;
            $recordIndexUL = $recordIndexUR;
        } elseif ($flag === self::FLAG_ON_UPPER_LATITUDE_AND_LONGITUDE) {
            $recordIndexLR = $rowIndex * $gridPointsPerRow + $columnIndex;
            $recordIndexLL = $recordIndexLR;
            $recordIndexUR = $recordIndexLR;
            $recordIndexUL = $recordIndexUR;
        }

        $latitudeR = $gridToUse['S_LAT'] + $rowIndex * $gridToUse['LAT_INC'];
        $longitudeL = $gridToUse['E_LONG'] + $columnIndex * $gridToUse['LONG_INC'];

        $recordLR = $this->getRecord($gridToUse['offsetStart'] + (11 + $recordIndexLR) * self::RECORD_SIZE);
        $recordLL = $this->getRecord($gridToUse['offsetStart'] + (11 + $recordIndexLL) * self::RECORD_SIZE);
        $recordUR = $this->getRecord($gridToUse['offsetStart'] + (11 + $recordIndexUR) * self::RECORD_SIZE);
        $recordUL = $this->getRecord($gridToUse['offsetStart'] + (11 + $recordIndexUL) * self::RECORD_SIZE);

        $x = ($latitudeAsSeconds - $latitudeR) / $gridToUse['LAT_INC'];
        $y = ($longitudeAsSeconds - $longitudeL) / $gridToUse['LONG_INC'];
        assert($x >= 0 && $x <= 1);
        assert($y >= 0 && $y <= 1);

        $eShiftLatitude = $recordLR['LATITUDE_SHIFT'] + ($recordLL['LATITUDE_SHIFT'] - $recordLR['LATITUDE_SHIFT']) * $y;
        $fShiftLatitude = $recordUR['LATITUDE_SHIFT'] + ($recordUL['LATITUDE_SHIFT'] - $recordUR['LATITUDE_SHIFT']) * $y;
        $pShiftLatitude = $eShiftLatitude + ($fShiftLatitude - $eShiftLatitude) * $x;

        $eShiftLongitude = $recordLR['LONGITUDE_SHIFT'] + ($recordLL['LONGITUDE_SHIFT'] - $recordLR['LONGITUDE_SHIFT']) * $y;
        $fShiftLongitude = $recordUR['LONGITUDE_SHIFT'] + ($recordUL['LONGITUDE_SHIFT'] - $recordUR['LONGITUDE_SHIFT']) * $y;
        $pShiftLongitude = $eShiftLongitude + ($fShiftLongitude - $eShiftLongitude) * $x;

        return [new ArcSecond($pShiftLatitude), new ArcSecond(-$pShiftLongitude)]; // NTv2 is longitude positive *west*
    }

    private function getRecord(int $recordIndex): array
    {
        $this->fseek($recordIndex);
        $rawRecord = $this->fread(self::RECORD_SIZE);
        $shifts = unpack("{$this->floatFormatChar}LATITUDE_SHIFT/{$this->floatFormatChar}LONGITUDE_SHIFT/{$this->floatFormatChar}LATITUDE_ACCURACY/{$this->floatFormatChar}LONGITUDE_ACCURACY", $rawRecord);

        return $shifts;
    }

    private function readHeader(): void
    {
        $this->fseek(0);
        $rawData = $this->fread(11 * self::RECORD_SIZE);
        if (unpack('VNUM_OREC', $rawData, 8)['NUM_OREC'] !== 11) {
            $this->integerFormatChar = 'N';
            $this->doubleFormatChar = 'E';
            $this->floatFormatChar = 'G';
        }

        $data = unpack("A8/{$this->integerFormatChar}NUM_OREC/x4/A8/{$this->integerFormatChar}NUM_SREC/x4/A8/{$this->integerFormatChar}NUM_FILE/x4/A8/A8GS_TYPE/A8/A8VERSION/A8/A8SYSTEM_F/A8/A8SYSTEM_T/A8/{$this->doubleFormatChar}MAJOR_F/A8/{$this->doubleFormatChar}MINOR_F/A8/{$this->doubleFormatChar}MAJOR_T/A8/{$this->doubleFormatChar}MINOR_T", $rawData);

        assert($data['GS_TYPE'] === 'SECONDS');

        $subFileStart = 11 * self::RECORD_SIZE;
        for ($i = 0; $i < $data['NUM_FILE']; ++$i) {
            $this->fseek($subFileStart);
            $subFileRawData = $this->fread(11 * self::RECORD_SIZE);
            $subFileData = unpack("A8/A8SUB_NAME/A8/A8PARENT/A8/A8CREATED/A8/A8UPDATED/A8/{$this->doubleFormatChar}S_LAT/A8/{$this->doubleFormatChar}N_LAT/A8/{$this->doubleFormatChar}E_LONG/A8/{$this->doubleFormatChar}W_LONG/A8/{$this->doubleFormatChar}LAT_INC/A8/{$this->doubleFormatChar}LONG_INC/A8/{$this->integerFormatChar}GS_COUNT/x4", $subFileRawData);
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

    private function determineBestGrid(float $latitude, float $longitude): array
    {
        $possibleGrids = [];
        foreach ($this->subFileMetaData as $subFileName => $subFileMetaDatum) {
            if ($latitude >= $subFileMetaDatum['S_LAT'] && $latitude <= $subFileMetaDatum['N_LAT'] && $longitude >= $subFileMetaDatum['E_LONG'] && $longitude <= $subFileMetaDatum['W_LONG']) {
                if ($latitude === $subFileMetaDatum['N_LAT'] && $longitude === $subFileMetaDatum['W_LONG']) {
                    $possibleGrids[] = [self::FLAG_ON_UPPER_LATITUDE_AND_LONGITUDE, $subFileMetaDatum];
                } elseif ($longitude === $subFileMetaDatum['W_LONG']) {
                    $possibleGrids[] = [self::FLAG_ON_UPPER_LONGITUDE, $subFileMetaDatum];
                } elseif ($latitude === $subFileMetaDatum['N_LAT']) {
                    $possibleGrids[] = [self::FLAG_ON_UPPER_LATITUDE, $subFileMetaDatum];
                } else {
                    $possibleGrids[] = [self::FLAG_WITHIN_LIMITS, $subFileMetaDatum];
                }
            }
        }

        if (!$possibleGrids) {
            throw new InvalidArgumentException('Specified coordinates are not within this grid file');
        }

        usort($possibleGrids, static function ($a, $b) {
            return $a[0] <=> $b[0] ?: $a[1]['LAT_INC'] <=> $b[1]['LAT_INC'] ?: $a[2]['LONG_INC'] <=> $b[2]['LONG_INC'];
        });

        return $possibleGrids[0];
    }
}
