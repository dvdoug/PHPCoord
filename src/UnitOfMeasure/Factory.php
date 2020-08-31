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
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\ExoticAngle;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\ExoticLength;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\ExoticScale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Second;
use PHPCoord\UnitOfMeasure\Time\Year;

class Factory implements UnitOfMeasureIds
{
    /** @var Repository */
    private static $repository;

    /**
     * @param float|string $measurement
     */
    public static function makeUnit($measurement, int $epsgUnitCode): UnitOfMeasure
    {
        $repository = static::$repository ?? new Repository();
        $unitData = $repository->getUnitsOfMeasure(true);

        if (!isset($unitData[$epsgUnitCode])) {
            throw new UnknownUnitOfMeasureException($epsgUnitCode);
        }

        /*
         * Common units (and those that require special handling) having discrete implementations,
         * try those first.
         */
        switch ($epsgUnitCode) {
            case self::EPSG_ANGLE_RADIAN_PER_SECOND:
                return new Rate(new Radian($measurement), new Second(1));
            case self::EPSG_ANGLE_ARC_SECONDS_PER_YEAR:
                return new Rate(new ArcSecond($measurement), new Year(1));
            case self::EPSG_ANGLE_MILLIARC_SECONDS_PER_YEAR:
                return new Rate(self::makeUnit($measurement, self::EPSG_ANGLE_MILLIARC_SECOND), new Year(1));
            case self::EPSG_LENGTH_METRE_PER_SECOND:
                return new Rate(new Metre($measurement), new Second(1));
            case self::EPSG_LENGTH_METRES_PER_YEAR:
                return new Rate(new Metre($measurement), new Year(1));
            case self::EPSG_LENGTH_MILLIMETRES_PER_YEAR:
                return new Rate(self::makeUnit($measurement, self::EPSG_LENGTH_MILLIMETRE), new Year(1));
            case self::EPSG_LENGTH_CENTIMETRES_PER_YEAR:
                return new Rate(self::makeUnit($measurement, self::EPSG_LENGTH_CENTIMETRE), new Year(1));
            case self::EPSG_SCALE_UNITY_PER_SECOND:
                return new Rate(new Unity($measurement), new Second(1));
            case self::EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR:
                return new Rate(self::makeUnit($measurement, self::EPSG_SCALE_PARTS_PER_BILLION), new Year(1));
            case self::EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR:
                return new Rate(self::makeUnit($measurement, self::EPSG_SCALE_PARTS_PER_MILLION), new Year(1));
            case self::EPSG_ANGLE_RADIAN:
                return new Radian($measurement);
            case self::EPSG_ANGLE_DEGREE:
                return new Degree($measurement);
            case self::EPSG_ANGLE_ARC_SECOND:
                return new ArcSecond($measurement);
            case self::EPSG_ANGLE_DEGREE_MINUTE_SECOND:
                return Degree::fromDegreeMinuteSecond((string) $measurement);
            case self::EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE:
                return Degree::fromDegreeMinuteSecondHemisphere((string) $measurement);
            case self::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND:
                return Degree::fromHemisphereDegreeMinuteSecond((string) $measurement);
            case self::EPSG_ANGLE_DEGREE_MINUTE:
                return Degree::fromDegreeMinute((string) $measurement);
            case self::EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE:
                return Degree::fromDegreeMinuteHemisphere((string) $measurement);
            case self::EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE:
                return Degree::fromHemisphereDegreeMinute((string) $measurement);
            case self::EPSG_ANGLE_DEGREE_HEMISPHERE:
                return Degree::fromDegreeHemisphere((string) $measurement);
            case self::EPSG_ANGLE_HEMISPHERE_DEGREE:
                return Degree::fromHemisphereDegree((string) $measurement);
            case self::EPSG_ANGLE_SEXAGESIMAL_DMS_S:
                return Degree::fromSexagesimalDMSS((string) $measurement);
            case self::EPSG_ANGLE_SEXAGESIMAL_DMS:
                return Degree::fromSexagesimalDMS((string) $measurement);
            case self::EPSG_ANGLE_SEXAGESIMAL_DM:
                return Degree::fromSexagesimalDM((string) $measurement);
            case self::EPSG_LENGTH_METRE:
                return new Metre($measurement);
            case self::EPSG_SCALE_UNITY:
                return new Unity($measurement);
            case self::EPSG_TIME_SECOND:
                return new Second($measurement);
            case self::EPSG_TIME_YEAR:
                return new Year($measurement);
        }

        /*
         * Check that the unit can be defined by reference to SI, if it can't it needs special handling and needs to be
         * in the list above
         */
        // @codeCoverageIgnoreStart
        if ($unitData[$epsgUnitCode]['factor_b'] === null ||
            !in_array(
                $unitData[$epsgUnitCode]['target_uom_code'],
                [
                    self::EPSG_ANGLE_RADIAN,
                    self::EPSG_LENGTH_METRE,
                    self::EPSG_SCALE_UNITY,
                    //self::EPSG_TIME_SECOND,  all time units in the DB are currently handled above
                ],
                true
            )
        ) {
            throw new UnknownUnitOfMeasureException($epsgUnitCode);
        }
        // @codeCoverageIgnoreEnd

        switch ($unitData[$epsgUnitCode]['unit_of_meas_type']) {
            case 'angle':
                return new ExoticAngle($measurement, $unitData[$epsgUnitCode]['unit_of_meas_name'], $unitData[$epsgUnitCode]['factor_b'], $unitData[$epsgUnitCode]['factor_c']);
            case 'length':
                return new ExoticLength($measurement, $unitData[$epsgUnitCode]['unit_of_meas_name'], $unitData[$epsgUnitCode]['factor_b'], $unitData[$epsgUnitCode]['factor_c']);
            case 'scale':
                return new ExoticScale($measurement, $unitData[$epsgUnitCode]['unit_of_meas_name'], $unitData[$epsgUnitCode]['factor_b'], $unitData[$epsgUnitCode]['factor_c']);
        }
    }
}
