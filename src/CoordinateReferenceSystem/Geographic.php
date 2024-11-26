<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;

use function array_merge;

abstract class Geographic extends CoordinateReferenceSystem
{
    public static function fromSRID(string $srid): Geographic2D|Geographic3D
    {
        if (isset(Geographic2D::getSupportedSRIDs()[$srid])) {
            return Geographic2D::fromSRID($srid);
        }

        if (isset(Geographic3D::getSupportedSRIDs()[$srid])) {
            return Geographic3D::fromSRID($srid);
        }

        throw new UnknownCoordinateReferenceSystemException($srid);
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_merge(Geographic2D::getSupportedSRIDs(), Geographic3D::getSupportedSRIDs());
    }

    /**
     * @return array<string, array{name: string, extent_description: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_merge(Geographic2D::getSupportedSRIDsWithHelp(), Geographic3D::getSupportedSRIDsWithHelp());
    }
}
