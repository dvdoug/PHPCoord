<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use PHPCoord\EPSG\Import\EPSGImporter;

use const PHP_EOL;

require __DIR__ . '/../../../vendor/autoload.php';

/**
 * Imports raw EPSG Dataset from Postgres format.
 */
$importer = new EPSGImporter();
echo '--CREATING SQLITE DB--' . PHP_EOL;
$importer->createSQLiteDB();
echo '--IMPORT COMPLETE--' . PHP_EOL;
