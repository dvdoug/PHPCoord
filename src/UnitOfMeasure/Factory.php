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

class Factory
{
    private const EPSG_ANGLE_RADIAN = 9101;
    private const EPSG_ANGLE_DEGREE = 9102;
    private const EPSG_ANGLE_ARCSECOND = 9104;
    private const EPSG_ANGLE_DEGREE_MINUTE_SECOND = 9107;
    private const EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE = 9108;
    private const EPSG_ANGLE_DEGREE_MINUTE = 9115;
    private const EPSG_ANGLE_DEGREE_HEMISPHERE = 9116;
    private const EPSG_ANGLE_HEMISPHERE_DEGREE = 9117;
    private const EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE = 9118;
    private const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE = 9119;
    private const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND = 9120;
    private const EPSG_ANGLE_MILLIARCSECOND = 1031;
    private const EPSG_ANGLE_RADIAN_PER_SECOND = 1035;
    private const EPSG_ANGLE_ARCSECOND_PER_YEAR = 1043;
    private const EPSG_ANGLE_MILLIARCSECOND_PER_YEAR = 1032;
    private const EPSG_ANGLE_SEXAGESIMAL_DMS = 9110;
    private const EPSG_ANGLE_SEXAGESIMAL_DM = 9111;
    private const EPSG_ANGLE_SEXAGESIMAL_DMSS = 9121;

    private const EPSG_LENGTH_METRE = 9001;
    private const EPSG_LENGTH_MILLIMETRE = 1025;
    private const EPSG_LENGTH_CENTIMETRE = 1033;
    private const EPSG_LENGTH_METRE_PER_SECOND = 1026;
    private const EPSG_LENGTH_MILLIMETRE_PER_YEAR = 1027;
    private const EPSG_LENGTH_CENTIMETRE_PER_YEAR = 1034;
    private const EPSG_LENGTH_METRE_PER_YEAR = 1042;

    private const EPSG_SCALE_UNITY = 9201;
    private const EPSG_SCALE_PARTS_PER_BILLION = 1028;
    private const EPSG_SCALE_PARTS_PER_MILLION = 9202;
    private const EPSG_SCALE_UNITY_PER_SECOND = 1036;
    private const EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR = 1030;
    private const EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR = 1041;

    private const EPSG_TIME_SECOND = 1040;
    private const EPSG_TIME_YEAR = 1029;

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
            case self::EPSG_ANGLE_ARCSECOND_PER_YEAR:
                return new Rate(new ArcSecond($measurement), new Year(1));
            case self::EPSG_ANGLE_MILLIARCSECOND_PER_YEAR:
                return new Rate(self::makeUnit($measurement, self::EPSG_ANGLE_MILLIARCSECOND), new Year(1));
            case self::EPSG_LENGTH_METRE_PER_SECOND:
                return new Rate(new Metre($measurement), new Second(1));
            case self::EPSG_LENGTH_METRE_PER_YEAR:
                return new Rate(new Metre($measurement), new Year(1));
            case self::EPSG_LENGTH_MILLIMETRE_PER_YEAR:
                return new Rate(self::makeUnit($measurement, self::EPSG_LENGTH_MILLIMETRE), new Year(1));
            case self::EPSG_LENGTH_CENTIMETRE_PER_YEAR:
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
            case self::EPSG_ANGLE_ARCSECOND:
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
            case self::EPSG_ANGLE_SEXAGESIMAL_DMSS:
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
