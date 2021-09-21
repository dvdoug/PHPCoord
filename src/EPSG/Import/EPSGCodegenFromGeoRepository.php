<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function array_column;
use function class_exists;
use function dirname;
use Exception;
use function file_get_contents;
use function file_put_contents;
use function json_decode;
use const JSON_THROW_ON_ERROR;
use function max;
use function min;
use const PHP_EOL;
use function sleep;
use SQLite3;
use const SQLITE3_ASSOC;
use const SQLITE3_OPEN_READONLY;

class EPSGCodegenFromGeoRepository
{
    public const REGION_GLOBAL = 'Global';
    public const REGION_AFRICA = 'Africa';
    public const REGION_ARCTIC = 'Arctic';
    public const REGION_ANTARCTIC = 'Antarctic';
    public const REGION_ASIA = 'Asia-ExFSU';
    public const REGION_EUROPE = 'Europe-FSU';
    public const REGION_NORTHAMERICA = 'North America';
    public const REGION_SOUTHAMERICA = 'South America';
    public const REGION_OCEANIA = 'Australasia and Oceania';

    private string $sourceDir;

    private SQLite3 $sqlite;

    private Codegen $codeGen;

    public function __construct()
    {
        $this->sourceDir = dirname(__DIR__, 2);
        $this->codeGen = new Codegen();

        $this->sqlite = new SQLite3(
            __DIR__ . '/../../../resources/epsg/epsg.sqlite',
            SQLITE3_OPEN_READONLY
        );
        $this->sqlite->enableExceptions(true);
    }

    public function generateExtents(): void
    {
        echo 'Updating extents...';

        $boundingBoxOnly = $this->sourceDir . '/Geometry/Extents/BoundingBoxOnly/';
        $builtInFull = $this->sourceDir . '/Geometry/Extents/';
        $africa = $this->sourceDir . '/../vendor/php-coord/datapack-africa/src/Geometry/Extents/';
        $antarctic = $this->sourceDir . '/../vendor/php-coord/datapack-antarctic/src/Geometry/Extents/';
        $arctic = $this->sourceDir . '/../vendor/php-coord/datapack-arctic/src/Geometry/Extents/';
        $asia = $this->sourceDir . '/../vendor/php-coord/datapack-asia/src/Geometry/Extents/';
        $europe = $this->sourceDir . '/../vendor/php-coord/datapack-europe/src/Geometry/Extents/';
        $northAmerica = $this->sourceDir . '/../vendor/php-coord/datapack-northamerica/src/Geometry/Extents/';
        $southAmerica = $this->sourceDir . '/../vendor/php-coord/datapack-southamerica/src/Geometry/Extents/';
        $oceania = $this->sourceDir . '/../vendor/php-coord/datapack-oceania/src/Geometry/Extents/';

        $regionMap = require 'ExtentMap.php';

        $sql = "
            SELECT e.extent_code, e.extent_name
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_code = crs.coord_ref_sys_code AND u.object_table_name = 'epsg_coordinatereferencesystem'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0

            UNION

            SELECT e.extent_code, e.extent_name
            FROM epsg_coordoperation o
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0

            GROUP BY e.extent_code
        ";
        $result = $this->sqlite->query($sql);

        $extents = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $extents[$row['extent_code']] = $row['extent_name'];

            if (!isset($regionMap[$row['extent_code']])) {
                throw new Exception("Unknown region for {$row['extent_code']}:{$row['extent_name']}");
            }
        }

        foreach ($extents as $extentCode => $extentName) {
            if (class_exists("PHPCoord\\Geometry\\Extents\\Extent{$extentCode}")) {
                continue;
            }

            sleep(2);

            $region = $regionMap[$extentCode];
            $name = $extents[$extentCode];
            $geoJson = file_get_contents("https://apps.epsg.org/api/v1/Extent/{$extentCode}/polygon/");
            $polygons = json_decode($geoJson, true, 512, JSON_THROW_ON_ERROR);

            $exportSimple = "<?php\ndeclare(strict_types=1);\n\nnamespace PHPCoord\Geometry\Extents\BoundingBoxOnly;\n/**\n * {$region}/{$name}.\n * @internal\n */\nclass Extent{$extentCode}\n{\n    public function __invoke(): array\n    {\n        return\n        [\n";
            $exportFull = "<?php\ndeclare(strict_types=1);\n\nnamespace PHPCoord\Geometry\Extents;\n/**\n * {$region}/{$name}.\n * @internal\n */\nclass Extent{$extentCode}\n{\n    public function __invoke(): array\n    {\n        return\n        [\n";

            if ($polygons['type'] === 'Polygon') {
                $polygons['coordinates'] = [$polygons['coordinates']];
            }

            foreach ($polygons['coordinates'] as $polygon) {
                $outerRingPoints = $polygon[0];
                $xmin = min(array_column($outerRingPoints, 0));
                $xmax = max(array_column($outerRingPoints, 0));
                $ymin = min(array_column($outerRingPoints, 1));
                $ymax = max(array_column($outerRingPoints, 1));
                $exportSimple .= "            [\n                [\n                    ";
                $exportSimple .= "[{$xmax}, {$ymax}], [{$xmin}, {$ymax}], [{$xmin}, {$ymin}], [{$xmax}, {$ymin}], [{$xmax}, {$ymax}],";
                $exportSimple .= "\n                ],\n            ],\n";

                $exportFull .= "            [\n";
                foreach ($polygon as $ring) {
                    $exportFull .= "                [\n                    ";
                    foreach ($ring as $point) {
                        $exportFull .= '[' . $point[0] . ', ' . $point[1] . '], ';
                    }
                    $exportFull .= "\n                ],\n";
                }
                $exportFull .= "            ],\n";
            }
            $exportSimple .= "        ];\n    }\n}\n";
            $exportFull .= "        ];\n    }\n}\n";

            switch ($region) {
                case self::REGION_GLOBAL:
                    file_put_contents($builtInFull . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($builtInFull . "Extent{$extentCode}.php");
                    break;
                case self::REGION_AFRICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($africa . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($africa . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ANTARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($antarctic . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($antarctic . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($arctic . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($arctic . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ASIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($asia . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($asia . "Extent{$extentCode}.php");
                    break;
                case self::REGION_OCEANIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($oceania . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($oceania . "Extent{$extentCode}.php");
                    break;
                case self::REGION_EUROPE:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($europe . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($europe . "Extent{$extentCode}.php");
                    break;
                case self::REGION_NORTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($northAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($northAmerica . "Extent{$extentCode}.php");
                    break;
                case self::REGION_SOUTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($southAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($southAmerica . "Extent{$extentCode}.php");
                    break;
                default:
                    throw new Exception("Unknown region: {$region}");
            }
        }

        echo 'done' . PHP_EOL;
    }
}
