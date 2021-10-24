<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function array_map;
use function array_slice;
use function assert;
use function count;
use function explode;
use function max;
use function min;
use function preg_match;
use function preg_replace;
use SplFileObject;
use SplFixedArray;
use function str_repeat;
use function str_replace;
use function strlen;
use function trim;

trait IGNFGrid
{
    use BilinearInterpolation;

    private int $valuesPerCoordinate;

    private SplFixedArray $data;

    public function __construct($filename)
    {
        $this->gridFile = new SplFileObject($filename);

        match ($this->gridFile->getExtension()) {
            'txt' => $this->initTxt(),
            'mnt', 'tac' => $this->initMntOrTac(),
        };
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordId = match ($this->storageOrder) {
            self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE => ($longitudeIndex * ($this->numberOfRows) + $latitudeIndex),
            self::STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE => ($this->numberOfRows - $latitudeIndex - 1) * $this->numberOfColumns + $longitudeIndex,
        };

        $record = $this->data[$recordId];

        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        return new GridValues($longitude, $latitude, $record);
    }

    private function initTxt(): void
    {
        $this->valuesPerCoordinate = 3;

        $header0 = $this->gridFile->fgets();
        $header1 = $this->gridFile->fgets();
        $header2 = $this->gridFile->fgets();
        $header3 = $this->gridFile->fgets();

        $interpolationMethod = trim(str_replace('GR3D2', '', $header2));
        assert($interpolationMethod === 'INTERPOLATION BILINEAIRE');

        $gridDimensions = explode(' ', trim(preg_replace('/ +/', ' ', str_replace('GR3D1', '', $header1))));
        $this->startX = (float) $gridDimensions[0];
        $this->endX = (float) $gridDimensions[1];
        $this->startY = (float) $gridDimensions[2];
        $this->endY = (float) $gridDimensions[3];
        $this->columnGridInterval = (float) $gridDimensions[4];
        $this->rowGridInterval = (float) $gridDimensions[5];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE;

        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            $rowData = explode(' ', trim(preg_replace('/ +/', ' ', $this->gridFile->fgets())));
            $wantedData = array_slice($rowData, 3, 3); // ignore weird first fixed value, coordinates, precision and map sheet
            $wantedData = array_map(static fn (string $value) => (float) ($value), $wantedData);
            $this->data[$i] = $wantedData;
        }

        $this->gridFile->fgets();
        assert($this->gridFile->eof());
    }

    private function initMntOrTac(): void
    {
        $fixedHeaderRegexp = '^(-?[\d.]+) (-?[\d.]+) (-?[\d.]+) (-?[\d.]+) ([\d.]+) ([\d.]+) ([1-4]) ([01]) (\d) ([01]) ';
        $header = $this->gridFile->fgets();

        preg_match('/' . $fixedHeaderRegexp . '/', $header, $fixedHeaderParts);

        $this->startX = min((float) $fixedHeaderParts[1], (float) $fixedHeaderParts[2]);
        $this->endX = max((float) $fixedHeaderParts[1], (float) $fixedHeaderParts[2]);
        $this->startY = min((float) $fixedHeaderParts[3], (float) $fixedHeaderParts[4]);
        $this->endY = max((float) $fixedHeaderParts[3], (float) $fixedHeaderParts[4]);
        $this->columnGridInterval = (float) $fixedHeaderParts[5];
        $this->rowGridInterval = (float) $fixedHeaderParts[6];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval) + 1;
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval) + 1;
        $this->storageOrder = (int) $fixedHeaderParts[7];
        $coordinatesIncludedInData = (bool) $fixedHeaderParts[8];
        $this->valuesPerCoordinate = (int) $fixedHeaderParts[9];
        $precisionIncluded = (bool) $fixedHeaderParts[10];

        preg_match('/' . $fixedHeaderRegexp . str_repeat('(-?[\d.]+) ', $this->valuesPerCoordinate) . '(.*)$/', $header, $fullHeaderParts);

        $baseAdjustments = array_slice($fullHeaderParts, count($fullHeaderParts) - $this->valuesPerCoordinate - 1, $this->valuesPerCoordinate);
        foreach ($baseAdjustments as $baseAdjustment) {
            assert((float) $baseAdjustment === 0.0);
        }

        // these files are not always 1 record per line (sometimes blank lines, sometimes multiple records per row)
        // so direct file access is not possible. Read into memory instead :/

        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);

        $rawData = $this->gridFile->fread($this->gridFile->getSize() - strlen($header));
        $values = explode(' ', trim(preg_replace('/\s+/', ' ', $rawData)));

        $cursor = 0;
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            if ($coordinatesIncludedInData) {
                $cursor += 2;
            }

            $rowData = [];
            for ($j = 0; $j < $this->valuesPerCoordinate; ++$j) {
                $rowData[] = (float) $values[$cursor];
                ++$cursor;
            }

            $this->data[$i] = $rowData;

            if ($precisionIncluded) {
                ++$cursor;
            }
        }

        $this->gridFile->fgets();
        assert($this->gridFile->eof());
    }
}
