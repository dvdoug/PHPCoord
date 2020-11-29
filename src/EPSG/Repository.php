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

    private static array $datumData = [];

    private static array $datumEnsembleData = [];

    private static array $coordinateSystemData = [];

    private static array $coordinateSystemAxisData = [];

    private static array $coordinateReferenceSystemData = [];

    private function getConnection(): SQLite3
    {
        if (!static::$connection instanceof SQLite3) {
            static::$connection = new SQLite3(__DIR__ . '/../../resources/epsg/epsg.sqlite', SQLITE3_OPEN_READONLY);
            static::$connection->enableExceptions(true);
        }

        return static::$connection;
    }

    public function getDatums(): array
    {
        if (!static::$datumData) {
            $connection = $this->getConnection();
            $sql = "
            SELECT
                'urn:ogc:def:datum:EPSG::' || d.datum_code AS datum_code,
                d.datum_name,
                d.datum_type,
                'urn:ogc:def:ellipsoid:EPSG::' || d.ellipsoid_code AS ellipsoid_code,
                'urn:ogc:def:meridian:EPSG::' || d.prime_meridian_code AS prime_meridian_code,
                d.conventional_rs_code,
                d.frame_reference_epoch,
                d.deprecated
            FROM epsg_datum d
            WHERE d.datum_type != 'engineering'
        ";

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                static::$datumData[$row['datum_code']] = $row;
            }
        }

        return static::$datumData;
    }

    public function getDatumEnsembles(): array
    {
        if (!static::$datumEnsembleData) {
            $connection = $this->getConnection();
            $sql = "
            SELECT
                'urn:ogc:def:datum:EPSG::' || d.datum_ensemble_code AS datum_ensemble_code,
                'urn:ogc:def:datum:EPSG::' || d.datum_code AS datum_code,
                d.datum_sequence
            FROM epsg_datumensemblemember d
            ORDER BY d.datum_sequence
            ";

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                if (isset(static::$datumEnsembleData[$row['datum_ensemble_code']])) {
                    static::$datumEnsembleData[$row['datum_ensemble_code']][] = $row['datum_code'];
                } else {
                    static::$datumEnsembleData[$row['datum_ensemble_code']] = [$row['datum_code']];
                }
            }
        }

        return static::$datumEnsembleData;
    }

    public function getCoordinateSystems(): array
    {
        if (!static::$coordinateSystemData) {
            $connection = $this->getConnection();
            $sql = "
            SELECT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS coord_sys_code,
                cs.coord_sys_name,
                cs.coord_sys_type,
                cs.dimension,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            WHERE cs.coord_sys_type != 'ordinal'
            ";

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $row['axes'] = $this->getCoordinateSystemAxes()[$row['coord_sys_code']];
                static::$coordinateSystemData[$row['coord_sys_code']] = $row;
            }
        }

        return static::$coordinateSystemData;
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

    private function getCoordinateSystemAxes(): array
    {
        if (!static::$coordinateSystemAxisData) {
            $connection = $this->getConnection();
            $sql = "
            SELECT
                'urn:ogc:def:cs:EPSG::' || a.coord_sys_code AS coord_sys_code,
                a.coord_axis_orientation,
                a.coord_axis_abbreviation,
                an.coord_axis_name,
                'urn:ogc:def:uom:EPSG::' || a.uom_code AS uom_code,
                a.coord_axis_order
            FROM epsg_coordinateaxis a
            JOIN epsg_coordinateaxisname an on a.coord_axis_name_code = an.coord_axis_name_code
            ORDER BY a.coord_axis_order
            ";

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                if (isset(static::$coordinateSystemAxisData[$row['coord_sys_code']])) {
                    static::$coordinateSystemAxisData[$row['coord_sys_code']][] = $row;
                } else {
                    static::$coordinateSystemAxisData[$row['coord_sys_code']] = [$row];
                }
            }
        }

        return static::$coordinateSystemAxisData;
    }

    /**
     * @codeCoverageIgnore
     */
    public function clearCache(): void
    {
        static::$connection = null;
        static::$datumData = [];
        static::$datumEnsembleData = [];
        static::$coordinateSystemData = [];
        static::$coordinateSystemAxisData = [];
        static::$coordinateReferenceSystemData = [];
    }
}
