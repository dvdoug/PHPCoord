<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function abs;
use function array_map;
use function array_slice;
use function assert;
use function count;
use function explode;
use function max;
use function min;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;
use function preg_match;
use function preg_replace;
use SplFileObject;
use SplFixedArray;
use function str_repeat;
use function str_replace;
use function strlen;
use function trim;

class IGNFGeocentricTranslationGrid extends SplFileObject
{
    use BilinearInterpolation;

    private const ITERATION_CONVERGENCE = 0.0001;

    private const STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE = 1;

    private const STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE = 2;

    private const STORAGE_ORDER_DECREASING_LATITUDE_INCREASING_LONGITUDE = 3;

    private const STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE = 4;

    private int $headerRows;

    private bool $coordinatesIncludedInData;

    private int $valuesPerCoordinate;

    private bool $precisionCodeIncluded;

    private int $storageOrder;

    private SplFixedArray $data;

    public function __construct($filename)
    {
        parent::__construct($filename);

        match ($this->getExtension()) {
            'txt' => $this->initTxt(),
            'mnt' => $this->initMnt(),
        };
    }

    public function applyForwardAdjustment(GeographicPoint $point, Geographic $to): GeographicPoint
    {
        [$tx, $ty, $tz] = $this->getAdjustment($point->getLatitude()->asDegrees(), $point->getLongitude()->asDegrees());

        return $point->geocentricTranslation(
            $to,
            $tx,
            $ty,
            $tz,
        );
    }

    public function applyReverseAdjustment(GeographicPoint $point, Geographic $to): GeographicPoint
    {
        $adjustment = [new Metre(0), new Metre(0), new Metre(0)];
        $latitude = $point->getLatitude();
        $longitude = $point->getLongitude();

        do {
            $prevAdjustment = $adjustment;
            $adjustment = $this->getAdjustment($latitude->asDegrees(), $longitude->asDegrees());
            $newPoint = $point->geocentricTranslation(
                $to,
                $adjustment[0]->multiply(-1),
                $adjustment[1]->multiply(-1),
                $adjustment[2]->multiply(-1),
            );

            $latitude = $newPoint->getLatitude();
            $longitude = $newPoint->getLongitude();
        } while (abs($adjustment[0]->subtract($prevAdjustment[0])->getValue()) > self::ITERATION_CONVERGENCE && abs($adjustment[1]->subtract($prevAdjustment[1])->getValue()) > self::ITERATION_CONVERGENCE && abs($adjustment[2]->subtract($prevAdjustment[2])->getValue()) > self::ITERATION_CONVERGENCE);

        return $newPoint;
    }

    /**
     * @return Metre[]
     */
    private function getAdjustment(Degree $latitude, Degree $longitude): array
    {
        $offsets = $this->interpolateBilinear($longitude->getValue(), $latitude->getValue());

        return [new Metre($offsets[0]), new Metre($offsets[1]), new Metre($offsets[2])];
    }

    private function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $record = match ($this->storageOrder) {
            self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE => $this->data[($longitudeIndex * ($this->numberOfRows + 1) + $latitudeIndex)],
        };

        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        return new GridValues($longitude, $latitude, $record);
    }

    private function initTxt(): void
    {
        $this->headerRows = 4;
        $this->valuesPerCoordinate = 3;

        $header0 = $this->fgets();
        $header1 = $this->fgets();
        $header2 = $this->fgets();
        $header3 = $this->fgets();

        $interpolationMethod = trim(str_replace('GR3D2', '', $header2));
        assert($interpolationMethod === 'INTERPOLATION BILINEAIRE');

        $gridDimensions = explode(' ', trim(preg_replace('/ +/', ' ', str_replace('GR3D1', '', $header1))));
        $this->startX = (float) $gridDimensions[0];
        $this->endX = (float) $gridDimensions[1];
        $this->startY = (float) $gridDimensions[2];
        $this->endY = (float) $gridDimensions[3];
        $this->columnGridInterval = (float) $gridDimensions[4];
        $this->rowGridInterval = (float) $gridDimensions[5];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval);
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval);
        $this->storageOrder = self::STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE;

        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            $rowData = explode(' ', trim(preg_replace('/ +/', ' ', $this->fgets())));
            $wantedData = array_slice($rowData, 3, 3); // ignore weird first fixed value, coordinates, precision and map sheet
            $wantedData = array_map(static function (string $value) {return (float) ($value); }, $wantedData);
            $this->data[$i] = $wantedData;
        }
    }

    private function initMnt(): void
    {
        $this->headerRows = 1;
        $fixedHeaderRegexp = '^(-?[\d.]+) (-?[\d.]+) (-?[\d.]+) (-?[\d.]+) ([\d.]+) ([\d.]+) ([1-4]) ([01]) (\d) ([01]) ';
        $header = $this->fgets();

        preg_match('/' . $fixedHeaderRegexp . '/', $header, $fixedHeaderParts);

        $this->startX = min((float) $fixedHeaderParts[1], (float) $fixedHeaderParts[2]);
        $this->endX = max((float) $fixedHeaderParts[1], (float) $fixedHeaderParts[2]);
        $this->startY = min((float) $fixedHeaderParts[3], (float) $fixedHeaderParts[4]);
        $this->endY = max((float) $fixedHeaderParts[3], (float) $fixedHeaderParts[4]);
        $this->columnGridInterval = (float) $fixedHeaderParts[5];
        $this->rowGridInterval = (float) $fixedHeaderParts[6];
        $this->numberOfColumns = (int) (string) (($this->endX - $this->startX) / $this->columnGridInterval);
        $this->numberOfRows = (int) (string) (($this->endY - $this->startY) / $this->rowGridInterval);
        $this->storageOrder = (int) $fixedHeaderParts[7];
        $this->coordinatesIncludedInData = (bool) $fixedHeaderParts[8];
        $this->valuesPerCoordinate = (int) $fixedHeaderParts[9];
        $this->precisionCodeIncluded = (bool) $fixedHeaderParts[10];

        preg_match('/' . $fixedHeaderRegexp . str_repeat('(-?[\d.]+) ', $this->valuesPerCoordinate) . '(.*)$/', $header, $fullHeaderParts);

        $baseAdjustments = array_slice($fullHeaderParts, count($fullHeaderParts) - $this->valuesPerCoordinate - 1, $this->valuesPerCoordinate);
        foreach ($baseAdjustments as $baseAdjustment) {
            assert((float) $baseAdjustment === 0.0);
        }

        // these files are not always 1 record per line (sometimes blank lines, sometimes multiple records per row)
        // so direct file access is not possible. Read into memory instead :/

        $this->data = new SplFixedArray($this->numberOfColumns * $this->numberOfRows);

        $rawData = $this->fread($this->getSize() - strlen($header));
        $values = explode(' ', trim(preg_replace('/\s+/', ' ', $rawData)));

        $cursor = 0;
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            if ($this->coordinatesIncludedInData) {
                $cursor += 2;
            }

            $rowData = [];
            for ($j = 0; $j < $this->valuesPerCoordinate; ++$j) {
                $rowData[] = (float) $values[$cursor];
                ++$cursor;
            }

            $this->data[$i] = $rowData;

            if ($this->precisionCodeIncluded) {
                ++$cursor;
            }
        }
    }
}
