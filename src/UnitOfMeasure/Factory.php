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
use PHPCoord\UnitOfMeasure\Scale\ExoticScale;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Second;
use PHPCoord\UnitOfMeasure\Time\Time;
use PHPCoord\UnitOfMeasure\Time\Year;

class Factory
{
    private const EPSG_ANGLE_RADIAN = 9101;
    private const EPSG_ANGLE_DEGREE = 9102;
    private const EPSG_ANGLE_ARCSECOND = 9104;
    private const EPSG_ANGLE_MILLIARCSECOND = 1031;
    private const EPSG_ANGLE_RADIAN_PER_SECOND = 1035;
    private const EPSG_ANGLE_ARCSECOND_PER_YEAR = 1043;
    private const EPSG_ANGLE_MILLIARCSECOND_PER_YEAR = 1032;

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

    public static function makeUnit(float $measurement, int $epsgUnitCode): UnitOfMeasure
    {
        $repository = static::$repository ?? new Repository();
        $unitData = $repository->getUnitsOfMeasure(true);

        if (!isset($unitData[$epsgUnitCode])) {
            throw new UnknownUnitOfMeasureException($epsgUnitCode);
        }

        switch ($unitData[$epsgUnitCode]['unit_of_meas_type']) {
            case 'angle':
                switch ($epsgUnitCode) {
                    case self::EPSG_ANGLE_RADIAN_PER_SECOND:
                        return new Rate(new Radian($measurement), new Second(1));

                    case self::EPSG_ANGLE_ARCSECOND_PER_YEAR:
                        return new Rate(new ArcSecond($measurement), new Year(1));

                    case self::EPSG_ANGLE_MILLIARCSECOND_PER_YEAR:
                        return new Rate(self::makeUnit($measurement, self::EPSG_ANGLE_MILLIARCSECOND), new Year(1));

                    default:
                        return static::makeAngle($measurement, $unitData[$epsgUnitCode]);
                }

                // no break
            case 'length':
                switch ($epsgUnitCode) {
                    case self::EPSG_LENGTH_METRE_PER_SECOND:
                        return new Rate(new Metre($measurement), new Second(1));

                    case self::EPSG_LENGTH_METRE_PER_YEAR:
                        return new Rate(new Metre($measurement), new Year(1));

                    case self::EPSG_LENGTH_MILLIMETRE_PER_YEAR:
                        return new Rate(self::makeUnit($measurement, self::EPSG_LENGTH_MILLIMETRE), new Year(1));

                    case self::EPSG_LENGTH_CENTIMETRE_PER_YEAR:
                        return new Rate(self::makeUnit($measurement, self::EPSG_LENGTH_CENTIMETRE), new Year(1));

                    default:
                        return static::makeLength($measurement, $unitData[$epsgUnitCode]);
                }

                // no break
            case 'scale':
                switch ($epsgUnitCode) {
                    case self::EPSG_SCALE_UNITY_PER_SECOND:
                        return new Rate(new Unity($measurement), new Second(1));

                    case self::EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR:
                        return new Rate(self::makeUnit($measurement, self::EPSG_SCALE_PARTS_PER_BILLION), new Year(1));

                    case self::EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR:
                        return new Rate(self::makeUnit($measurement, self::EPSG_SCALE_PARTS_PER_MILLION), new Year(1));

                    default:
                        return static::makeScale($measurement, $unitData[$epsgUnitCode]);
                }

                // no break
            case 'time':
                return static::makeTime($measurement, $unitData[$epsgUnitCode]);

            default:
                throw new UnknownUnitOfMeasureException($epsgUnitCode); // @codeCoverageIgnore
        }
    }

    private static function makeAngle(float $measurement, array $epsgUnitData): Angle
    {
        switch ($epsgUnitData['uom_code']) {
            case self::EPSG_ANGLE_RADIAN:
                return new Radian($measurement);
            case self::EPSG_ANGLE_DEGREE:
                return new Degree($measurement);
            case self::EPSG_ANGLE_ARCSECOND:
                return new ArcSecond($measurement);
            default:
                if ($epsgUnitData['factor_b'] === null || $epsgUnitData['target_uom_code'] !== self::EPSG_ANGLE_RADIAN) { // @codeCoverageIgnoreStart
                    throw new UnknownUnitOfMeasureException($epsgUnitData['uom_code']);
                } // @codeCoverageIgnoreEnd

                return new ExoticAngle($measurement, $epsgUnitData['unit_of_meas_name'], $epsgUnitData['factor_b'], $epsgUnitData['factor_c']);
        }
    }

    private static function makeLength(float $measurement, array $epsgUnitData): Length
    {
        switch ($epsgUnitData['uom_code']) {
            case self::EPSG_LENGTH_METRE:
                return new Metre($measurement);
            default:
                if ($epsgUnitData['factor_b'] === null || $epsgUnitData['target_uom_code'] !== self::EPSG_LENGTH_METRE) { // @codeCoverageIgnoreStart
                    throw new UnknownUnitOfMeasureException($epsgUnitData['uom_code']);
                } // @codeCoverageIgnoreEnd

                return new ExoticLength($measurement, $epsgUnitData['unit_of_meas_name'], $epsgUnitData['factor_b'], $epsgUnitData['factor_c']);
        }
    }

    private static function makeScale(float $measurement, array $epsgUnitData): Scale
    {
        switch ($epsgUnitData['uom_code']) {
            case self::EPSG_SCALE_UNITY:
                return new Unity($measurement);
            default:
                if ($epsgUnitData['factor_b'] === null || $epsgUnitData['target_uom_code'] !== self::EPSG_SCALE_UNITY) { // @codeCoverageIgnoreStart
                    throw new UnknownUnitOfMeasureException($epsgUnitData['uom_code']);
                } // @codeCoverageIgnoreEnd

                return new ExoticScale($measurement, $epsgUnitData['unit_of_meas_name'], $epsgUnitData['factor_b'], $epsgUnitData['factor_c']);
        }
    }

    private static function makeTime(float $measurement, array $epsgUnitData): Time
    {
        switch ($epsgUnitData['uom_code']) {
            case self::EPSG_TIME_SECOND:
                return new Second($measurement);

            case self::EPSG_TIME_YEAR:
                return new Year($measurement);

            default:
                throw new UnknownUnitOfMeasureException($epsgUnitData['uom_code']); // @codeCoverageIgnore
        }
    }
}
