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
    /**
     * @param float|string $measurement
     */
    public static function makeUnit($measurement, string $srid): UnitOfMeasure
    {
        if (isset(Angle::getSupportedSRIDs()[$srid])) {
            return Angle::makeUnit($measurement, $srid);
        }

        if (isset(Length::getSupportedSRIDs()[$srid])) {
            return Length::makeUnit($measurement, $srid);
        }

        if (isset(Scale::getSupportedSRIDs()[$srid])) {
            return Scale::makeUnit($measurement, $srid);
        }

        if (isset(Time::getSupportedSRIDs()[$srid])) {
            return Time::makeUnit($measurement, $srid);
        }

        if (isset(Rate::getSupportedSRIDs()[$srid])) {
            return Rate::makeUnit($measurement, $srid);
        }

        throw new UnknownUnitOfMeasureException($srid);
    }

    public static function getSupportedSRIDs(): array
    {
        return array_merge(Angle::getSupportedSRIDs(), Length::getSupportedSRIDs(), Scale::getSupportedSRIDs(), Time::getSupportedSRIDs(), Rate::getSupportedSRIDs());
    }
}
