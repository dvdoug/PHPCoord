<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use function array_merge;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;

abstract class Geographic extends CoordinateReferenceSystem
{
    private static array $supportedCache = [];

    public static function fromSRID(string $srid): self
    {
        if (isset(Geographic2D::getSupportedSRIDs()[$srid])) {
            return Geographic2D::fromSRID($srid);
        }

        if (isset(Geographic3D::getSupportedSRIDs()[$srid])) {
            return Geographic3D::fromSRID($srid);
        }

        throw new UnknownCoordinateReferenceSystemException($srid);
    }

    public static function getSupportedSRIDs(): array
    {
        if (!self::$supportedCache) {
            self::$supportedCache = array_merge(Geographic2D::getSupportedSRIDs(), Geographic3D::getSupportedSRIDs());
        }

        return self::$supportedCache;
    }
}
