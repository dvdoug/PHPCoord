<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Time\Time;

use function array_merge;

class UnitOfMeasureFactory
{
    /**
     * @var array<string, array<string, string>>
     */
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
            return Length::makeUnit((float) $measurement, $srid);
        }

        if (isset(self::$sridCache['scale'][$srid])) {
            return Scale::makeUnit((float) $measurement, $srid);
        }

        if (isset(self::$sridCache['time'][$srid])) {
            return Time::makeUnit((float) $measurement, $srid);
        }

        if (isset(self::$sridCache['rate'][$srid])) {
            return Rate::makeUnit((float) $measurement, $srid);
        }

        throw new UnknownUnitOfMeasureException($srid);
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_merge(Angle::getSupportedSRIDs(), Length::getSupportedSRIDs(), Scale::getSupportedSRIDs(), Time::getSupportedSRIDs(), Rate::getSupportedSRIDs());
    }
}
