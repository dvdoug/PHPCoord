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
use function explode;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Length\Metre;
use function preg_replace;
use SplFileObject;
use function str_replace;
use function trim;

class IGNFGeocentricTranslationGrid extends SplFileObject
{
    use BilinearInterpolation;

    private const ITERATION_CONVERGENCE = 0.0001;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $this->readHeader();
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
        $record = ($longitudeIndex * ($this->numberOfRows + 1) + $latitudeIndex + 4);

        $this->seek($record);
        $rawData = explode(' ', trim(preg_replace('/ +/', ' ', $this->fgets())));

        return new GridValues((float) $rawData[1], (float) $rawData[2], [(float) $rawData[3], (float) $rawData[4], (float) $rawData[5]]);
    }

    private function readHeader(): void
    {
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
    }
}
