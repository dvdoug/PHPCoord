<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

/*
 * Imports raw EPSG Dataset from Postgres format.
 */
$dbPath = __DIR__ . '/epsg.sqlite';

//remove old file if any
if (file_exists($dbPath)) {
    unlink($dbPath);
}

$sqlite = new SQLite3(
        $dbPath,
        SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
);
$sqlite->enableExceptions(true);
$sqlite->exec('PRAGMA journal_mode=WAL'); //WAL is faster

$tableSchema = file_get_contents(__DIR__ . '/PostgreSQL_Table_Script.sql');
$sqlite->exec($tableSchema);

$tableData = file_get_contents(__DIR__ . '/PostgreSQL_Data_Script.sql');
$sqlite->exec($tableData);

$sqlite->exec('VACUUM');
$sqlite->exec('PRAGMA journal_mode=DELETE'); //but WAL is not openable read-only in older SQLite
$sqlite->close();
