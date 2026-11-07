<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Playground;

use DateTimeImmutable;
use InvalidArgumentException;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\Exception\InvalidAxesException;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Point\BritishNationalGridPoint;
use PHPCoord\Point\CompoundPoint;
use PHPCoord\Point\GeocentricPoint;
use PHPCoord\Point\GeographicPoint;
use PHPCoord\Point\IrishGridPoint;
use PHPCoord\Point\Point;
use PHPCoord\Point\ProjectedPoint;
use PHPCoord\Point\VerticalPoint;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use RuntimeException;
use Throwable;

use function abs;
use function array_key_exists;
use function array_slice;
use function chdir;
use function cos;
use function dirname;
use function file_get_contents;
use function floor;
use function ini_set;
use function is_array;
use function is_bool;
use function is_dir;
use function is_file;
use function is_finite;
use function is_numeric;
use function is_string;
use function json_decode;
use function json_encode;
use function log10;
use function min;
use function preg_match;
use function realpath;
use function round;
use function rtrim;
use function sin;
use function sprintf;
use function sqrt;
use function str_contains;
use function str_ends_with;
use function str_replace;
use function strlen;
use function strtoupper;
use function strrpos;
use function substr;
use function trim;

use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;

/**
 * Convert one playground coordinate and print the result as JSON.
 *
 * CLI: problem JSON on stdin, or a file path in argv.
 * The docs page writes /phpcoord/problem.json before each run. That runtime
 * does not set $argv, and HTML error pages would make the JSON unreadable.
 * getParamData() requires files from the CoordinateOperation directory.
 */
ini_set('display_errors', '0');
ini_set('html_errors', '0');
ini_set('memory_limit', '512M');

// Checkout: playground/php/convert.php, vendor/autoload.php two directories up.
// Installed in a datapack: that autoload belongs to the project that required
// this package, further up the tree. Browser: /phpcoord/playground/convert.php
// and /phpcoord/autoload.php. Operation files are required from this package's
// src/CoordinateOperation, not from the installing project.
$libraryRoot = null;
$autoload = null;
$directory = __DIR__;
while (true) {
    if ($libraryRoot === null && is_dir($directory . '/src/CoordinateOperation')) {
        $libraryRoot = $directory;
    }
    if ($autoload === null && is_file($directory . '/vendor/autoload.php')) {
        $autoload = $directory . '/vendor/autoload.php';
    }
    if ($libraryRoot !== null && $autoload !== null) {
        break;
    }
    if ($libraryRoot !== null && is_file($libraryRoot . '/autoload.php')) {
        $autoload = $libraryRoot . '/autoload.php';
        break;
    }
    $parent = dirname($directory);
    if ($parent === $directory) {
        break;
    }
    $directory = $parent;
}
if (!is_string($libraryRoot) || !is_string($autoload)) {
    throw new RuntimeException('Could not find the PHPCoord library root and autoload file');
}
require $autoload;

require_once __DIR__ . '/PlaygroundLogger.php';

chdir($libraryRoot . '/src/CoordinateOperation');

/**
 * @param array<int, mixed> $argv
 */
function readProblem(array $argv): string
{
    if (is_file('/phpcoord/problem.json')) {
        $contents = file_get_contents('/phpcoord/problem.json');
        if ($contents === false || $contents === '') {
            throw new InvalidArgumentException('Could not read the problem file');
        }

        return $contents;
    }

    foreach (array_slice($argv, 1) as $arg) {
        if (!is_string($arg) || !is_file($arg) || str_ends_with($arg, '.php')) {
            continue;
        }
        $contents = file_get_contents($arg);
        if ($contents === false) {
            throw new InvalidArgumentException('Could not read the problem file');
        }

        return $contents;
    }

    $stdin = file_get_contents('php://stdin');
    if ($stdin === false || $stdin === '') {
        throw new InvalidArgumentException('No coordinate was provided');
    }

    return $stdin;
}

/**
 * @param array<string, mixed> $problem
 *
 * @return array{crs: array{srid: string, name: string, code: string}, axes: list<array{name: string, abbreviation: string, value: string, display: string, unit: string, unitName: string, formats: list<array{value: string, unit: string, unitName: string}>}>, notations: list<string>, accuracy: list<array{name: string, value: string, display: string, unit: string, unitName: string, metres: string, metresDisplay: string}>, route: list<list<array{name: string, operation: string, code: string, reverse: bool, accuracy: float, extent: string, slideBefore: float|null, slideAfter: float|null}>>, gridFallback: list<array{name: string, code: string, operation: string}>, unchanged: bool, error: null}
 */
function convertProblem(array $problem): array
{
    $source = CoordinateReferenceSystem::fromSRID(readSrid($problem, 'source'));
    $target = CoordinateReferenceSystem::fromSRID(readSrid($problem, 'target'));
    if ($source instanceof Vertical || $target instanceof Vertical) {
        throw new InvalidArgumentException('A vertical CRS has to be used as part of a compound CRS');
    }
    if (!isset($problem['values']) || !is_array($problem['values'])) {
        throw new InvalidArgumentException('values must be an object');
    }
    $ignoreBoundaryRestrictions = $problem['ignoreBoundaryRestrictions'] ?? false;
    if (!is_bool($ignoreBoundaryRestrictions)) {
        throw new InvalidArgumentException('ignoreBoundaryRestrictions must be a boolean');
    }

    $epoch = readDate(readOptionalString($problem, 'epoch'), 'Coordinate epoch');
    $targetEpoch = readDate(readOptionalString($problem, 'targetEpoch'), 'Target epoch');
    $notation = readOptionalString($problem, 'notation');
    if ($notation !== null) {
        $notation = trim($notation);
        if ($notation === '') {
            $notation = null;
        }
    }
    $point = createPoint($source, $problem['values'], $epoch, $notation);
    $logger = new PlaygroundLogger();
    $point->enableDebug($logger);
    $result = $point->convert($target, $ignoreBoundaryRestrictions, $targetEpoch);
    $route = routeFrom($logger);
    $metres = pathAccuracyMetres($route);

    return [
        'crs' => describeCrs($result->getCRS()),
        'axes' => describePoint($result, $metres),
        'notations' => pointNotations($result, $metres),
        'accuracy' => describeAccuracy($result, $metres),
        'route' => $route,
        'gridFallback' => gridFallbacksFrom($logger),
        'unchanged' => $route === [] && $source->getSRID() === $result->getCRS()->getSRID(),
        'error' => null,
    ];
}

/**
 * @param array<string, mixed> $problem
 */
function readSrid(array $problem, string $key): string
{
    if (!isset($problem[$key]) || !is_string($problem[$key]) || $problem[$key] === '') {
        throw new InvalidArgumentException($key . ' must be a coordinate reference system id');
    }

    return $problem[$key];
}

/**
 * @param array<string, mixed> $problem
 */
function readOptionalString(array $problem, string $key): ?string
{
    if (!array_key_exists($key, $problem) || $problem[$key] === null) {
        return null;
    }
    if (!is_string($problem[$key])) {
        throw new InvalidArgumentException($key . ' must be a string');
    }

    return $problem[$key];
}

function readDate(?string $value, string $label): ?DateTimeImmutable
{
    if ($value === null || trim($value) === '') {
        return null;
    }
    $date = DateTimeImmutable::createFromFormat('!Y-m-d', trim($value));
    $errors = DateTimeImmutable::getLastErrors();
    if (!$date || ($errors && ($errors['warning_count'] > 0 || $errors['error_count'] > 0))) {
        throw new InvalidArgumentException($label . ' must be a YYYY-MM-DD date');
    }

    return $date;
}

/**
 * @param array<mixed> $values
 */
function createPoint(CoordinateReferenceSystem $crs, array $values, ?DateTimeImmutable $epoch, ?string $notation = null): Point
{
    if ($notation !== null && !$crs instanceof Projected && !$crs instanceof Compound) {
        throw new InvalidArgumentException('This coordinate reference system does not use a grid or UTM reference.');
    }
    if ($crs instanceof Compound) {
        $horizontal = createPoint($crs->getHorizontal(), $values, $epoch, $notation);
        $vertical = createPoint($crs->getVertical(), $values, $epoch);
        if (!$horizontal instanceof GeographicPoint && !$horizontal instanceof ProjectedPoint) {
            throw new InvalidArgumentException('A compound CRS needs a geographic or projected horizontal coordinate');
        }
        if (!$vertical instanceof VerticalPoint) {
            throw new InvalidArgumentException('A compound CRS needs a vertical coordinate');
        }

        return CompoundPoint::create($crs, $horizontal, $vertical, $epoch);
    }

    if ($crs instanceof Geographic2D || $crs instanceof Geographic3D) {
        return GeographicPoint::create(
            $crs,
            angleValue($values, Axis::GEODETIC_LATITUDE),
            angleValue($values, Axis::GEODETIC_LONGITUDE),
            $crs instanceof Geographic3D ? lengthValue($values, Axis::ELLIPSOIDAL_HEIGHT) : null,
            $epoch,
        );
    }

    if ($crs instanceof Projected) {
        if ($notation !== null) {
            return projectedPointFromNotation($crs, $notation, $values, $epoch);
        }
        $system = $crs->getCoordinateSystem();

        return ProjectedPoint::create(
            $crs,
            lengthIfPresent($system, $values, Axis::EASTING),
            lengthIfPresent($system, $values, Axis::NORTHING),
            lengthIfPresent($system, $values, Axis::WESTING),
            lengthIfPresent($system, $values, Axis::SOUTHING),
            $epoch,
            $system->hasAxisByName(Axis::ELLIPSOIDAL_HEIGHT) ? lengthValue($values, Axis::ELLIPSOIDAL_HEIGHT) : null,
        );
    }

    if ($crs instanceof Geocentric) {
        return GeocentricPoint::create(
            $crs,
            lengthValue($values, Axis::GEOCENTRIC_X),
            lengthValue($values, Axis::GEOCENTRIC_Y),
            lengthValue($values, Axis::GEOCENTRIC_Z),
            $epoch,
        );
    }

    if ($crs instanceof Vertical) {
        $axes = $crs->getCoordinateSystem()->getAxes();

        return VerticalPoint::create($crs, lengthValue($values, $axes[0]->getName()), $epoch);
    }

    throw new InvalidArgumentException('Unsupported coordinate reference system ' . $crs->getSRID());
}

/**
 * @param array<mixed> $values
 */
function lengthIfPresent(CoordinateSystem $system, array $values, string $axisName): ?Length
{
    if (!$system->hasAxisByName($axisName)) {
        return null;
    }

    return lengthValue($values, $axisName);
}

/**
 * @param array<mixed> $values
 *
 * @return array{value: string, unit: string}
 */
function measurement(array $values, string $axisName): array
{
    if (!isset($values[$axisName]) || !is_array($values[$axisName])) {
        throw new InvalidArgumentException('Enter a value for ' . $axisName);
    }
    $entry = $values[$axisName];
    if (!isset($entry['value'], $entry['unit']) || !is_string($entry['value']) || !is_string($entry['unit'])) {
        throw new InvalidArgumentException('Enter a value for ' . $axisName);
    }
    $value = trim($entry['value']);
    if ($value === '' || $entry['unit'] === '') {
        throw new InvalidArgumentException('Enter a value for ' . $axisName);
    }

    return ['value' => $value, 'unit' => $entry['unit']];
}

/**
 * @param array<mixed> $values
 */
function angleValue(array $values, string $axisName): Angle
{
    $entry = measurement($values, $axisName);

    return Angle::makeUnit($entry['value'], $entry['unit']);
}

/**
 * @param array<mixed> $values
 */
function lengthValue(array $values, string $axisName): Length
{
    $entry = measurement($values, $axisName);
    if (!is_numeric($entry['value'])) {
        throw new InvalidArgumentException($axisName . ' must be a number');
    }

    return Length::makeUnit((float) $entry['value'], $entry['unit']);
}

/**
 * @param array<mixed> $values
 */
function projectedPointFromNotation(Projected $crs, string $notation, array $values, ?DateTimeImmutable $epoch): ProjectedPoint
{
    $system = $crs->getCoordinateSystem();
    $height = $system->hasAxisByName(Axis::ELLIPSOIDAL_HEIGHT) ? lengthValue($values, Axis::ELLIPSOIDAL_HEIGHT) : null;
    if ($crs->getSRID() === Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID) {
        return BritishNationalGridPoint::fromGridReference(cleanGridReference($notation, 2), $epoch);
    }
    if ($crs->getSRID() === Projected::EPSG_TM75_IRISH_GRID) {
        return IrishGridPoint::fromGridReference(cleanGridReference($notation, 1), $epoch);
    }

    $utm = utmFromCrs($crs);
    if (!$utm) {
        throw new InvalidArgumentException('This coordinate reference system does not use a grid or UTM reference.');
    }
    $parsed = parseUtmReference($notation);
    if ($parsed['hemisphere'] !== $utm['hemisphere'] || ($utm['zone'] !== null && $parsed['zone'] !== $utm['zone'])) {
        throw new InvalidArgumentException(utmMismatchMessage($utm));
    }
    $easting = $parsed['easting'];
    if ($utm['prefixed']) {
        $easting += $parsed['zone'] * 1000000;
    }

    return ProjectedPoint::create($crs, new Metre($easting), new Metre($parsed['northing']), null, null, $epoch, $height);
}

/**
 * Letters plus an even run of digits. British references use two letters, Irish references one.
 */
function cleanGridReference(string $notation, int $letters): string
{
    $example = $letters === 2 ? 'TQ 30017 80419' : 'O 15904 34671';
    $compact = strtoupper(str_replace(' ', '', $notation));
    $gridLetters = 'VWXYZQRSTULMNOPFGHJKABCDE';
    $letterCount = 0;
    while ($letterCount < strlen($compact) && str_contains($gridLetters, $compact[$letterCount])) {
        ++$letterCount;
    }
    $digits = substr($compact, $letterCount);
    if ($letterCount !== $letters || strlen($digits) > 10 || strlen($digits) % 2 !== 0 || ($digits !== '' && !preg_match('/^\d+$/', $digits))) {
        throw new InvalidArgumentException('Enter a grid reference such as ' . $example . '.');
    }

    return $compact;
}

/**
 * @return array{zone: int, hemisphere: string, easting: float, northing: float}
 */
function parseUtmReference(string $notation): array
{
    $text = strtoupper(trim($notation));
    if (!preg_match('/^(\d{1,2})\s*([NS])\s+([+-]?(?:\d+\.?\d*|\.\d+))\s+([+-]?(?:\d+\.?\d*|\.\d+))$/', $text, $match) || $match[1][0] === '0') {
        throw new InvalidArgumentException('Enter a UTM reference such as 33N 291789 5034599.');
    }
    $zone = (int) $match[1];
    if ($zone < 1 || $zone > 60) {
        throw new InvalidArgumentException('Enter a UTM reference such as 33N 291789 5034599.');
    }

    return [
        'zone' => $zone,
        'hemisphere' => $match[2],
        'easting' => (float) $match[3],
        'northing' => (float) $match[4],
    ];
}

/**
 * Catalogue UTM zone, or a zone whose easting is stored with the zone prefix.
 *
 * @return array{zone: int|null, hemisphere: string, prefixed: bool}|null
 */
function utmFromCrs(Projected $crs): ?array
{
    if (preg_match('/^urn:ogc:def:coordinateOperation:EPSG::(\d+)$/', $crs->getDerivingConversion(), $match)) {
        $code = (int) $match[1];
        if ($code >= 16001 && $code <= 16060) {
            return ['zone' => $code - 16000, 'hemisphere' => 'N', 'prefixed' => false];
        }
        if ($code >= 16101 && $code <= 16160) {
            return ['zone' => $code - 16100, 'hemisphere' => 'S', 'prefixed' => false];
        }
        if ($code === 16000 || $code === 16100) {
            return ['zone' => null, 'hemisphere' => $code === 16000 ? 'N' : 'S', 'prefixed' => true];
        }
    }
    // "UTM zone 32N (zE-N)" keeps the zone number in the easting. The deriving
    // conversion is the prefixed transverse Mercator, not EPSG:16032.
    if (str_contains($crs->getName(), 'zE') && preg_match('/UTM zone (\d{1,2})([NS])\b/', $crs->getName(), $zone)) {
        return ['zone' => (int) $zone[1], 'hemisphere' => $zone[2], 'prefixed' => true];
    }

    return null;
}

/**
 * @param array{zone: int|null, hemisphere: string, prefixed: bool} $utm
 */
function utmMismatchMessage(array $utm): string
{
    if ($utm['zone'] === null) {
        $hemisphere = $utm['hemisphere'] === 'N' ? 'northern' : 'southern';

        return 'This CRS is the ' . $hemisphere . ' hemisphere UTM grid system.';
    }

    return 'This CRS is UTM zone ' . $utm['zone'] . $utm['hemisphere'] . '.';
}

/**
 * Custom grid and UTM strings. Numeric axes stay first.
 *
 * @return list<string>
 */
function pointNotations(Point $point, float $metres): array
{
    if ($point instanceof CompoundPoint) {
        return pointNotations($point->getHorizontalPoint(), $metres);
    }
    if (!$point instanceof ProjectedPoint) {
        return [];
    }
    $grid = gridNotations($point, $metres);
    if ($grid !== []) {
        return $grid;
    }

    return utmNotations($point, $metres);
}

/**
 * Spaced reference, then the same reference without spaces, at the displayed metre precision.
 *
 * @return list<string>
 */
function gridNotations(ProjectedPoint $point, float $metres): array
{
    $british = $point->getCRS()->getSRID() === Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID;
    $irish = $point->getCRS()->getSRID() === Projected::EPSG_TM75_IRISH_GRID;
    if (!$british && !$irish) {
        return [];
    }
    $places = $metres > 0 ? placesForAccuracy($metres) : placesForMillimetre(0.001);
    $length = gridFigureLength($places);
    $easting = round($point->getEasting()->asMetres()->getValue(), $places);
    $northing = round($point->getNorthing()->asMetres()->getValue(), $places);
    $rounded = $british
        ? new BritishNationalGridPoint(new Metre($easting), new Metre($northing))
        : new IrishGridPoint(new Metre($easting), new Metre($northing));
    try {
        $spaced = $rounded->asGridReferenceWithSpaces($length);
        $compact = $rounded->asGridReference($length);
        $back = $british
            ? BritishNationalGridPoint::fromGridReference($compact)
            : IrishGridPoint::fromGridReference($compact);
    } catch (InvalidCoordinateException) {
        return [];
    }
    $expectedEasting = (float) (int) $easting;
    $expectedNorthing = (float) (int) $northing;
    if (abs($back->getEasting()->asMetres()->getValue() - $expectedEasting) > 0.001 || abs($back->getNorthing()->asMetres()->getValue() - $expectedNorthing) > 0.001) {
        return [];
    }

    return [$spaced, $compact];
}

/**
 * 10 figures is 1 m. Coarser accuracy steps out by two figures, down to 2.
 */
function gridFigureLength(int $metrePlaces): int
{
    if ($metrePlaces >= 0) {
        return 10;
    }
    $length = 10 + (2 * $metrePlaces);
    if ($length < 2) {
        return 2;
    }

    return $length;
}

/**
 * The UTMPoint string, in whole metres or the coarser displayed step.
 *
 * @return list<string>
 */
function utmNotations(ProjectedPoint $point, float $metres): array
{
    $utm = utmFromCrs($point->getCRS());
    if (!$utm) {
        return [];
    }
    $places = $metres > 0 ? placesForAccuracy($metres) : placesForMillimetre(0.001);
    $places = min($places, 0);
    $easting = round($point->getEasting()->asMetres()->getValue(), $places);
    $northing = round($point->getNorthing()->asMetres()->getValue(), $places);
    $zone = $utm['zone'];
    if ($utm['prefixed']) {
        $zone = (int) floor($easting / 1000000);
        $easting -= $zone * 1000000;
        if ($utm['zone'] !== null && $zone !== $utm['zone']) {
            return [];
        }
    }
    if ($zone === null || $zone < 1 || $zone > 60) {
        return [];
    }

    return [$zone . $utm['hemisphere'] . ' ' . formatRounded($easting, $places) . ' ' . formatRounded($northing, $places)];
}

/**
 * @return list<array{name: string, abbreviation: string, value: string, display: string, unit: string, unitName: string, formats: list<array{value: string, unit: string, unitName: string}>}>
 */
function describePoint(Point $point, float $metres): array
{
    if ($point instanceof CompoundPoint) {
        return [
            ...describePoint($point->getHorizontalPoint(), $metres),
            ...describePoint($point->getVerticalPoint(), $metres),
        ];
    }

    $geographic = geographicAccuracyPoint($point);
    $accuracyByName = [];
    foreach (describeAccuracy($point, $metres) as $reading) {
        $accuracyByName[$reading['name']] = $reading;
    }

    $described = [];
    foreach ($point->getCRS()->getCoordinateSystem()->getAxes() as $axis) {
        $measure = measureForAxis($point, $axis);
        $unit = $axis->getUnitOfMeasureId();
        $converted = $measure instanceof Angle ? Angle::convert($measure, $unit) : Length::convert($measure, $unit);
        $full = $converted->getValue();
        $places = displayDecimals($axis, $geographic, $accuracyByName[$axis->getName()] ?? null);
        $formats = [];
        if ($unit === Angle::EPSG_DEGREE) {
            $degrees = $converted->asDegrees();
            $full = $degrees->getValue();
            $formats = degreeReadouts($degrees, $axis->getName() === Axis::GEODETIC_LATITUDE, $places);
        }
        $described[] = [
            'name' => $axis->getName(),
            'abbreviation' => $axis->getAbbreviation(),
            'value' => formatExact($full),
            'display' => formatRounded($full, $places),
            'unit' => $unit,
            'unitName' => unitName($unit),
            'formats' => $formats,
        ];
    }

    return $described;
}

/**
 * Every degree representation from the input list, after the decimal line.
 *
 * @return list<array{value: string, unit: string, unitName: string}>
 */
function degreeReadouts(Degree $degrees, bool $latitude, int $places): array
{
    $readouts = [];
    foreach ([
        Angle::EPSG_DEGREE_HEMISPHERE,
        Angle::EPSG_DEGREE_MINUTE_SECOND,
        Angle::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE,
        Angle::EPSG_HEMISPHERE_DEGREE,
        Angle::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND,
        Angle::EPSG_SEXAGESIMAL_DMS,
    ] as $srid) {
        $readouts[] = [
            'value' => $degrees->formatAs($srid, $latitude, $places),
            'unit' => $srid,
            'unitName' => unitName($srid),
        ];
    }

    return $readouts;
}

function measureForAxis(Point $point, Axis $axis): Angle|Length
{
    $name = $axis->getName();
    if ($point instanceof GeographicPoint) {
        return match ($name) {
            Axis::GEODETIC_LATITUDE => $point->getLatitude(),
            Axis::GEODETIC_LONGITUDE => $point->getLongitude(),
            Axis::ELLIPSOIDAL_HEIGHT => $point->getHeight() ?? throw new InvalidArgumentException('Missing ' . $name),
            default => throw new InvalidAxesException($point->getCRS()->getCoordinateSystem()->getAxes()),
        };
    }
    if ($point instanceof ProjectedPoint) {
        return match ($name) {
            Axis::EASTING => $point->getEasting(),
            Axis::NORTHING => $point->getNorthing(),
            Axis::WESTING => $point->getWesting(),
            Axis::SOUTHING => $point->getSouthing(),
            Axis::ELLIPSOIDAL_HEIGHT => $point->getHeight() ?? throw new InvalidArgumentException('Missing ' . $name),
            default => throw new InvalidAxesException($point->getCRS()->getCoordinateSystem()->getAxes()),
        };
    }
    if ($point instanceof GeocentricPoint) {
        return match ($name) {
            Axis::GEOCENTRIC_X => $point->getX(),
            Axis::GEOCENTRIC_Y => $point->getY(),
            Axis::GEOCENTRIC_Z => $point->getZ(),
            default => throw new InvalidAxesException($point->getCRS()->getCoordinateSystem()->getAxes()),
        };
    }
    if ($point instanceof VerticalPoint) {
        return $point->getHeight();
    }

    throw new InvalidArgumentException('Unsupported point ' . $point::class);
}

/**
 * @return array{srid: string, name: string, code: string}
 */
function describeCrs(CoordinateReferenceSystem $crs): array
{
    return [
        'srid' => $crs->getSRID(),
        'name' => $crs->getName(),
        'code' => codeOf($crs->getSRID()),
    ];
}

/**
 * @return list<list<array{name: string, operation: string, code: string, reverse: bool, accuracy: float, extent: string, slideBefore: float|null, slideAfter: float|null}>>
 */
function routeFrom(PlaygroundLogger $logger): array
{
    $groups = [];
    foreach ($logger->records as $record) {
        if ($record['level'] !== 'info' || $record['message'] !== 'conversion path selected') {
            continue;
        }
        $steps = $record['context']['steps'] ?? null;
        if (!is_array($steps)) {
            continue;
        }
        $group = [];
        foreach ($steps as $step) {
            if (!is_array($step) || !isset($step['operation'], $step['name']) || !is_string($step['operation']) || !is_string($step['name'])) {
                continue;
            }
            $group[] = [
                'name' => $step['name'],
                'operation' => $step['operation'],
                'code' => codeOf($step['operation']),
                'reverse' => (bool) ($step['in_reverse'] ?? false),
                'accuracy' => (float) ($step['accuracy'] ?? 0),
                'extent' => is_string($step['extent_name'] ?? null) ? $step['extent_name'] : '',
                'slideBefore' => isset($step['slide_before']) && is_numeric($step['slide_before']) ? (float) $step['slide_before'] : null,
                'slideAfter' => isset($step['slide_after']) && is_numeric($step['slide_after']) ? (float) $step['slide_after'] : null,
            ];
        }
        $groups[] = $group;
    }

    return $groups;
}

/**
 * Candidates are tried best-first, and the first one that validates is selected.
 * A grid-unavailable skip before that selection is a preferred route whose grid
 * provider is not loaded. boundaries-ignored is a different skip. A compound
 * search that fails carries that missing grid onto the route selected afterwards.
 *
 * @return list<array{name: string, code: string, operation: string}>
 */
function gridFallbacksFrom(PlaygroundLogger $logger): array
{
    $grid = null;
    $carried = null;
    $fallbacks = [];
    $seen = [];
    foreach ($logger->records as $record) {
        $context = $record['context'];
        if ($record['level'] === 'debug' && $record['message'] === 'conversion path skipped') {
            $reason = $context['reason'] ?? null;
            if ($reason === 'compound-retry') {
                if ($grid !== null && $carried === null) {
                    $carried = $grid;
                }
                $grid = null;
                continue;
            }
            if ($reason === 'grid-unavailable' && $grid === null) {
                $grid = skippedGrid($context);
            }
            continue;
        }
        if ($record['level'] !== 'info' || $record['message'] !== 'conversion path selected') {
            continue;
        }
        foreach ([$grid, $carried] as $fallback) {
            if ($fallback === null || isset($seen[$fallback['operation']])) {
                continue;
            }
            $seen[$fallback['operation']] = true;
            $fallbacks[] = $fallback;
        }
        $grid = null;
        $carried = null;
    }

    return $fallbacks;
}

/**
 * @param array<mixed> $context
 *
 * @return array{name: string, code: string, operation: string}|null
 */
function skippedGrid(array $context): ?array
{
    $operation = $context['operation'] ?? null;
    $name = $context['name'] ?? null;
    if (!is_string($operation) || $operation === '' || !is_string($name) || $name === '') {
        return null;
    }

    return [
        'name' => $name,
        'code' => codeOf($operation),
        'operation' => $operation,
    ];
}

/**
 * Root-sum-square of the published hop accuracies, in metres.
 *
 * @param list<list<array{accuracy: float}>> $route
 */
function pathAccuracyMetres(array $route): float
{
    $squares = 0.0;
    foreach ($route as $group) {
        foreach ($group as $step) {
            $squares += $step['accuracy'] ** 2;
        }
    }

    return sqrt($squares);
}

/**
 * Horizontal accuracy in each output axis unit. Latitude and longitude use the
 * local ellipsoid scale, because a metre is a different angle on each axis.
 *
 * @return list<array{name: string, value: string, display: string, unit: string, unitName: string, metres: string, metresDisplay: string}>
 */
function describeAccuracy(Point $point, float $metres): array
{
    $geographic = geographicAccuracyPoint($point);
    $readings = [];
    $metrePlaces = $metres > 0 ? placesForAccuracy($metres) : 0;
    foreach (accuracyAxes($point) as $axis) {
        $converted = accuracyInAxisUnit($metres, $axis, $geographic);
        if ($converted === null) {
            continue;
        }
        $unit = $axis->getUnitOfMeasureId();
        $places = $converted > 0 ? placesForAccuracy($converted) : 0;
        $readings[] = [
            'name' => $axis->getName(),
            'value' => formatExact($converted),
            'display' => formatRounded($converted, $places),
            'unit' => $unit,
            'unitName' => unitName($unit),
            'metres' => formatExact($metres),
            'metresDisplay' => formatRounded($metres, $metrePlaces),
        ];
    }

    return $readings;
}

function geographicAccuracyPoint(Point $point): ?GeographicPoint
{
    if ($point instanceof CompoundPoint) {
        $horizontal = $point->getHorizontalPoint();

        return $horizontal instanceof GeographicPoint ? $horizontal : null;
    }

    return $point instanceof GeographicPoint ? $point : null;
}

/**
 * @return list<Axis>
 */
function accuracyAxes(Point $point): array
{
    if ($point instanceof CompoundPoint) {
        return [
            ...accuracyAxes($point->getHorizontalPoint()),
            ...accuracyAxes($point->getVerticalPoint()),
        ];
    }

    $axes = [];
    foreach ($point->getCRS()->getCoordinateSystem()->getAxes() as $axis) {
        if (!isVerticalAxis($axis->getName())) {
            $axes[] = $axis;
        }
    }

    return $axes;
}

function isVerticalAxis(string $name): bool
{
    return $name === Axis::ELLIPSOIDAL_HEIGHT
        || $name === Axis::GRAVITY_RELATED_HEIGHT
        || $name === Axis::DEPTH
        || $name === Axis::LOCAL_DEPTH;
}

function accuracyInAxisUnit(float $metres, Axis $axis, ?GeographicPoint $geographic): ?float
{
    $unit = $axis->getUnitOfMeasureId();
    if (array_key_exists($unit, Angle::getSupportedSRIDs())) {
        if (!$geographic instanceof GeographicPoint) {
            return null;
        }

        return metresToAngle($metres, $axis, $geographic);
    }

    return Length::convert(new Metre($metres), $unit)->getValue();
}

function metresToAngle(float $metres, Axis $axis, GeographicPoint $point): ?float
{
    $radius = groundRadiusMetres($point, $axis->getName() === Axis::GEODETIC_LONGITUDE);
    if ($radius === null) {
        return null;
    }

    return Angle::convert(new Radian($metres / $radius), $axis->getUnitOfMeasureId())->getValue();
}

/**
 * Meridional radius, or the parallel radius for longitude. Null when a
 * longitude degree covers no ground.
 */
function groundRadiusMetres(GeographicPoint $point, bool $alongParallel): ?float
{
    $ellipsoid = $point->getCRS()->getDatum()->getEllipsoid();
    $semiMajor = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
    $eccentricitySquared = $ellipsoid->getEccentricitySquared();
    $latitude = $point->getLatitude()->asRadians()->getValue();
    $sine = sin($latitude);
    $width = sqrt(1 - $eccentricitySquared * $sine ** 2);
    $meridional = $semiMajor * (1 - $eccentricitySquared) / ($width ** 3);
    $radius = $alongParallel ? ($semiMajor / $width) * cos($latitude) : $meridional;
    if (abs($radius) < 1) {
        return null;
    }

    return abs($radius);
}

/**
 * @param array{value: string}|null $reading
 */
function displayDecimals(Axis $axis, ?GeographicPoint $geographic, ?array $reading): int
{
    if ($reading !== null && (float) $reading['value'] > 0) {
        return placesForAccuracy((float) $reading['value']);
    }

    return placesForMillimetre(millimetreInUnit($axis, $geographic));
}

function millimetreInUnit(Axis $axis, ?GeographicPoint $geographic): float
{
    $unit = $axis->getUnitOfMeasureId();
    if (!array_key_exists($unit, Angle::getSupportedSRIDs())) {
        return Length::convert(new Metre(0.001), $unit)->getValue();
    }
    $alongParallel = $axis->getName() === Axis::GEODETIC_LONGITUDE;
    $radius = $geographic instanceof GeographicPoint ? groundRadiusMetres($geographic, $alongParallel) : null;
    if ($radius === null && $geographic instanceof GeographicPoint) {
        $radius = groundRadiusMetres($geographic, false);
    }
    if ($radius === null) {
        return 1e-8;
    }

    return Angle::convert(new Radian(0.001 / $radius), $unit)->getValue();
}

/**
 * Decimal places of the leading digit. 0.033 m is hundredths.
 */
function placesForAccuracy(float $accuracy): int
{
    return -quantityExponent($accuracy, true);
}

/**
 * Decimal places nearest a 1 mm step in this unit.
 */
function placesForMillimetre(float $quantum): int
{
    return -quantityExponent($quantum, false);
}

function quantityExponent(float $quantum, bool $leadingDigit): int
{
    if ($quantum <= 0 || !is_finite($quantum)) {
        return 0;
    }
    $log = log10($quantum);

    return $leadingDigit ? (int) floor($log + 1e-10) : (int) round($log);
}

function codeOf(string $srid): string
{
    $colon = strrpos($srid, ':');

    return $colon === false ? $srid : substr($srid, $colon + 1);
}

function unitName(string $srid): string
{
    return UnitOfMeasureFactory::getSupportedSRIDs()[$srid] ?? $srid;
}

function formatExact(float $value): string
{
    if (!is_finite($value)) {
        throw new InvalidArgumentException('Coordinate is not a finite number');
    }
    if ($value == 0.0) {
        return '0';
    }
    $negative = $value < 0;
    for ($digits = 0; $digits <= 17; ++$digits) {
        $text = sprintf('%.' . $digits . 'F', abs($value));
        if (str_contains($text, '.')) {
            $text = rtrim(rtrim($text, '0'), '.');
        }
        if ($text === '') {
            $text = '0';
        }
        $candidate = ($negative ? '-' : '') . $text;
        if ((float) $candidate === $value) {
            return $candidate;
        }
    }

    return rtrim(rtrim(sprintf('%.17F', $value), '0'), '.');
}

function formatRounded(float $value, int $places): string
{
    if (!is_finite($value)) {
        throw new InvalidArgumentException('Coordinate is not a finite number');
    }
    $rounded = round($value, $places);
    $text = $places <= 0 ? sprintf('%.0F', $rounded) : sprintf('%.' . $places . 'F', $rounded);

    return $text === '-0' ? '0' : $text;
}

/**
 * @param array{crs: array{srid: string, name: string, code: string}, axes: list<array{name: string, abbreviation: string, value: string, display: string, unit: string, unitName: string, formats?: list<array{value: string, unit: string, unitName: string}>}>, notations: list<string>, accuracy: list<array{name: string, value: string, display: string, unit: string, unitName: string, metres: string, metresDisplay: string}>, route: list<list<array<string, mixed>>>, gridFallback: list<array{name: string, code: string, operation: string}>, unchanged: bool, error: string|null} $payload
 */
function emit(array $payload): void
{
    echo json_encode($payload, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

/**
 * @return array{crs: array{srid: string, name: string, code: string}, axes: list<empty>, notations: list<empty>, accuracy: list<empty>, route: list<empty>, gridFallback: list<empty>, unchanged: false, error: string}
 */
function failed(string $message): array
{
    return [
        'crs' => ['srid' => '', 'name' => '', 'code' => ''],
        'axes' => [],
        'notations' => [],
        'accuracy' => [],
        'route' => [],
        'gridFallback' => [],
        'unchanged' => false,
        'error' => $message,
    ];
}

// The browser runtime may not report this file as the main script. It always
// writes the problem file before the run.
$invokedDirectly = isset($_SERVER['SCRIPT_FILENAME']) && realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__;
if ($invokedDirectly || is_file('/phpcoord/problem.json')) {
    try {
        $arguments = isset($argv) && is_array($argv) ? $argv : [];
        $decoded = json_decode(readProblem($arguments), true, 512, JSON_THROW_ON_ERROR);
        if (!is_array($decoded)) {
            throw new InvalidArgumentException('Problem must be a JSON object');
        }
        emit(convertProblem($decoded));
    } catch (Throwable $exception) {
        emit(failed($exception->getMessage()));
    }
}
