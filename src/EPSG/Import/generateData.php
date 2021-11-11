<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use const PHP_EOL;
use PHPCoord\EPSG\Import\EPSGCodegenFromDataImport;
use PHPCoord\EPSG\Import\EPSGCodegenFromGeoRepository;

require __DIR__ . '/../../../vendor/autoload.php';

$fileImporter = new EPSGCodegenFromDataImport();
$webImporter = new EPSGCodegenFromGeoRepository($fileImporter->getBlacklistedOperations());
echo '--PERFORMING CODEGEN--' . PHP_EOL;

$fileImporter->generateDataUnitsOfMeasure();
$fileImporter->generateDataPrimeMeridians();
$fileImporter->generateDataEllipsoids();
$fileImporter->generateDataDatums();
$fileImporter->generateDataCoordinateSystems();
$fileImporter->generateDataCoordinateReferenceSystems();
$fileImporter->generateDataCoordinateOperationMethods();
$fileImporter->generateDataCoordinateOperations();

$webImporter->generateExtents();

echo '--CODEGEN COMPLETE--' . PHP_EOL;
