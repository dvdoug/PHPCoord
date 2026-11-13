<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Playground;

use PHPCoord\CoordinateOperation\CRSTransformationsAfrica;
use PHPCoord\CoordinateOperation\CRSTransformationsAntarctic;
use PHPCoord\CoordinateOperation\CRSTransformationsArctic;
use PHPCoord\CoordinateOperation\CRSTransformationsAsia;
use PHPCoord\CoordinateOperation\CRSTransformationsEurope;
use PHPCoord\CoordinateOperation\CRSTransformationsGlobal;
use PHPCoord\CoordinateOperation\CRSTransformationsNorthAmerica;
use PHPCoord\CoordinateOperation\CRSTransformationsOceania;
use PHPCoord\CoordinateOperation\CRSTransformationsSouthAmerica;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\CoordinateSystem\Ellipsoidal;
use PHPCoord\CoordinateSystem\Vertical as VerticalCoordinateSystem;
use PHPCoord\Datum\Datum;
use PHPCoord\EPSG\Import\EPSGCodegenFromDataImport;
use PHPCoord\Exception\UnknownCoordinateSystemException;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\Geometry\ExtentInteriorPoints;
use PHPCoord\Point\GeocentricPoint;
use PHPCoord\Point\GeographicPoint;
use PHPCoord\Point\NorthAmericanGeographicPoint;
use PHPCoord\Point\ProjectedPoint;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use ReflectionProperty;
use RuntimeException;
use Throwable;

use function array_fill_keys;
use function chdir;
use function count;
use function dirname;
use function file_put_contents;
use function fwrite;
use function ini_set;
use function is_array;
use function is_int;
use function is_file;
use function is_finite;
use function is_string;
use function json_encode;
use function ksort;
use function rtrim;
use function sprintf;
use function str_contains;
use function strrpos;
use function substr;
use function usort;

use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;
use const STDERR;

$repoRoot = dirname(__DIR__, 2);
$autoload = $repoRoot . '/vendor/autoload.php';
if (!is_file($autoload)) {
    throw new RuntimeException('Run composer install before exporting the CRS catalogue.');
}
require $autoload;
require_once $repoRoot . '/tests/Geometry/ExtentInteriorPoints.php';
ini_set('memory_limit', '1G');

$destination = __DIR__ . '/crs-index.json';

$angleUnits = Angle::getSupportedSRIDsWithHelp();
$textualUnits = [
    Angle::EPSG_DEGREE_HEMISPHERE => true,
    Angle::EPSG_DEGREE_MINUTE => true,
    Angle::EPSG_DEGREE_MINUTE_HEMISPHERE => true,
    Angle::EPSG_DEGREE_MINUTE_SECOND => true,
    Angle::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE => true,
    Angle::EPSG_HEMISPHERE_DEGREE => true,
    Angle::EPSG_HEMISPHERE_DEGREE_MINUTE => true,
    Angle::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND => true,
    Angle::EPSG_SEXAGESIMAL_DMS => true,
];

$angleList = [];
foreach ($angleUnits as $srid => $unit) {
    $angleList[] = [
        'srid' => $srid,
        'name' => $unit['name'],
        'textual' => isset($textualUnits[$srid]),
        'help' => $unit['help'],
    ];
}
usort($angleList, static function (array $left, array $right): int {
    if ($left['srid'] === Angle::EPSG_DEGREE) {
        return -1;
    }
    if ($right['srid'] === Angle::EPSG_DEGREE) {
        return 1;
    }

    return $left['name'] <=> $right['name'];
});

$angleSrids = Angle::getSupportedSRIDs();
$coordinateSystemAxes = [];

$axesFor = static function (string $coordinateSystem) use (&$coordinateSystemAxes, $angleSrids): array {
    if (isset($coordinateSystemAxes[$coordinateSystem])) {
        return $coordinateSystemAxes[$coordinateSystem];
    }

    $system = null;
    foreach ([Cartesian::class, Ellipsoidal::class, VerticalCoordinateSystem::class] as $class) {
        try {
            $system = $class::fromSRID($coordinateSystem);
            break;
        } catch (UnknownCoordinateSystemException) {
            continue;
        }
    }
    if (!$system) {
        throw new RuntimeException('Unknown coordinate system ' . $coordinateSystem);
    }

    $axes = [];
    foreach ($system->getAxes() as $axis) {
        $unit = $axis->getUnitOfMeasureId();
        $axes[] = [
            'name' => $axis->getName(),
            'abbreviation' => $axis->getAbbreviation(),
            'unit' => $unit,
            'kind' => isset($angleSrids[$unit]) ? 'angle' : 'length',
        ];
    }

    $coordinateSystemAxes[$coordinateSystem] = $axes;

    return $axes;
};

/** @var array<string, array{kind: string, name: string, axes: list<array{name: string, abbreviation: string, unit: string, kind: string}>}> $bySrid */
$bySrid = [];
/** @var array<string, list<int>> $scopesBySrid */
$scopesBySrid = [];
$kinds = [
    'geographic2d' => Geographic2D::class,
    'geographic3d' => Geographic3D::class,
    'projected' => Projected::class,
    'geocentric' => Geocentric::class,
];
foreach ($kinds as $kind => $class) {
    foreach (sridRows($class) as $srid => $row) {
        if (isset($bySrid[$srid])) {
            throw new RuntimeException('Duplicate CRS ' . $srid);
        }
        if (!isset($row['name'], $row['coordinate_system']) || !is_string($row['name']) || !is_string($row['coordinate_system'])) {
            throw new RuntimeException('CRS ' . $srid . ' has no coordinate system');
        }
        $bySrid[$srid] = [
            'kind' => $kind,
            'name' => $row['name'],
            'axes' => $axesFor($row['coordinate_system']),
        ];
        if (
            ($kind === 'geographic2d' || $kind === 'geographic3d')
            && isset($row['datum'])
            && is_string($row['datum'])
            && NorthAmericanGeographicPoint::usesDatum(Datum::fromSRID($row['datum']))
        ) {
            $bySrid[$srid]['usng'] = true;
        }
        $scopesBySrid[$srid] = usageScopes($row);
    }
}

$verticalRows = sridRows(Vertical::class);
// A CRS that is not an endpoint of a shipped operation cannot be converted.
// A compound that is not itself an endpoint still converts when both of its
// components have operations. A component that only had a missing grid does not.
$endpoints = operationEndpoints();
$omitted = 0;
foreach (sridRows(Compound::class) as $srid => $row) {
    if (isset($bySrid[$srid])) {
        throw new RuntimeException('Duplicate CRS ' . $srid);
    }
    if (!isset($row['name'], $row['horizontal_crs'], $row['vertical_crs']) || !is_string($row['name']) || !is_string($row['horizontal_crs']) || !is_string($row['vertical_crs'])) {
        throw new RuntimeException('Compound CRS ' . $srid . ' is missing a component');
    }
    if (!isset($bySrid[$row['horizontal_crs']])) {
        throw new RuntimeException('Compound CRS ' . $srid . ' has an unknown horizontal CRS');
    }
    $vertical = $verticalRows[$row['vertical_crs']] ?? null;
    if (!is_array($vertical) || !isset($vertical['coordinate_system']) || !is_string($vertical['coordinate_system'])) {
        throw new RuntimeException('Compound CRS ' . $srid . ' has an unknown vertical CRS');
    }
    if (!isset($endpoints[$srid]) && (!isset($endpoints[$row['horizontal_crs']]) || !isset($endpoints[$row['vertical_crs']]))) {
        ++$omitted;
        continue;
    }
    $bySrid[$srid] = [
        'kind' => 'compound',
        'name' => $row['name'],
        'axes' => [
            ...$bySrid[$row['horizontal_crs']]['axes'],
            ...$axesFor($vertical['coordinate_system']),
        ],
    ];
    if (!empty($bySrid[$row['horizontal_crs']]['usng'])) {
        $bySrid[$srid]['usng'] = true;
    }
    $scopesBySrid[$srid] = usageScopes($row);
}
foreach ($bySrid as $srid => $entry) {
    if ($entry['kind'] !== 'compound' && !isset($endpoints[$srid])) {
        unset($bySrid[$srid]);
        ++$omitted;
    }
}
// A blacklisted usage scope marks a project grid or a closed survey frame.
// The CRS and its projection conversion stay in the library.
$blacklistedScopes = array_fill_keys(EPSGCodegenFromDataImport::BLACKLISTED_OPERATION_SCOPES, true);
$scopeOmitted = 0;
foreach ($bySrid as $srid => $entry) {
    foreach ($scopesBySrid[$srid] ?? [] as $scope) {
        if (isset($blacklistedScopes[$scope])) {
            unset($bySrid[$srid]);
            ++$scopeOmitted;
            break;
        }
    }
}

// getParamData() loads operation files from the CoordinateOperation directory.
chdir($repoRoot . '/src/CoordinateOperation');
echo "Writing extent samples\n";
$samples = [];
$sampleFailures = 0;
$sampleCount = 0;
foreach ([
    'geographic2d' => Geographic2D::class,
    'geographic3d' => Geographic3D::class,
    'projected' => Projected::class,
    'geocentric' => Geocentric::class,
] as $kind => $class) {
    foreach (sridRows($class) as $srid => $row) {
        if (!isset($bySrid[$srid])) {
            continue;
        }
        try {
            $samples[$srid] = match ($kind) {
                'geographic2d', 'geographic3d' => geographicSample($row, $bySrid[$srid]['axes']),
                'projected' => projectedSample($srid, $row, $bySrid[$srid]['axes']),
                'geocentric' => geocentricSample($srid, $row, $bySrid[$srid]['axes']),
            };
        } catch (Throwable) {
            $samples[$srid] = [];
            ++$sampleFailures;
        }
        ++$sampleCount;
        if ($sampleCount % 500 === 0) {
            fwrite(STDERR, $sampleCount . " CRS sampled\n");
        }
    }
}
foreach (sridRows(Compound::class) as $srid => $row) {
    if (!isset($bySrid[$srid])) {
        continue;
    }
    if (!isset($row['horizontal_crs']) || !is_string($row['horizontal_crs'])) {
        $samples[$srid] = [];
        continue;
    }
    $horizontal = $samples[$row['horizontal_crs']] ?? [];
    if ($horizontal === []) {
        $samples[$srid] = [];
        continue;
    }
    $sample = $horizontal;
    $vertical = $verticalRows[$row['vertical_crs']] ?? null;
    if (is_array($vertical) && isset($vertical['coordinate_system']) && is_string($vertical['coordinate_system'])) {
        foreach ($axesFor($vertical['coordinate_system']) as $axis) {
            $sample[$axis['name']] = '0';
        }
    }
    $samples[$srid] = $sample;
}
$withSample = 0;
foreach ($samples as $sample) {
    if ($sample !== []) {
        ++$withSample;
    }
}
echo 'Extent samples for ' . $withSample . ' of ' . count($bySrid) . ' coordinate reference systems';
if ($sampleFailures > 0) {
    echo ' (' . $sampleFailures . ' could not be projected)';
}
echo "\n";

$crs = [];
foreach ($bySrid as $srid => $entry) {
    $axes = [];
    foreach ($entry['axes'] as $axis) {
        if (isset($samples[$srid][$axis['name']]) && $samples[$srid][$axis['name']] !== '') {
            $axis['sample'] = $samples[$srid][$axis['name']];
        }
        $axes[] = $axis;
    }
    $record = [
        'srid' => $srid,
        'code' => codeOf($srid),
        'name' => $entry['name'],
        'kind' => $entry['kind'],
        'axes' => $axes,
    ];
    if (!empty($entry['usng'])) {
        $record['usng'] = true;
    }
    $crs[] = $record;
}
usort($crs, static fn (array $left, array $right): int => [$left['name'], $left['code']] <=> [$right['name'], $right['code']]);

$units = UnitOfMeasureFactory::getSupportedSRIDs();
ksort($units);

$encoded = json_encode([
    'degreeUnit' => Angle::EPSG_DEGREE,
    'angleUnits' => $angleList,
    'units' => $units,
    'crs' => $crs,
], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

if (file_put_contents($destination, $encoded) === false) {
    throw new RuntimeException('Could not write ' . $destination);
}

echo 'Wrote ' . count($crs) . ' coordinate reference systems to ' . $destination . ' (' . $omitted . ' omitted with no shipped operation, ' . $scopeOmitted . " omitted with a blacklisted scope)\n";

/**
 * @return array<string, true>
 */
function operationEndpoints(): array
{
    $endpoints = [];
    foreach ([
        CRSTransformationsGlobal::class,
        CRSTransformationsAfrica::class,
        CRSTransformationsAntarctic::class,
        CRSTransformationsArctic::class,
        CRSTransformationsAsia::class,
        CRSTransformationsEurope::class,
        CRSTransformationsNorthAmerica::class,
        CRSTransformationsOceania::class,
        CRSTransformationsSouthAmerica::class,
    ] as $class) {
        foreach ($class::getSupportedTransformations() as $transformation) {
            $endpoints[$transformation['source_crs']] = true;
            $endpoints[$transformation['target_crs']] = true;
        }
    }

    return $endpoints;
}

/**
 * @param class-string $class
 *
 * @return array<string, array<string, mixed>>
 */
function sridRows(string $class): array
{
    $rows = (new ReflectionProperty($class, 'sridData'))->getValue();
    if (!is_array($rows)) {
        throw new RuntimeException($class . ' has no SRID data');
    }

    return $rows;
}

/**
 * @param array<string, mixed> $row
 *
 * @return list<int>
 */
function usageScopes(array $row): array
{
    if (!isset($row['scope']) || !is_array($row['scope'])) {
        return [];
    }

    $scopes = [];
    foreach ($row['scope'] as $scope) {
        if (is_int($scope)) {
            $scopes[] = $scope;
        }
    }

    return $scopes;
}

function codeOf(string $srid): string
{
    $colon = strrpos($srid, ':');

    return $colon === false ? $srid : substr($srid, $colon + 1);
}

/**
 * @param array<string, mixed>                                                        $row
 * @param list<array{name: string, abbreviation: string, unit: string, kind: string}> $axes
 *
 * @return array<string, string>
 */
function geographicSample(array $row, array $axes): array
{
    if (!isset($row['extent'], $row['datum']) || !is_array($row['extent']) || !is_string($row['datum'])) {
        return [];
    }
    $centre = ExtentInteriorPoints::get($row['extent']);
    $longitude = $centre[1]->subtract(Datum::fromSRID($row['datum'])->getPrimeMeridian()->getGreenwichLongitude());
    $samples = [];
    foreach ($axes as $axis) {
        if ($axis['name'] === Axis::GEODETIC_LATITUDE) {
            $samples[$axis['name']] = quantity(Angle::convert($centre[0], $axis['unit'])->getValue());
        } elseif ($axis['name'] === Axis::GEODETIC_LONGITUDE) {
            $samples[$axis['name']] = quantity(Angle::convert($longitude, $axis['unit'])->getValue());
        } elseif ($axis['kind'] === 'length') {
            $samples[$axis['name']] = '0';
        }
    }

    return $samples;
}

/**
 * @param array<string, mixed>                                                        $row
 * @param list<array{name: string, abbreviation: string, unit: string, kind: string}> $axes
 *
 * @return array<string, string>
 */
function projectedSample(string $srid, array $row, array $axes): array
{
    if (!isset($row['extent'], $row['base_crs'], $row['deriving_conversion'], $row['coordinate_system'], $row['name']) || !is_array($row['extent']) || !is_string($row['base_crs']) || !is_string($row['deriving_conversion']) || !is_string($row['coordinate_system']) || !is_string($row['name'])) {
        return [];
    }
    $base = geographicCarrier($row['base_crs']);
    $centre = ExtentInteriorPoints::get($row['extent']);
    $longitude = $centre[1]->subtract($base->getDatum()->getPrimeMeridian()->getGreenwichLongitude());
    $point = GeographicPoint::create(
        $base,
        $centre[0],
        $longitude,
        $base instanceof Geographic3D ? new Metre(0) : null,
    );
    $projected = new Projected(
        $srid,
        Cartesian::fromSRID($row['coordinate_system']),
        $base->getDatum(),
        BoundingArea::createFromExtentCodes($row['extent'], true),
        $row['name'],
        $base,
        $row['deriving_conversion'],
    );
    $result = $point->performOperation($row['deriving_conversion'], $projected, false, new Metre(0));
    if (!$result instanceof ProjectedPoint) {
        return [];
    }

    return lengthSamples($result, $axes);
}

/**
 * @param array<string, mixed>                                                        $row
 * @param list<array{name: string, abbreviation: string, unit: string, kind: string}> $axes
 *
 * @return array<string, string>
 */
function geocentricSample(string $srid, array $row, array $axes): array
{
    if (!isset($row['extent'], $row['datum'], $row['coordinate_system'], $row['name']) || !is_array($row['extent']) || !is_string($row['datum']) || !is_string($row['coordinate_system']) || !is_string($row['name'])) {
        return [];
    }
    $datum = Datum::fromSRID($row['datum']);
    $centre = ExtentInteriorPoints::get($row['extent']);
    $longitude = $centre[1]->subtract($datum->getPrimeMeridian()->getGreenwichLongitude());
    $extent = BoundingArea::createFromExtentCodes($row['extent'], true);
    $geographic = new Geographic2D(
        $srid . ':sample',
        Ellipsoidal::fromSRID(Ellipsoidal::EPSG_2D_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_DEGREE),
        $datum,
        $extent,
        $row['name'],
    );
    $geocentric = new Geocentric(
        $srid,
        Cartesian::fromSRID($row['coordinate_system']),
        $datum,
        $extent,
        $row['name'],
    );
    $point = GeographicPoint::create($geographic, $centre[0], $longitude);

    return lengthSamples($point->geographicGeocentric($geocentric), $axes);
}

function geographicCarrier(string $srid): Geographic2D|Geographic3D
{
    /** @var array<string, Geographic2D|Geographic3D> $cache */
    static $cache = [];
    if (isset($cache[$srid])) {
        return $cache[$srid];
    }
    $data = Geographic2D::getSRIDData($srid);
    if (is_array($data) && isset($data['coordinate_system'], $data['datum'], $data['extent'], $data['name']) && is_string($data['coordinate_system']) && is_string($data['datum']) && is_array($data['extent']) && is_string($data['name'])) {
        $cache[$srid] = new Geographic2D(
            $srid,
            Ellipsoidal::fromSRID($data['coordinate_system']),
            Datum::fromSRID($data['datum']),
            BoundingArea::createFromExtentCodes($data['extent'], true),
            $data['name'],
        );

        return $cache[$srid];
    }
    $data = Geographic3D::getSRIDData($srid);
    if (!is_array($data) || !isset($data['coordinate_system'], $data['datum'], $data['extent'], $data['name']) || !is_string($data['coordinate_system']) || !is_string($data['datum']) || !is_array($data['extent']) || !is_string($data['name'])) {
        throw new RuntimeException('Unknown geographic CRS ' . $srid);
    }
    $cache[$srid] = new Geographic3D(
        $srid,
        Ellipsoidal::fromSRID($data['coordinate_system']),
        Datum::fromSRID($data['datum']),
        BoundingArea::createFromExtentCodes($data['extent'], true),
        $data['name'],
    );

    return $cache[$srid];
}

/**
 * @param list<array{name: string, abbreviation: string, unit: string, kind: string}> $axes
 *
 * @return array<string, string>
 */
function lengthSamples(ProjectedPoint|GeocentricPoint $point, array $axes): array
{
    $samples = [];
    foreach ($axes as $axis) {
        $measure = match ($axis['name']) {
            Axis::EASTING => $point instanceof ProjectedPoint ? $point->getEasting() : null,
            Axis::NORTHING => $point instanceof ProjectedPoint ? $point->getNorthing() : null,
            Axis::WESTING => $point instanceof ProjectedPoint ? $point->getWesting() : null,
            Axis::SOUTHING => $point instanceof ProjectedPoint ? $point->getSouthing() : null,
            Axis::ELLIPSOIDAL_HEIGHT => $point instanceof ProjectedPoint ? ($point->getHeight() ?? new Metre(0)) : null,
            Axis::GEOCENTRIC_X => $point instanceof GeocentricPoint ? $point->getX() : null,
            Axis::GEOCENTRIC_Y => $point instanceof GeocentricPoint ? $point->getY() : null,
            Axis::GEOCENTRIC_Z => $point instanceof GeocentricPoint ? $point->getZ() : null,
            default => null,
        };
        if (!$measure) {
            continue;
        }
        $samples[$axis['name']] = quantity(Length::convert($measure, $axis['unit'])->getValue());
    }

    return $samples;
}

function quantity(float $value): string
{
    if (!is_finite($value)) {
        throw new RuntimeException('Sample coordinate is not finite');
    }
    $text = sprintf('%.8F', $value);
    if (str_contains($text, '.')) {
        $text = rtrim(rtrim($text, '0'), '.');
    }

    return $text === '-0' ? '0' : $text;
}
