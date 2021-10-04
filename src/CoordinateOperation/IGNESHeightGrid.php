<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function explode;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;
use function preg_match;
use function preg_replace;
use SplFileObject;
use SplFixedArray;
use function strlen;
use function trim;

class IGNESHeightGrid extends SplFileObject
{
    use BilinearInterpolation;

    private const ITERATION_CONVERGENCE = 0.0001;

    private const STORAGE_ORDER_INCREASING_LATITUDE_INCREASING_LONGITUDE = 1;

    private const STORAGE_ORDER_INCREASING_LONGITUDE_DECREASING_LATIITUDE = 2;

    private const STORAGE_ORDER_DECREASING_LATITUDE_INCREASING_LONGITUDE = 3;

    private const STORAGE_ORDER_INCREASING_LONGITUDE_INCREASING_LATIITUDE = 4;

    private bool $coordinatesIncludedInData;

    private int $valuesPerCoordinate;

    private bool $precisionIncluded;

    private int $storageOrder;

    private SplFixedArray $data;

    public function __construct($filename)
    {
        parent::__construct($filename);
        $this->init();
    }

    public function getAdjustment(GeographicPoint $point): Metre
    {
        $latitude = $point->getLatitude()->getValue();
        $longitude = $point->getLongitude()->getValue();
        $offset = $this->interpolateBilinear($longitude, $latitude)[0];

        return new Metre($offset);
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $recordId = ($this->numberOfRows - $latitudeIndex - 1) * $this->numberOfColumns + $longitudeIndex;

        $record = $this->data[$recordId];

        $longitude = $longitudeIndex * $this->columnGridInterval + $this->startX;
        $latitude = $latitudeIndex * $this->rowGridInterval + $this->startY;

        return new GridValues($longitude, $latitude, $record);
    }

    private function init(): void
    {
        $headerRegexp = '^\s+(-?[\d.]+)\s+(-?[\d.]+)\s+(-?[\d.]+)\s+(-?[\d.]+)\s+([\d.]+)\s+([\d.]+)';
        $header = $this->fgets();

        preg_match('/' . $headerRegexp . '/', $header, $headerParts);

        $this->columnGridInterval = $headerParts[4] / 60;
        $this->rowGridInterval = $headerParts[3] / 60;
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

        $rawData = $this->fread($this->getSize() - strlen($header));
        $values = explode(' ', trim(preg_replace('/\s+/', ' ', $rawData)));

        $cursor = 0;
        for ($i = 0, $numValues = $this->numberOfColumns * $this->numberOfRows; $i < $numValues; ++$i) {
            $rowData = [(float) $values[$cursor]];
            ++$cursor;

            $this->data[$i] = $rowData;
        }
    }
}
