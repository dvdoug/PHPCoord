<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG;

use SQLite3;

/**
 * @internal
 */
class Repository
{
    private static ?SQLite3 $connection = null;

    private static array $coordinateReferenceSystemData = [];

    private function getConnection(): SQLite3
    {
        if (!static::$connection instanceof SQLite3) {
            static::$connection = new SQLite3(__DIR__ . '/../../resources/epsg/epsg.sqlite', SQLITE3_OPEN_READONLY);
            static::$connection->enableExceptions(true);
        }

        return static::$connection;
    }

    public function getCoordinateReferenceSystems(): array
    {
        if (!static::$coordinateReferenceSystemData) {
            $connection = $this->getConnection();
            $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS coord_ref_sys_code,
                crs.coord_ref_sys_kind,
                crs.coord_ref_sys_name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coord_sys_code,
                'urn:ogc:def:datum:EPSG::' || crs.datum_code AS datum_code,
                'urn:ogc:def:crs:EPSG::' || crs.base_crs_code AS base_crs_code,
                'urn:ogc:def:coordinateOperation:EPSG::' || crs.projection_conv_code AS projection_conv_code,
                'urn:ogc:def:crs:EPSG::' || crs.cmpd_horizcrs_code AS cmpd_horizcrs_code,
                'urn:ogc:def:crs:EPSG::' || crs.cmpd_vertcrs_code AS cmpd_vertcrs_code,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            WHERE crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            ";

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                static::$coordinateReferenceSystemData[$row['coord_ref_sys_code']] = $row;
            }
        }

        return static::$coordinateReferenceSystemData;
    }

    /**
     * @codeCoverageIgnore
     */
    public function clearCache(): void
    {
        static::$connection = null;
        static::$coordinateReferenceSystemData = [];
    }
}
