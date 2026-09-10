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
use function microtime;
use function printf;

use const PHP_EOL;

ini_set('memory_limit', '-1');

require __DIR__ . '/../../../vendor/autoload.php';

$importer = new EPSGCodegenFromDataImport();
echo '--PERFORMING CODEGEN--' . PHP_EOL;

$overallStart = microtime(true);

$importer->time('Units of Measure', static fn () => $importer->generateDataUnitsOfMeasure());
$importer->time('Prime Meridians', static fn () => $importer->generateDataPrimeMeridians());
$importer->time('Ellipsoids', static fn () => $importer->generateDataEllipsoids());
$importer->time('Datums', static fn () => $importer->generateDataDatums());
$importer->time('Coordinate Systems', static fn () => $importer->generateDataCoordinateSystems());
$importer->time('Coordinate Reference Systems', static fn () => $importer->generateDataCoordinateReferenceSystems());
$importer->time('Extents', static fn () => $importer->generateExtents());
$importer->time('Coordinate Operation Methods', static fn () => $importer->generateDataCoordinateOperationMethods());
$importer->time('Coordinate Operations', static fn () => $importer->generateDataCoordinateOperations());

printf("TOTAL: %.2fs\n", microtime(true) - $overallStart);
echo '--CODEGEN COMPLETE--' . PHP_EOL;
