Custom conversions
==================

.. note::
    In ISO 19111 terminology, when converting points between one CRS and another, a distinction is drawn between a
    conversion and a transformation. PHPCoord uses the words interchangeably.

In addition to simply :ref:`invoking a particular coordinate conversion method with the parameters of your choice<coordinate_conversions_hard>`,
PHPCoord also supports registering a custom conversion so that you can :ref:`use easy mode<coordinate_conversions_easy>`
thereafter.

Adding a custom coordinate transformation to PHPCoord is a 2-step process. Step 1 is to register the *coordinate operation*
within the system. A coordinate operation is the combination of the conversion method (e.g. Transverse Mercator or
Molodensky-Badekas, together any parameters that particular formula requires). Step 2 is to register that particular
coordinate operation as a way to transform 1 CRS to another.

The reason for the 2-step process is because the same method/parameters are often used across multiple different
CRS pairs - e.g. the projection method and params for any particular US State Plane conversion remain constant across
NAD83 revisions. Keeping this conceptual separation even for custom conversions helps to keep PHPCoord internals clean.

.. code-block:: php

    // step 1, register an operation

    PHPCoord\CoordinateOperation\CoordinateOperations::registerCustomOperation(
        string $srid,
        string $name,
        string $methodSrid,
        BoundingArea $extent,
        array $params
    );

    // step 2, register that operation as a way to convert between 2 CRSs

    PHPCoord\CoordinateOperation\CoordinateOperations::registerCustomTransformation(
        string $operationSrid,
        string $name,
        string $sourceCRSSrid,
        string $targetCRSSrid,
        float $accuracy // in metres, used by easy-mode conversion to pick the most accurate option available
    );

For example, to construct a conversion to a hypothetical GDA2020 with Sydney Opera House as the prime meridian rather
than Greenwich:

.. code-block:: php

    <?php
    namespace YourApp\Geo;
    use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
    use PHPCoord\CoordinateOperation\CoordinateOperations;
    use PHPCoord\CoordinateReferenceSystem\Geographic2D;
    use PHPCoord\Geometry\BoundingArea;
    use PHPCoord\Geometry\RegionMap;

    // step 1, register an operation
    $boundingArea = BoundingArea::createFromArray(
        [
            [
                [
                    [93.41, -60.55], [93.41, -8.47], [173.34, -8.47], [173.34, -60.55], [93.41, -60.55]
                ]
            ]
        ]
        RegionMap::REGION_OCEANIA
    );

    CoordinateOperations::registerCustomOperation(
        'urn:yourcompany:geo:coordinateOperation:GDA2020-greenwich-sydney',
        'GDA2020 (Greenwich) to GDA2020 (Sydney)',
        CoordinateOperationMethods::EPSG_LONGITUDE_ROTATION,
        $boundingArea,
        [
            'longitudeOffset' => new Degree(-151.214167),
        ]
    );

    // step 2, register that operation as a way to convert between 2 CRSs
    CoordinateOperations::registerCustomTransformation(
        'urn:yourcompany:geo:coordinateOperation:GDA2020-greenwich-sydney',
        'GDA2020 (Greenwich) to GDA2020 (Sydney)',
        Geographic2D::fromSRID(Geographic2D::EPSG_GDA2020),
        'urn:yourcompany:geo:crs:GDA2020-sydney',
        0.0
    );

    // step 3, use it
    $from = GeographicPoint::create(
        Geographic2D::fromSRID(Geographic2D::EPSG_GDA2020),
        new Degree(-33.858611),
        new Degree(151.214167)
    );
    $to = $from->convert(
        Geographic2D::fromSRID('urn:yourcompany:geo:crs:GDA2020-sydney')
    );

    $latitude = $point->getLatitude(); // -33.858611
    $longitude = $point->getLongitude(); // 0.0

.. tip::
    A SRID (spatial reference identifier), is a just a unique string that can be used to identify the specific CRS or
    other geospatial type in question. The PHPCoord built-in systems all use an URN for this purpose, but you can use
    anything you like as long as it is unique.
