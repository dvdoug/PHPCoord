<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\GeoJSON;

use Composer\Pcre\Preg;
use Opis\JsonSchema\Validator;
use PHPCoord\Exception\InvalidGeometryException;
use PHPCoord\Geometry\Geometry;
use PHPCoord\Geometry\GeometryCollection;
use PHPCoord\Geometry\LinearRing;
use PHPCoord\Geometry\LineString;
use PHPCoord\Geometry\MultiLineString;
use PHPCoord\Geometry\MultiPoint;
use PHPCoord\Geometry\MultiPolygon;
use PHPCoord\Geometry\Point;
use PHPCoord\Geometry\Polygon;
use PHPCoord\Geometry\Position;
use stdClass;
use RuntimeException;
use UnhandledMatchError;

use function json_decode;
use function json_encode;
use function file_get_contents;

use const JSON_PRETTY_PRINT;
use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;

/**
 * @internal
 */
class GeoJSON
{
    public const SCHEMA_URI = 'https://geojson.org/schema/GeoJSON.json';

    public static Validator $validator;

    public static function readFile(string $path): Geometry
    {
        return self::createFromString(file_get_contents($path) ?: throw new RuntimeException("{$path} does not exist"));
    }

    public static function createFromString(string $rawGeoJSON): Geometry
    {
        if (!isset(self::$validator)) {
            self::$validator = new Validator();
            self::$validator->resolver()->registerFile(
                self::SCHEMA_URI,
                __DIR__ . '/GeoJSON.json'
            );
        }

        /** @var stdClass $geoJSON */
        $geoJSON = json_decode($rawGeoJSON, flags: JSON_THROW_ON_ERROR);

        $result = self::$validator->validate($geoJSON, self::SCHEMA_URI);
        if ($error = $result->error()) {
            throw new InvalidGeometryException($error->message());
        }

        return self::createFromObject($geoJSON);
    }

    private static function createFromObject(stdClass $geoJSON): Geometry
    {
        return match ($geoJSON->type) {
            'Point' => self::createPoint($geoJSON->coordinates),
            'LineString' => self::createLineString($geoJSON->coordinates),
            'Polygon' => self::createPolygon($geoJSON->coordinates),
            'MultiPoint' => self::createMultiPoint($geoJSON->coordinates),
            'MultiLineString' => self::createMultiLineString($geoJSON->coordinates),
            'MultiPolygon' => self::createMultiPolygon($geoJSON->coordinates),
            'GeometryCollection' => self::createGeometryCollection($geoJSON->geometries),
            'Feature', 'FeatureCollection' => throw new InvalidGeometryException("{$geoJSON->type} not supported yet"),
            default => throw new UnhandledMatchError()
        };
    }

    /**
     * @param float[] $point
     */
    private static function createPoint(array $point): Point
    {
        $position = new Position(...$point);

        return new Point($position);
    }

    /**
     * @param array<float[]> $lineString
     */
    private static function createLineString(array $lineString): LineString
    {
        return new LineString(...self::positions($lineString));
    }

    /**
     * @param array<array<float[]>> $polygon
     */
    private static function createPolygon(array $polygon): Polygon
    {
        $rings = [];
        foreach ($polygon as $ring) {
            $rings[] = new LinearRing(...self::positions($ring));
        }

        return new Polygon(...$rings);
    }

    /**
     * @param array<float[]> $multiPoint
     */
    private static function createMultiPoint(array $multiPoint): MultiPoint
    {
        return new MultiPoint(...self::positions($multiPoint));
    }

    /**
     * @param array<array<float[]>> $multiLineString
     */
    private static function createMultiLineString(array $multiLineString): MultiLineString
    {
        $strings = [];
        foreach ($multiLineString as $lineString) {
            $strings[] = self::createLineString($lineString);
        }

        return new MultiLineString(...$strings);
    }

    /**
     * @param array<array<array<float[]>>> $multiPolygon
     */
    private static function createMultiPolygon(array $multiPolygon): MultiPolygon
    {
        $polygons = [];
        foreach ($multiPolygon as $polygon) {
            $polygons[] = self::createPolygon($polygon);
        }

        return new MultiPolygon(...$polygons);
    }

    /**
     * @param stdClass[] $geometryCollection
     */
    private static function createGeometryCollection(array $geometryCollection): GeometryCollection
    {
        $geometries = [];
        foreach ($geometryCollection as $geometry) {
            $geometries[] = self::createFromObject($geometry);
        }

        return new GeometryCollection(...$geometries);
    }

    /**
     * @param  array<float[]> $coordinates
     * @return list<Position>
     */
    private static function positions(array $coordinates): array
    {
        $positions = [];
        foreach ($coordinates as $point) {
            $positions[] = new Position(...$point);
        }

        return $positions;
    }

    public static function format(string $input): string
    {
        $basicPrettyPrint = json_encode(json_decode($input, flags: JSON_THROW_ON_ERROR), flags: JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $collapseCoordinates = Preg::replace('/\[\s+(-?\d+\.?\d*),\s+(-?\d+\.?\d*)\s+]/', '[$1, $2]', $basicPrettyPrint);
        $collapsePoints = Preg::replace('/(-?\d)],\s+/', '$1], ', $collapseCoordinates);

        return $collapsePoints;
    }

    /**
     * West, South, [MinHeight], East, North, [MaxHeight].
     * @var ?array<float>
     */
    public ?array $boundingBox;

    /**
     * @return ?array<float>
     */
    public function getBoundingBox(): ?array
    {
        return $this->boundingBox;
    }
}
