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
use const PHP_MAJOR_VERSION;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Metre;
use function preg_replace;
use SplFileObject;
use function str_replace;
use function trim;

class IGNFGeocentricTranslationGrid extends SplFileObject
{
    private const ITERATION_CONVERGENCE = 0.0001;

    private float $lowerLatitudeLimit;
    private float $upperLatitudeLimit;
    private float $lowerLongitudeLimit;
    private float $upperLongitudeLimit;
    private float $latitudeGridInterval;
    private float $longitudeGridInterval;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $this->readHeader();
    }

    public function applyForwardAdjustment(GeographicPoint $point, Geographic $to): GeographicPoint
    {
        [$tx, $ty, $tz] = $this->getAdjustment($point->getLatitude(), $point->getLongitude());

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
            $adjustment = $this->getAdjustment($latitude, $longitude);
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
    private function getAdjustment(Angle $latitude, Angle $longitude): array
    {
        $latitudeIndex = (int) (string) (($latitude->getValue() - $this->lowerLatitudeLimit) / $this->latitudeGridInterval);
        $longitudeIndex = (int) (string) (($longitude->getValue() - $this->lowerLongitudeLimit) / $this->longitudeGridInterval);

        $corner0 = $this->getRecord($latitudeIndex, $longitudeIndex);
        $corner1 = $this->getRecord($latitudeIndex + 1, $longitudeIndex);
        $corner2 = $this->getRecord($latitudeIndex + 1, $longitudeIndex + 1);
        $corner3 = $this->getRecord($latitudeIndex, $longitudeIndex + 1);

        $dLatitude = $latitude->getValue() - $corner0[2];
        $dLongitude = $longitude->getValue() - $corner0[1];

        $t = $dLatitude / $this->latitudeGridInterval;
        $u = $dLongitude / $this->longitudeGridInterval;

        $tx = (1 - $t) * (1 - $u) * $corner0[3] + ($t) * (1 - $u) * $corner1[3] + ($t) * ($u) * $corner2[3] + (1 - $t) * ($u) * $corner3[3];
        $ty = (1 - $t) * (1 - $u) * $corner0[4] + ($t) * (1 - $u) * $corner1[4] + ($t) * ($u) * $corner2[4] + (1 - $t) * ($u) * $corner3[4];
        $tz = (1 - $t) * (1 - $u) * $corner0[5] + ($t) * (1 - $u) * $corner1[5] + ($t) * ($u) * $corner2[5] + (1 - $t) * ($u) * $corner3[5];

        return [new Metre($tx), new Metre($ty), new Metre($tz)];
    }

    private function getRecord(int $latitudeIndex, int $longitudeIndex): array
    {
        $latitudesPerLongitude = (int) (string) (($this->upperLatitudeLimit - $this->lowerLatitudeLimit) / $this->latitudeGridInterval);
        $record = ($longitudeIndex * ($latitudesPerLongitude + 1) + $latitudeIndex + 4);

        // https://bugs.php.net/bug.php?id=62004
        if (PHP_MAJOR_VERSION < 8) {
            --$record;
        }

        $this->seek($record);

        return explode(' ', trim(preg_replace('/ +/', ' ', $this->fgets())));
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
        $this->lowerLongitudeLimit = (float) $gridDimensions[0];
        $this->upperLongitudeLimit = (float) $gridDimensions[1];
        $this->lowerLatitudeLimit = (float) $gridDimensions[2];
        $this->upperLatitudeLimit = (float) $gridDimensions[3];
        $this->longitudeGridInterval = (float) $gridDimensions[4];
        $this->latitudeGridInterval = (float) $gridDimensions[5];
    }
}
