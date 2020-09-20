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
    /** @var SQLite3 */
    private static $connection;

    /** @var array */
    private static $unitsOfMeasureData = [];

    /** @var array */
    private static $primeMeridianData = [];

    /** @var array */
    private static $ellipsoidData = [];

    private function getConnection(): SQLite3
    {
        if (!static::$connection instanceof SQLite3) {
            static::$connection = new SQLite3(__DIR__ . '/../../resources/epsg/epsg.sqlite', SQLITE3_OPEN_READONLY);
            static::$connection->enableExceptions(true);
        }

        return static::$connection;
    }

    public function getEllipsoids(): array
    {
        if (!static::$ellipsoidData) {
            $connection = $this->getConnection();
            $sql = '
            SELECT
                el.ellipsoid_code,
                el.ellipsoid_name,
                el.semi_major_axis,
                el.semi_minor_axis,
                el.inv_flattening,
                el.uom_code,
                el.deprecated
            FROM epsg_ellipsoid el
        ';

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                // some ellipsoids are defined via inverse flattening and the DB doesn't store the calculated data...
                if (!$row['semi_minor_axis']) {
                    $row['semi_minor_axis'] = $row['semi_major_axis'] - ($row['semi_major_axis'] / $row['inv_flattening']);
                }

                static::$ellipsoidData[$row['ellipsoid_code']] = $row;
            }
        }

        return static::$ellipsoidData;
    }

    public function getUnitsOfMeasure(): array
    {
        if (!static::$unitsOfMeasureData) {
            $connection = $this->getConnection();
            $sql = '
            SELECT
                m.uom_code,
                m.unit_of_meas_name,
                m.unit_of_meas_type,
                m.target_uom_code,
                m.factor_b,
                m.factor_c,
                m.deprecated
            FROM epsg_unitofmeasure m
            ';

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                static::$unitsOfMeasureData[$row['uom_code']] = $row;
            }
        }

        return static::$unitsOfMeasureData;
    }

    public function getPrimeMeridians(): array
    {
        if (!static::$primeMeridianData) {
            $connection = $this->getConnection();
            $sql = '
            SELECT
                p.prime_meridian_code,
                p.prime_meridian_name,
                p.greenwich_longitude,
                p.uom_code,
                p.deprecated
            FROM epsg_primemeridian p
            ';

            $result = $connection->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                static::$primeMeridianData[$row['prime_meridian_code']] = $row;
            }
        }

        return static::$primeMeridianData;
    }
}
