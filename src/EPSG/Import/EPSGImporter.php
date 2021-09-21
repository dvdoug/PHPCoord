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
use function strpos;
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
        if (strpos($tableSchema, self::BOM) === 0) {
            $tableSchema = substr($tableSchema, 3);
        }
        $sqlite->exec($tableSchema);

        $tableData = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Data_Script.sql');
        if (strpos($tableData, self::BOM) === 0) {
            $tableData = substr($tableData, 3);
        }
        $sqlite->exec($tableData);

        //Corrections
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = NULL WHERE param_value_file_ref = ''");
        $sqlite->exec('UPDATE epsg_coordinateaxis SET uom_code = 9102 WHERE uom_code = 9122'); // supplier-defined degrees to regular degrees
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET base_crs_code = 8817 WHERE coord_ref_sys_code = 8818');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET base_crs_code = 9695 WHERE coord_ref_sys_code = 9696');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = 15593 WHERE coord_ref_sys_code = 9057');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = 15593 WHERE coord_ref_sys_code = 9066');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4203');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4277');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4728');
        $sqlite->exec('UPDATE epsg_extent SET deprecated = 1 WHERE extent_code IN (1263, 4205, 4393)');
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = 'nadcon5.nad83_2007.nad83_2011.prvi.eht.trn.20160901.b' WHERE param_value_file_ref = 'nadcon5.nad83_2007.nad83_2011.prvi.eht.trn.20160901.b01.b'");
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = 'NLCSRSV4A.GSB' WHERE param_value_file_ref = 'NLCSRSV4A.GSB '");
        $sqlite->exec('UPDATE epsg_coordoperation SET deprecated = 1 WHERE coord_op_code IN (1851, 9235, 15933)');

        $sqlite->exec('VACUUM');
        $sqlite->close();
    }
}
