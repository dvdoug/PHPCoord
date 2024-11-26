<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\GeoJSON;

use PHPCoord\Geometry\GeometryCollection;
use PHPCoord\Geometry\LinearRing;
use PHPCoord\Geometry\LineString;
use PHPCoord\Geometry\MultiLineString;
use PHPCoord\Geometry\MultiPoint;
use PHPCoord\Geometry\MultiPolygon;
use PHPCoord\Geometry\Point;
use PHPCoord\Geometry\Polygon;
use PHPCoord\Geometry\Position;
use PHPUnit\Framework\TestCase;

use function json_encode;

class GeoJSONTest extends TestCase
{
    public function testPoint(): void
    {
        $sample = <<<ENDJSON
            {
                "type": "Point",
                "coordinates": [100.0, 0.0]
            }
            ENDJSON;

        $fromSample = GeoJSON::createFromString($sample);

        $constructed = new Point(new Position(100.0, 0.0));

        self::assertEquals($constructed, $fromSample);
        self::assertJsonStringEqualsJsonString($sample, json_encode($constructed));
    }

    public function testLineString(): void
    {
        $sample = <<<ENDJSON
            {
                "type": "LineString",
                    "coordinates": [
                        [100.0, 0.0],
                        [101.0, 1.0]
                    ]
            }
            ENDJSON;

        $fromSample = GeoJSON::createFromString($sample);

        $constructed = new LineString(new Position(100.0, 0.0), new Position(101.0, 1.0));

        self::assertEquals($constructed, $fromSample);
        self::assertJsonStringEqualsJsonString($sample, json_encode($constructed));
    }

    public function testPolygon(): void
    {
        $sample = <<<ENDJSON
            {
                "type": "Polygon",
                "coordinates": [
                    [
                        [100.0, 0.0],
                        [101.0, 0.0],
                        [101.0, 1.0],
                        [100.0, 1.0],
                        [100.0, 0.0]
                    ],
                    [
                        [100.8, 0.8],
                        [100.8, 0.2],
                        [100.2, 0.2],
                        [100.2, 0.8],
                        [100.8, 0.8]
                    ]
                ]
            }
            ENDJSON;

        $fromSample = GeoJSON::createFromString($sample);

        $constructed = new Polygon(
            new LinearRing(
                new Position(100.0, 0.0),
                new Position(101.0, 0.0),
                new Position(101.0, 1.0),
                new Position(100.0, 1.0),
                new Position(100.0, 0.0)
            ),
            new LinearRing(
                new Position(100.8, 0.8),
                new Position(100.8, 0.2),
                new Position(100.2, 0.2),
                new Position(100.2, 0.8),
                new Position(100.8, 0.8)
            ),
        );

        self::assertEquals($constructed, $fromSample);
        self::assertJsonStringEqualsJsonString($sample, json_encode($constructed));
    }

    public function testMultiPoint(): void
    {
        $sample = <<<ENDJSON
                {
                    "type": "MultiPoint",
                    "coordinates": [
                        [100.0, 0.0],
                        [101.0, 1.0]
                    ]
                }
            ENDJSON;

        $fromSample = GeoJSON::createFromString($sample);

        $constructed = new MultiPoint(new Position(100.0, 0.0), new Position(101.0, 1.0));

        self::assertEquals($constructed, $fromSample);
        self::assertJsonStringEqualsJsonString($sample, json_encode($constructed));
    }

    public function testMultiLineString(): void
    {
        $sample = <<<ENDJSON
            {
                "type": "MultiLineString",
                "coordinates": [
                    [
                        [100.0, 0.0],
                        [101.0, 1.0]
                    ],
                    [
                        [102.0, 2.0],
                        [103.0, 3.0]
                    ]
                ]
            }
            ENDJSON;

        $fromSample = GeoJSON::createFromString($sample);

        $constructed = new MultiLineString(
            new LineString(
                new Position(100.0, 0.0),
                new Position(101.0, 1.0),
            ),
            new LineString(
                new Position(102.0, 2.0),
                new Position(103.0, 3.0)
            ),
        );

        self::assertEquals($constructed, $fromSample);
        self::assertJsonStringEqualsJsonString($sample, json_encode($constructed));
    }

    public function testMultiPolygon(): void
    {
        $sample = <<<ENDJSON
            {
                "type": "MultiPolygon",
                "coordinates": [
                    [
                        [
                            [102.0, 2.0],
                            [103.0, 2.0],
                            [103.0, 3.0],
                            [102.0, 3.0],
                            [102.0, 2.0]
                        ]
                    ],
                    [
                        [
                            [100.0, 0.0],
                            [101.0, 0.0],
                            [101.0, 1.0],
                            [100.0, 1.0],
                            [100.0, 0.0]
                        ],
                        [
                            [100.2, 0.2],
                            [100.2, 0.8],
                            [100.8, 0.8],
                            [100.8, 0.2],
                            [100.2, 0.2]
                        ]
                    ]
                ]
            }
            ENDJSON;

        $fromSample = GeoJSON::createFromString($sample);

        $constructed = new MultiPolygon(
            new Polygon(
                new LinearRing(
                    new Position(102.0, 2.0),
                    new Position(103.0, 2.0),
                    new Position(103.0, 3.0),
                    new Position(102.0, 3.0),
                    new Position(102.0, 2.0)
                )
            ),
            new Polygon(
                new LinearRing(
                    new Position(100.0, 0.0),
                    new Position(101.0, 0.0),
                    new Position(101.0, 1.0),
                    new Position(100.0, 1.0),
                    new Position(100.0, 0.0)
                ),
                new LinearRing(
                    new Position(100.2, 0.2),
                    new Position(100.2, 0.8),
                    new Position(100.8, 0.8),
                    new Position(100.8, 0.2),
                    new Position(100.2, 0.2)
                ),
            )
        );

        self::assertEquals($constructed, $fromSample);
        self::assertJsonStringEqualsJsonString($sample, json_encode($constructed));
    }

    public function testGeometryCollection(): void
    {
        $sample = <<<ENDJSON
            {
                "type": "GeometryCollection",
                "geometries": [
                    {
                        "type": "Point",
                        "coordinates": [100.0, 0.0]
                    },
                    {
                        "type": "LineString",
                        "coordinates": [
                            [101.0, 0.0],
                            [102.0, 1.0]
                        ]
                    }
                ]
            }
            ENDJSON;

        $fromSample = GeoJSON::createFromString($sample);

        $constructed = new GeometryCollection(
            new Point(new Position(100.0, 0.0)),
            new LineString(new Position(101.0, 0.0), new Position(102.0, 1.0))
        );

        self::assertEquals($constructed, $fromSample);
        self::assertJsonStringEqualsJsonString($sample, json_encode($constructed));
    }
}
