<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function array_column;
use function basename;
use function class_exists;
use function count;
use function dirname;
use Exception;
use function file_get_contents;
use function file_put_contents;
use function glob;
use function implode;
use function in_array;
use function json_decode;
use const JSON_THROW_ON_ERROR;
use function max;
use function min;
use const PHP_EOL;
use PHPCoord\Geometry\Extents\RegionMap;
use function sleep;
use SQLite3;
use const SQLITE3_ASSOC;
use const SQLITE3_OPEN_READONLY;
use function substr;
use function unlink;

class EPSGCodegenFromGeoRepository
{
    private const BUFFER_THRESHOLD = 200; // rough guess at where map maker got bored adding vertices for complex shapes
    private const BUFFER_SIZE = 0.1; // approx 10km

    private string $sourceDir;

    private SQLite3 $sqlite;

    private Codegen $codeGen;

    public function __construct(private array $blackListedOperations)
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

        $regionMap = (new RegionMap())();

        $sql = "
            SELECT e.extent_code, e.extent_name
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_code = crs.coord_ref_sys_code AND u.object_table_name = 'epsg_coordinatereferencesystem'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0
            AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'

            UNION

            SELECT e.extent_code, e.extent_name
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_supersession s ON s.object_table_name = 'epsg_coordoperation' AND s.object_code = o.coord_op_code
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0 AND s.supersession_id IS NULL
            AND o.coord_op_type != 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND o.coord_op_method_code NOT IN (" . implode(',', EPSGCodegenFromDataImport::BLACKLISTED_METHODS) . ')
            AND o.coord_op_code NOT IN (' . implode(',', $this->blackListedOperations) . ")

            UNION

            SELECT e.extent_code, e.extent_name
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND projcrs.deprecated = 0
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_supersession s ON s.object_table_name = 'epsg_coordoperation' AND s.object_code = o.coord_op_code
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0 AND s.supersession_id IS NULL
            AND o.coord_op_type = 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND o.coord_op_method_code NOT IN (" . implode(',', EPSGCodegenFromDataImport::BLACKLISTED_METHODS) . ')
            AND o.coord_op_code NOT IN (' . implode(',', $this->blackListedOperations) . ')

            GROUP BY e.extent_code
        ';
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

            if (in_array($extentCode, [1262, 2346, 2830, 4520, 4523], true)) {
                $polygons['coordinates'] = [[[[-180, -90], [-180, 90], [180, 90], [180, -90], [-180, -90]]]]; // don't overcomplicate it!
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

                $polygon = $this->addBuffer($polygon);
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
                case RegionMap::REGION_GLOBAL:
                    file_put_contents($builtInFull . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($builtInFull . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_AFRICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($africa . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($africa . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_ANTARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($antarctic . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($antarctic . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_ARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($arctic . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($arctic . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_ASIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($asia . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($asia . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_OCEANIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($oceania . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($oceania . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_EUROPE:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($europe . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($europe . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_NORTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($northAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($northAmerica . "Extent{$extentCode}.php");
                    break;
                case RegionMap::REGION_SOUTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($southAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($southAmerica . "Extent{$extentCode}.php");
                    break;
                default:
                    throw new Exception("Unknown region: {$region}");
            }
        }

        // Remove unused extents
        foreach ([$boundingBoxOnly, $builtInFull, $africa, $antarctic, $arctic, $asia, $europe, $northAmerica, $southAmerica, $oceania] as $extentType) {
            foreach (glob($extentType . '/Extent*.php') as $filename) {
                $code = substr(basename($filename, '.php'), 6);
                if (!isset($extents[$code])) {
                    unlink($filename);
                }
            }
        }

        echo 'done' . PHP_EOL;
    }

    private function getCentre(array $vertices): array
    {
        // Calculates the "centre" (centroid) of a polygon.
        $n = count($vertices) - 1;
        $area = 0;

        for ($i = 0; $i < $n; ++$i) {
            $area += $vertices[$i][0] * $vertices[$i + 1][1];
        }
        $area += $vertices[$n][0] * $vertices[0][1];

        for ($i = 0; $i < $n; ++$i) {
            $area -= $vertices[$i + 1][0] * $vertices[$i][1];
        }
        $area -= $vertices[0][0] * $vertices[$n][1];
        $area /= 2;

        $latitude = 0;
        $longitude = 0;

        for ($i = 0; $i < $n; ++$i) {
            $latitude += ($vertices[$i][1] + $vertices[$i + 1][1]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
            $longitude += ($vertices[$i][0] + $vertices[$i + 1][0]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
        }
        $latitude = $latitude / 6 / $area;
        $longitude = $longitude / 6 / $area;

        return [$longitude, $latitude];
    }

    private function addBuffer(array $polygon): array
    {
        [$centreX, $centreY] = $this->getCentre($polygon[0]);
        foreach ($polygon as $ringId => $ring) {
            if ($ringId === 0 && count($ring) > self::BUFFER_THRESHOLD) {
                foreach ($ring as $vertexId => $vertex) {
                    if ($vertex[0] > $centreX) {
                        $polygon[$ringId][$vertexId][0] += self::BUFFER_SIZE;
                    } elseif ($vertex[0] < $centreX) {
                        $polygon[$ringId][$vertexId][0] -= self::BUFFER_SIZE;
                    }

                    if ($vertex[1] > $centreY) {
                        $polygon[$ringId][$vertexId][1] += self::BUFFER_SIZE;
                    } elseif ($vertex[1] < $centreY) {
                        $polygon[$ringId][$vertexId][1] -= self::BUFFER_SIZE;
                    }
                }
            }
        }

        return $polygon;
    }
}
