<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\ExoticAngle;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\ExoticLength;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\ExoticScale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Second;
use PHPCoord\UnitOfMeasure\Time\Year;

class UnitOfMeasureFactory
{
    /**
     * @var Repository
     */
    private static $repository;

    /**
     * @param float|string $measurement
     */
    public static function makeUnit($measurement, int $epsgUnitCode): UnitOfMeasure
    {
        $repository = self::$repository ?? new Repository();
        $allData = $repository->getUnitsOfMeasure();

        if (!isset($allData[$epsgUnitCode])) {
            throw new UnknownUnitOfMeasureException($epsgUnitCode);
        }

        $unitData = $allData[$epsgUnitCode];

        /*
         * Common units (and those that require special handling) having discrete implementations,
         * try those first.
         */
        switch ($epsgUnitCode) {
            case UnitOfMeasure::EPSG_ANGLE_RADIAN_PER_SECOND:
                return new Rate(new Radian($measurement), new Second(1));
            case UnitOfMeasure::EPSG_ANGLE_ARC_SECONDS_PER_YEAR:
                return new Rate(new ArcSecond($measurement), new Year(1));
            case UnitOfMeasure::EPSG_ANGLE_MILLIARC_SECONDS_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_ANGLE_MILLIARC_SECOND), new Year(1));
            case UnitOfMeasure::EPSG_LENGTH_METRE_PER_SECOND:
                return new Rate(new Metre($measurement), new Second(1));
            case UnitOfMeasure::EPSG_LENGTH_METRES_PER_YEAR:
                return new Rate(new Metre($measurement), new Year(1));
            case UnitOfMeasure::EPSG_LENGTH_MILLIMETRES_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_LENGTH_MILLIMETRE), new Year(1));
            case UnitOfMeasure::EPSG_LENGTH_CENTIMETRES_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_LENGTH_CENTIMETRE), new Year(1));
            case UnitOfMeasure::EPSG_SCALE_UNITY_PER_SECOND:
                return new Rate(new Unity($measurement), new Second(1));
            case UnitOfMeasure::EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_SCALE_PARTS_PER_BILLION), new Year(1));
            case UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR:
                return new Rate(self::makeUnit($measurement, UnitOfMeasure::EPSG_SCALE_PARTS_PER_MILLION), new Year(1));
            case UnitOfMeasure::EPSG_ANGLE_RADIAN:
                return new Radian($measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE:
                return new Degree($measurement);
            case UnitOfMeasure::EPSG_ANGLE_ARC_SECOND:
                return new ArcSecond($measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_SECOND:
                return Degree::fromDegreeMinuteSecond((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE:
                return Degree::fromDegreeMinuteSecondHemisphere((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND:
                return Degree::fromHemisphereDegreeMinuteSecond((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE:
                return Degree::fromDegreeMinute((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE:
                return Degree::fromDegreeMinuteHemisphere((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE:
                return Degree::fromHemisphereDegreeMinute((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_DEGREE_HEMISPHERE:
                return Degree::fromDegreeHemisphere((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_HEMISPHERE_DEGREE:
                return Degree::fromHemisphereDegree((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DMS_S:
                return Degree::fromSexagesimalDMSS((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DMS:
                return Degree::fromSexagesimalDMS((string) $measurement);
            case UnitOfMeasure::EPSG_ANGLE_SEXAGESIMAL_DM:
                return Degree::fromSexagesimalDM((string) $measurement);
            case UnitOfMeasure::EPSG_LENGTH_METRE:
                return new Metre($measurement);
            case UnitOfMeasure::EPSG_SCALE_COEFFICIENT:
                return new Coefficient($measurement);
            case UnitOfMeasure::EPSG_SCALE_UNITY:
                return new Unity($measurement);
            case UnitOfMeasure::EPSG_TIME_SECOND:
                return new Second($measurement);
            case UnitOfMeasure::EPSG_TIME_YEAR:
                return new Year($measurement);
        }

        /*
         * Check that the unit can be defined by reference to SI, if it can't it needs special handling and needs to be
         * in the list above
         */
        // @codeCoverageIgnoreStart
        if ($unitData['factor_b'] === null ||
            !in_array(
                $unitData['target_uom_code'],
                [
                    UnitOfMeasure::EPSG_ANGLE_RADIAN,
                    UnitOfMeasure::EPSG_LENGTH_METRE,
                    UnitOfMeasure::EPSG_SCALE_UNITY,
                    //UnitOfMeasure::EPSG_TIME_SECOND,  all time units in the DB are currently handled above
                ],
                true
            )
        ) {
            throw new UnknownUnitOfMeasureException($epsgUnitCode);
        }
        // @codeCoverageIgnoreEnd

        switch ($unitData['unit_of_meas_type']) {
            case 'angle':
                return new ExoticAngle($measurement, $unitData['unit_of_meas_name'], $unitData['factor_b'], $unitData['factor_c']);
            case 'length':
                return new ExoticLength($measurement, $unitData['unit_of_meas_name'], $unitData['factor_b'], $unitData['factor_c']);
            case 'scale':
                return new ExoticScale($measurement, $unitData['unit_of_meas_name'], $unitData['factor_b'], $unitData['factor_c']);
        }
    }

    public static function convertAngle(Angle $angle, int $targetEpsgUnitCode): Angle
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getUnitsOfMeasure();

        if (!isset($allData[$targetEpsgUnitCode])) {
            throw new UnknownUnitOfMeasureException($targetEpsgUnitCode);
        }

        $targetUnitData = $allData[$targetEpsgUnitCode];

        return self::makeUnit($angle->asRadians()->getValue() * $targetUnitData['factor_c'] / $targetUnitData['factor_b'], $targetEpsgUnitCode);
    }

    public static function convertLength(Length $length, int $targetEpsgUnitCode): Length
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getUnitsOfMeasure();

        if (!isset($allData[$targetEpsgUnitCode])) {
            throw new UnknownUnitOfMeasureException($targetEpsgUnitCode);
        }

        $targetUnitData = $allData[$targetEpsgUnitCode];

        return self::makeUnit($length->asMetres()->getValue() * $targetUnitData['factor_c'] / $targetUnitData['factor_b'], $targetEpsgUnitCode);
    }
}
