<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function abs;
use function assert;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use function round;
use SplFileObject;
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
        $gridToUse = $this->determineBestGrid($latitudeAsSeconds, $longitudeAsSeconds);

        $offsets = $gridToUse->interpolateBilinear($longitudeAsSeconds, $latitudeAsSeconds);

        return [new ArcSecond($offsets[0]), new ArcSecond(-$offsets[1])]; // NTv2 is longitude positive *west*
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

            //apply rounding to eliminate fp issues when being deserialized
            $subFileData['S_LAT'] = round($subFileData['S_LAT'], 5);
            $subFileData['N_LAT'] = round($subFileData['N_LAT'], 5);
            $subFileData['E_LONG'] = round($subFileData['E_LONG'], 5);
            $subFileData['W_LONG'] = round($subFileData['W_LONG'], 5);
            $this->subFileMetaData[$subFileData['SUB_NAME']] = $subFileData;

            $subFileStart += 11 * self::RECORD_SIZE + $subFileData['GS_COUNT'] * self::RECORD_SIZE;
        }
    }

    private function determineBestGrid(float $latitude, float $longitude): NTv2SubGrid
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

        usort($possibleGrids, static function ($a, $b) {
            return $a[0] <=> $b[0] ?: $a[1]['LAT_INC'] <=> $b[1]['LAT_INC'] ?: $a[2]['LONG_INC'] <=> $b[2]['LONG_INC'];
        });

        $gridToUse = $possibleGrids[0][1];

        return new NTv2SubGrid(
            $this->getPathname(),
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
