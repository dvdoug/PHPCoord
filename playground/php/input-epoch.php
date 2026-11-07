<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Playground;

use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\Datum\Datum;
use ReflectionProperty;
use RuntimeException;

use function dirname;
use function ini_set;
use function is_dir;
use function is_file;
use function is_string;
use function json_encode;
use function realpath;
use function sort;
use function array_key_exists;
use function is_array;

use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;

/**
 * SRIDs whose coordinates carry a date.
 *
 * A dynamic datum moves, so the date is the coordinate epoch of the input. An ensemble carries
 * a date only when its members are dynamic frames: the date says which frame the coordinates
 * belong to. An ensemble that also contains a static realization is plate-fixed, and a
 * coordinate in it has no epoch. A projection of a dynamic datum moves with that datum.
 *
 * A projected CRS on any other datum, and a geographic or geocentric CRS on a static geodetic
 * datum, have no epoch of their own. The demo asks for the output epoch instead.
 *
 * @return list<string>
 */
function crsInputEpochSrids(): array
{
    $projectedRows = (new ReflectionProperty(Projected::class, 'sridData'))->getValue();
    if (!is_array($projectedRows)) {
        throw new RuntimeException('Projected CRS data is missing');
    }

    $srids = [];
    foreach ([Geographic2D::class, Geographic3D::class, Geocentric::class] as $class) {
        foreach (sridRowsOf($class) as $srid => $row) {
            if (!isset($row['datum']) || !is_string($row['datum'])) {
                throw new RuntimeException('CRS ' . $srid . ' has no datum');
            }
            if (datumCarriesInputEpoch($row['datum'])) {
                $srids[] = $srid;
            }
        }
    }
    foreach ($projectedRows as $srid => $row) {
        if (!is_string($srid) || !isset($row['base_crs']) || !is_string($row['base_crs'])) {
            throw new RuntimeException('Projected CRS ' . $srid . ' has no base CRS');
        }
        $base = Geographic2D::getSRIDData($row['base_crs']) ?? Geographic3D::getSRIDData($row['base_crs']);
        if (!$base) {
            throw new RuntimeException('Projected CRS ' . $srid . ' has an unknown base CRS');
        }
        // Only a dynamic base moves. An ensemble base is plate-fixed or a family of static realisations.
        if (Datum::getDatumTypeForSRID($base['datum']) === Datum::DATUM_TYPE_DYNAMIC_GEODETIC) {
            $srids[] = $srid;
        }
    }
    foreach (sridRowsOf(Compound::class) as $srid => $row) {
        if (!isset($row['horizontal_crs']) || !is_string($row['horizontal_crs'])) {
            throw new RuntimeException('Compound CRS ' . $srid . ' has no horizontal CRS');
        }
        if (horizontalCarriesInputEpoch($row['horizontal_crs'], $projectedRows)) {
            $srids[] = $srid;
        }
    }
    sort($srids);

    return $srids;
}

/**
 * @param array<string, array<string, mixed>> $projectedRows
 */
function horizontalCarriesInputEpoch(string $srid, array $projectedRows): bool
{
    $geographic = Geographic2D::getSRIDData($srid) ?? Geographic3D::getSRIDData($srid);
    if ($geographic) {
        return datumCarriesInputEpoch($geographic['datum']);
    }
    $geocentric = Geocentric::getSRIDData($srid);
    if ($geocentric) {
        return datumCarriesInputEpoch($geocentric['datum']);
    }
    if (!isset($projectedRows[$srid])) {
        return false;
    }
    $baseSrid = $projectedRows[$srid]['base_crs'];
    if (!is_string($baseSrid)) {
        return false;
    }
    $base = Geographic2D::getSRIDData($baseSrid) ?? Geographic3D::getSRIDData($baseSrid);
    if (!$base) {
        return false;
    }

    return Datum::getDatumTypeForSRID($base['datum']) === Datum::DATUM_TYPE_DYNAMIC_GEODETIC;
}

function datumCarriesInputEpoch(string $datumSrid): bool
{
    $type = Datum::getDatumTypeForSRID($datumSrid);
    if ($type === Datum::DATUM_TYPE_DYNAMIC_GEODETIC) {
        return true;
    }
    if ($type !== Datum::DATUM_TYPE_ENSEMBLE) {
        return false;
    }

    return ensembleFollowsDynamicFrames($datumSrid);
}

function ensembleFollowsDynamicFrames(string $datumSrid): bool
{
    static $cache = [];
    if (array_key_exists($datumSrid, $cache)) {
        return $cache[$datumSrid];
    }
    $dynamic = false;
    foreach (Datum::fromSRID($datumSrid)->getEnsembleMembers() as $member) {
        $memberType = Datum::getDatumTypeForSRID($member);
        // A static member is a plate-fixed realization. The ensemble then has no epoch of its own.
        if ($memberType === Datum::DATUM_TYPE_GEODETIC) {
            $cache[$datumSrid] = false;

            return false;
        }
        if ($memberType === Datum::DATUM_TYPE_DYNAMIC_GEODETIC) {
            $dynamic = true;
        }
    }
    $cache[$datumSrid] = $dynamic;

    return $dynamic;
}

/**
 * @param class-string $class
 *
 * @return array<string, array<string, mixed>>
 */
function sridRowsOf(string $class): array
{
    $rows = (new ReflectionProperty($class, 'sridData'))->getValue();
    if (!is_array($rows)) {
        throw new RuntimeException($class . ' has no SRID data');
    }

    return $rows;
}

if (isset($_SERVER['SCRIPT_FILENAME']) && realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) {
    ini_set('display_errors', '0');
    ini_set('html_errors', '0');
    // Same three layouts as convert.php: this checkout, a project that
    // installed the package, and the browser loader next to src/.
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
    echo json_encode(crsInputEpochSrids(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
}
