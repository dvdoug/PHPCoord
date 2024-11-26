<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use PHPCoord\EPSG\Import\EPSGCodegenFromDataImport;

use function ini_set;

use const PHP_EOL;

ini_set('memory_limit', '-1');

require __DIR__ . '/../../../vendor/autoload.php';

$importer = new EPSGCodegenFromDataImport();
echo '--PERFORMING CODEGEN--' . PHP_EOL;

$importer->generateDataUnitsOfMeasure();
$importer->generateDataPrimeMeridians();
$importer->generateDataEllipsoids();
$importer->generateDataDatums();
$importer->generateDataCoordinateSystems();
$importer->generateDataCoordinateReferenceSystems();
$importer->generateExtents();
$importer->generateDataCoordinateOperationMethods();
$importer->generateDataCoordinateOperations();

echo '--CODEGEN COMPLETE--' . PHP_EOL;
