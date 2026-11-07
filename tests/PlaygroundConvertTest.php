<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use PHPUnit\Framework\TestCase;

use function abs;
use function array_column;
use function array_map;
use function class_exists;
use function cos;
use function deg2rad;
use function dirname;
use function fclose;
use function file_put_contents;
use function fwrite;
use function is_string;
use function json_decode;
use function json_encode;
use function proc_close;
use function proc_open;
use function floor;
use function log10;
use function rad2deg;
use function round;
use function sin;
use function sprintf;
use function sqrt;
use function stream_get_contents;
use function sys_get_temp_dir;
use function unlink;
use function max;
use function var_export;

use const JSON_THROW_ON_ERROR;
use const PHP_BINARY;
use const DIRECTORY_SEPARATOR;

class PlaygroundConvertTest extends TestCase
{
    public function testStatueOfLibertyToNewYorkLongIsland(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::4269',
            'target' => 'urn:ogc:def:crs:EPSG::2263',
            'values' => [
                'Geodetic latitude' => ['value' => '40.689167', 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
                'Geodetic longitude' => ['value' => '-74.044444', 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($result['error']);
        self::assertSame('urn:ogc:def:crs:EPSG::2263', $result['crs']['srid']);
        self::assertSame('Easting', $result['axes'][0]['name']);
        self::assertSame('Northing', $result['axes'][1]['name']);
        self::assertSame('US survey foot', $result['axes'][0]['unitName']);
        self::assertSame(
            [
                ['name' => 'Easting', 'value' => '0', 'unitName' => 'US survey foot'],
                ['name' => 'Northing', 'value' => '0', 'unitName' => 'US survey foot'],
            ],
            array_map(
                static fn (array $reading): array => [
                    'name' => $reading['name'],
                    'value' => $reading['value'],
                    'unitName' => $reading['unitName'],
                ],
                $result['accuracy'],
            ),
        );
        self::assertSame([], $result['axes'][0]['formats']);
        self::assertSame([], $result['axes'][1]['formats']);
        self::assertSame([], $result['notations']);
        self::assertEqualsWithDelta(971924.52894582, (float) $result['axes'][0]['value'], 0.0001);
        self::assertEqualsWithDelta(190361.6843681, (float) $result['axes'][1]['value'], 0.0001);
        self::assertSame(sprintf('%.2F', round((float) $result['axes'][0]['value'], 2)), $result['axes'][0]['display']);
        self::assertSame(sprintf('%.2F', round((float) $result['axes'][1]['value'], 2)), $result['axes'][1]['display']);
        self::assertSame('15345', $result['route'][0][0]['code']);
        self::assertSame('USA - New York - SPCS - Long Island', $result['route'][0][0]['extent']);
        self::assertFalse($result['route'][0][0]['reverse']);
        self::assertSame([], $result['gridFallback']);
    }

    public function testNelsonsColumnUsesTheGridWhenItsProviderIsLoaded(): void
    {
        if (!class_exists(CoordinateOperation\OSTN15OSGM15Provider::class)) {
            self::markTestSkipped('Europe datapack is not installed');
        }
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::27700',
            'target' => 'urn:ogc:def:crs:EPSG::4326',
            'values' => [
                'Easting' => ['value' => '530017', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
                'Northing' => ['value' => '180419', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($result['error']);
        $codes = [];
        foreach ($result['route'] as $group) {
            foreach ($group as $step) {
                $codes[] = $step['code'];
            }
        }
        self::assertContains('11510', $codes);
        self::assertSame([], $result['gridFallback']);
    }

    public function testIgnoringBoundariesDoesNotReportAMissingDatapack(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::27700',
            'target' => 'urn:ogc:def:crs:EPSG::4326',
            'values' => [
                'Easting' => ['value' => '530017', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
                'Northing' => ['value' => '180419', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => true,
        ]);

        self::assertNull($result['error']);
        self::assertSame([], $result['gridFallback']);
    }

    public function testGridFallbackComesFromAPreferredGridSkip(): void
    {
        $convert = dirname(__DIR__) . '/playground/php/convert.php';
        $probe = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'phpcoord-grid-fallback.php';
        file_put_contents($probe, sprintf(<<<'PHP'
            <?php
            declare(strict_types=1);

            use PHPCoord\Playground\PlaygroundLogger;

            require %s;

            /**
             * @param list<array{level: string, message: string, context: array<string, string>}> $records
             *
             * @return list<array{name: string, code: string, operation: string}>
             */
            function scenario(array $records): array
            {
                $logger = new PlaygroundLogger();
                foreach ($records as $record) {
                    $logger->log($record['level'], $record['message'], $record['context']);
                }

                return PHPCoord\Playground\gridFallbacksFrom($logger);
            }

            $grid = [
                'reason' => 'grid-unavailable',
                'operation' => 'urn:ogc:def:coordinateOperation:EPSG::11510',
                'name' => 'ETRS89-GBR [OSNet v2009] to OSGB36 / British National Grid (3)',
            ];
            $other = [
                'reason' => 'grid-unavailable',
                'operation' => 'urn:ogc:def:coordinateOperation:EPSG::10000',
                'name' => 'Another grid',
            ];
            $selected = ['level' => 'info', 'message' => 'conversion path selected', 'context' => []];
            $skip = static fn (array $context): array => ['level' => 'debug', 'message' => 'conversion path skipped', 'context' => $context];

            echo json_encode([
                'grid' => scenario([$skip($grid), $selected]),
                'boundaries' => scenario([$skip(['reason' => 'boundaries-ignored', 'operation' => $grid['operation'], 'name' => $grid['name']]), $selected]),
                'afterExtent' => scenario([
                    $skip(['reason' => 'extent', 'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1', 'name' => 'Outside']),
                    $skip($grid),
                    $selected,
                ]),
                'afterSelected' => scenario([$selected, $skip($grid)]),
                'carried' => scenario([$skip($grid), $skip(['reason' => 'compound-retry']), $selected]),
                'both' => scenario([$skip($grid), $skip(['reason' => 'compound-retry']), $skip($other), $selected]),
                'nameless' => scenario([$skip(['reason' => 'grid-unavailable', 'operation' => $grid['operation']]), $selected]),
            ], JSON_THROW_ON_ERROR);
            PHP, var_export($convert, true)));

        try {
            $cases = $this->runPhp($probe);
        } finally {
            unlink($probe);
        }

        self::assertSame('11510', $cases['grid'][0]['code']);
        self::assertSame('urn:ogc:def:coordinateOperation:EPSG::11510', $cases['grid'][0]['operation']);
        self::assertSame('ETRS89-GBR [OSNet v2009] to OSGB36 / British National Grid (3)', $cases['grid'][0]['name']);
        self::assertSame([], $cases['boundaries']);
        self::assertSame('11510', $cases['afterExtent'][0]['code']);
        self::assertSame([], $cases['afterSelected']);
        self::assertSame(['11510'], array_column($cases['carried'], 'code'));
        self::assertSame(['10000', '11510'], array_column($cases['both'], 'code'));
        self::assertSame([], $cases['nameless']);
    }

    public function testDegreeOutputListsEveryFormat(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::4269',
            'target' => 'urn:ogc:def:crs:EPSG::4269',
            'values' => [
                'Geodetic latitude' => ['value' => '40.689167', 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
                'Geodetic longitude' => ['value' => '-74.044444', 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($result['error']);
        self::assertSame('Geodetic latitude', $result['axes'][0]['name']);
        self::assertSame('40.689167', $result['axes'][0]['value']);
        self::assertSame('40.68916700', $result['axes'][0]['display']);
        self::assertSame('-74.04444400', $result['axes'][1]['display']);
        self::assertSame(
            ['40.68916700°N', '40°41′21.0012″', '40°41′21.0012″N', 'N40.68916700°', 'N40°41′21.0012″', '40.41210012'],
            array_column($result['axes'][0]['formats'], 'value'),
        );
        self::assertSame(
            ['74.04444400°W', '-74°2′39.9984″', '74°2′39.9984″W', 'W74.04444400°', 'W74°2′39.9984″', '-74.02399984'],
            array_column($result['axes'][1]['formats'], 'value'),
        );
        self::assertSame([], $result['notations']);
        self::assertSame(
            [
                ['name' => 'Geodetic latitude', 'value' => '0', 'unitName' => 'degree'],
                ['name' => 'Geodetic longitude', 'value' => '0', 'unitName' => 'degree'],
            ],
            array_map(
                static fn (array $reading): array => [
                    'name' => $reading['name'],
                    'value' => $reading['value'],
                    'unitName' => $reading['unitName'],
                ],
                $result['accuracy'],
            ),
        );
    }

    public function testAccuracyConvertsMetresIntoDegrees(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::4283',
            'target' => 'urn:ogc:def:crs:EPSG::4326',
            'values' => [
                'Geodetic latitude' => ['value' => '-33.858611', 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
                'Geodetic longitude' => ['value' => '151.214167', 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($result['error']);
        $metres = 0.0;
        foreach ($result['route'] as $group) {
            foreach ($group as $step) {
                $metres += $step['accuracy'] ** 2;
            }
        }
        $metres = sqrt($metres);
        $latitude = deg2rad((float) $result['axes'][0]['value']);
        $semiMajor = 6378137.0;
        $flattening = 1 / 298.257223563;
        $eccentricitySquared = $flattening * (2 - $flattening);
        $sine = sin($latitude);
        $width = sqrt(1 - $eccentricitySquared * $sine ** 2);
        $meridional = $semiMajor * (1 - $eccentricitySquared) / ($width ** 3);
        $parallel = ($semiMajor / $width) * cos($latitude);

        self::assertSame('Geodetic latitude', $result['accuracy'][0]['name']);
        self::assertSame('degree', $result['accuracy'][0]['unitName']);
        self::assertSame('Geodetic longitude', $result['accuracy'][1]['name']);
        self::assertSame('degree', $result['accuracy'][1]['unitName']);
        self::assertSame($result['accuracy'][0]['metres'], $result['accuracy'][1]['metres']);
        self::assertEqualsWithDelta($metres, (float) $result['accuracy'][0]['metres'], 0.00000001);
        self::assertEqualsWithDelta(rad2deg($metres / $meridional), (float) $result['accuracy'][0]['value'], 0.00000001);
        self::assertEqualsWithDelta(rad2deg($metres / $parallel), (float) $result['accuracy'][1]['value'], 0.00000001);
        self::assertSame(self::rounded((float) $result['axes'][0]['value'], (float) $result['accuracy'][0]['value']), $result['axes'][0]['display']);
        self::assertSame(self::rounded((float) $result['axes'][1]['value'], (float) $result['accuracy'][1]['value']), $result['axes'][1]['display']);
        self::assertSame(self::rounded((float) $result['accuracy'][0]['value'], (float) $result['accuracy'][0]['value']), $result['accuracy'][0]['display']);
        self::assertSame(self::rounded((float) $result['accuracy'][1]['value'], (float) $result['accuracy'][1]['value']), $result['accuracy'][1]['display']);
        self::assertSame(self::rounded($metres, $metres), $result['accuracy'][0]['metresDisplay']);

        $reverse = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::4326',
            'target' => 'urn:ogc:def:crs:EPSG::4283',
            'values' => [
                'Geodetic latitude' => ['value' => $result['axes'][0]['value'], 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
                'Geodetic longitude' => ['value' => $result['axes'][1]['value'], 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);
        $reverseDisplay = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::4326',
            'target' => 'urn:ogc:def:crs:EPSG::4283',
            'values' => [
                'Geodetic latitude' => ['value' => $result['axes'][0]['display'], 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
                'Geodetic longitude' => ['value' => $result['axes'][1]['display'], 'unit' => 'urn:ogc:def:uom:EPSG::9102'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);
        self::assertNull($reverse['error']);
        self::assertNull($reverseDisplay['error']);
        $fullError = abs((float) $reverse['axes'][0]['value'] - -33.858611);
        $shownError = abs((float) $reverseDisplay['axes'][0]['value'] - -33.858611);
        self::assertLessThan($shownError, $fullError);
    }

    public function testBritishGridReference(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::27700',
            'target' => 'urn:ogc:def:crs:EPSG::27700',
            'values' => [],
            'notation' => 'tq 30017 80419',
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($result['error']);
        self::assertSame('530017', $result['axes'][0]['value']);
        self::assertSame('180419', $result['axes'][1]['value']);
        self::assertSame('530017.000', $result['axes'][0]['display']);
        self::assertSame(['TQ 30017 80419', 'TQ3001780419'], $result['notations']);
    }

    public function testIrishGridReference(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::29903',
            'target' => 'urn:ogc:def:crs:EPSG::29903',
            'values' => [
                'Easting' => ['value' => '315904', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
                'Northing' => ['value' => '234671', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($result['error']);
        self::assertSame(['O 15904 34671', 'O1590434671'], $result['notations']);

        $fromReference = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::29903',
            'target' => 'urn:ogc:def:crs:EPSG::29903',
            'values' => [],
            'notation' => 'O1590434671',
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);
        self::assertNull($fromReference['error']);
        self::assertSame('315904', $fromReference['axes'][0]['value']);
        self::assertSame('234671', $fromReference['axes'][1]['value']);
    }

    public function testUtmReference(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::32633',
            'target' => 'urn:ogc:def:crs:EPSG::32633',
            'values' => [],
            'notation' => '33N 291789 5034599',
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($result['error']);
        self::assertSame('291789', $result['axes'][0]['value']);
        self::assertSame('5034599', $result['axes'][1]['value']);
        self::assertSame(['33N 291789 5034599'], $result['notations']);

        $southern = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::32756',
            'target' => 'urn:ogc:def:crs:EPSG::32756',
            'values' => [
                'Easting' => ['value' => '334519', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
                'Northing' => ['value' => '6251930', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);
        self::assertNull($southern['error']);
        self::assertSame(['56S 334519 6251930'], $southern['notations']);
    }

    public function testUtmReferenceMustMatchTheZone(): void
    {
        $result = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::32633',
            'target' => 'urn:ogc:def:crs:EPSG::32633',
            'values' => [],
            'notation' => '32N 291789 5034599',
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNotNull($result['error']);
        self::assertSame([], $result['axes']);
    }

    public function testPrefixedUtmReference(): void
    {
        $grid = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::32600',
            'target' => 'urn:ogc:def:crs:EPSG::32600',
            'values' => [],
            'notation' => '33N 291789 5034599',
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);

        self::assertNull($grid['error']);
        self::assertSame('33291789', $grid['axes'][0]['value']);
        self::assertSame('5034599', $grid['axes'][1]['value']);
        self::assertSame(['33N 291789 5034599'], $grid['notations']);

        $zone = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::4647',
            'target' => 'urn:ogc:def:crs:EPSG::4647',
            'values' => [
                'Easting' => ['value' => '32291789', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
                'Northing' => ['value' => '5034599', 'unit' => 'urn:ogc:def:uom:EPSG::9001'],
            ],
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);
        self::assertNull($zone['error']);
        self::assertSame(['32N 291789 5034599'], $zone['notations']);

        $fromReference = $this->convert([
            'source' => 'urn:ogc:def:crs:EPSG::4647',
            'target' => 'urn:ogc:def:crs:EPSG::4647',
            'values' => [],
            'notation' => '32N 291789 5034599',
            'epoch' => null,
            'targetEpoch' => null,
            'ignoreBoundaryRestrictions' => false,
        ]);
        self::assertNull($fromReference['error']);
        self::assertSame('32291789', $fromReference['axes'][0]['value']);
        self::assertSame('5034599', $fromReference['axes'][1]['value']);
    }

    private static function rounded(float $value, float $accuracy): string
    {
        $places = -(int) floor(log10($accuracy) + 1e-10);

        return sprintf('%.' . max(0, $places) . 'F', round($value, $places));
    }

    /**
     * @param array<string, mixed> $problem
     *
     * @return array<string, mixed>
     */
    private function convert(array $problem): array
    {
        $script = dirname(__DIR__) . '/playground/php/convert.php';
        $process = proc_open(
            [PHP_BINARY, $script],
            [
                0 => ['pipe', 'r'],
                1 => ['pipe', 'w'],
                2 => ['pipe', 'w'],
            ],
            $pipes,
        );
        self::assertIsResource($process);
        fwrite($pipes[0], json_encode($problem, JSON_THROW_ON_ERROR));
        fclose($pipes[0]);
        $stdout = stream_get_contents($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        $exit = proc_close($process);

        self::assertSame(0, $exit, is_string($stderr) ? $stderr : '');
        self::assertIsString($stdout);
        $decoded = json_decode($stdout, true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($decoded);

        return $decoded;
    }

    /**
     * @return array<string, mixed>
     */
    private function runPhp(string $script): array
    {
        $process = proc_open(
            [PHP_BINARY, $script],
            [
                0 => ['pipe', 'r'],
                1 => ['pipe', 'w'],
                2 => ['pipe', 'w'],
            ],
            $pipes,
        );
        self::assertIsResource($process);
        fclose($pipes[0]);
        $stdout = stream_get_contents($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        $exit = proc_close($process);

        self::assertSame(0, $exit, (is_string($stderr) ? $stderr : '') . (is_string($stdout) ? $stdout : ''));
        self::assertIsString($stdout);
        $decoded = json_decode($stdout, true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($decoded);

        return $decoded;
    }
}
