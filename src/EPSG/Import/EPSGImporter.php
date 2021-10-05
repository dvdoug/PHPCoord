<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function file_exists;
use function file_get_contents;
use SQLite3;
use const SQLITE3_OPEN_CREATE;
use const SQLITE3_OPEN_READWRITE;
use function str_starts_with;
use function substr;
use function unlink;

class EPSGImporter
{
    private string $resourceDir;

    private const BOM = "\xEF\xBB\xBF";

    public function __construct()
    {
        $this->resourceDir = __DIR__ . '/../../../resources';
    }

    public function createSQLiteDB(): void
    {
        //remove old file if any
        if (file_exists($this->resourceDir . '/epsg/epsg.sqlite')) {
            unlink($this->resourceDir . '/epsg/epsg.sqlite');
        }

        $sqlite = new SQLite3(
            $this->resourceDir . '/epsg/epsg.sqlite',
            SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
        );

        $sqlite->enableExceptions(true);
        $sqlite->exec('PRAGMA journal_mode=WAL'); //WAL is faster

        $tableSchema = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Table_Script.sql');
        if (str_starts_with($tableSchema, self::BOM)) {
            $tableSchema = substr($tableSchema, 3);
        }
        $sqlite->exec($tableSchema);

        $tableData = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Data_Script.sql');
        if (str_starts_with($tableData, self::BOM)) {
            $tableData = substr($tableData, 3);
        }
        $sqlite->exec($tableData);

        //Corrections
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = NULL WHERE param_value_file_ref = ''");
        $sqlite->exec('UPDATE epsg_coordinateaxis SET uom_code = 9102 WHERE uom_code = 9122'); // supplier-defined degrees to regular degrees
        $sqlite->exec('UPDATE epsg_coordoperation SET deprecated = 1 WHERE coord_op_code IN (1851, 9235, 15933)');

        /*
         * AusGeoidv2 abuses the NTv2 file format to have very large files, and a confusing implementation (latitude shifts are actually height offsets),
         * so use a GTX conversion of those files instead...
         */
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 1088 WHERE coord_op_code IN (9465, 9466, 9467, 9693)');
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 9665 WHERE coord_op_code IN (5656, 5657, 8451, 9461, 9692)');

        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = REPLACE(param_value_file_ref, '.gsb', '.gtx') WHERE coord_op_code IN (9465, 9466, 9467, 9693) OR coord_op_code IN (5656, 5657, 8451, 9692)");
        $sqlite->exec('UPDATE epsg_coordoperationparamvalue SET coord_op_method_code = 1088 WHERE coord_op_code IN (9465, 9466, 9467, 9693)');
        $sqlite->exec('UPDATE epsg_coordoperationparamvalue SET coord_op_method_code = 9665 WHERE coord_op_code IN (5656, 5657, 8451, 9692)');

        /*
         * VERTCON files/extents described in EPSG are the old VERTCON1/2 .94 file format, not the VERTCON3 .b files
         * which cover geographically different extents. Therefore we use the official NOAA VDatum GTX conversions of the
         * older files instead to avoid yet-another-grid-format implementation.
         */
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 1084 WHERE coord_op_code IN (7969, 7970, 7971)');
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = REPLACE(param_value_file_ref, '.94', '.gtx') WHERE coord_op_code IN (7969, 7970, 7971)");
        $sqlite->exec('UPDATE epsg_coordoperationparamvalue SET coord_op_method_code = 1084 WHERE coord_op_code IN (7969, 7970, 7971)');

        $sqlite->exec('VACUUM');
        $sqlite->close();
    }
}
