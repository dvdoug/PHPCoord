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
    public static function makeUnit(float|string $measurement, string $srid): UnitOfMeasure
    {
        if (isset(Angle::getSupportedSRIDs()[$srid])) {
            return Angle::makeUnit($measurement, $srid);
        }

        if (isset(Length::getSupportedSRIDs()[$srid])) {
            return Length::makeUnit((float) $measurement, $srid);
        }

        if (isset(Scale::getSupportedSRIDs()[$srid])) {
            return Scale::makeUnit((float) $measurement, $srid);
        }

        if (isset(Time::getSupportedSRIDs()[$srid])) {
            return Time::makeUnit((float) $measurement, $srid);
        }

        if (isset(Rate::getSupportedSRIDs()[$srid])) {
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
