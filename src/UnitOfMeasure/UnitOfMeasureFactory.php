<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use function array_merge;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Time\Time;

class UnitOfMeasureFactory
{
    private static array $sridCache = [];

    public static function makeUnit(float|string $measurement, string $srid): UnitOfMeasure
    {
        if (!self::$sridCache) {
            self::$sridCache['angle'] = Angle::getSupportedSRIDs();
            self::$sridCache['length'] = Length::getSupportedSRIDs();
            self::$sridCache['scale'] = Scale::getSupportedSRIDs();
            self::$sridCache['time'] = Time::getSupportedSRIDs();
            self::$sridCache['rate'] = Rate::getSupportedSRIDs();
        }

        if (isset(self::$sridCache['angle'][$srid])) {
            return Angle::makeUnit($measurement, $srid);
        }

        if (isset(self::$sridCache['length'][$srid])) {
            return Length::makeUnit($measurement, $srid);
        }

        if (isset(self::$sridCache['scale'][$srid])) {
            return Scale::makeUnit($measurement, $srid);
        }

        if (isset(self::$sridCache['time'][$srid])) {
            return Time::makeUnit($measurement, $srid);
        }

        if (isset(self::$sridCache['rate'][$srid])) {
            return Rate::makeUnit($measurement, $srid);
        }

        throw new UnknownUnitOfMeasureException($srid);
    }

    public static function getSupportedSRIDs(): array
    {
        return array_merge(Angle::getSupportedSRIDs(), Length::getSupportedSRIDs(), Scale::getSupportedSRIDs(), Time::getSupportedSRIDs(), Rate::getSupportedSRIDs());
    }
}
