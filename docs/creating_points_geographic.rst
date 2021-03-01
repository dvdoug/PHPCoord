Geographic points
=================
A geographic point is one that has a *latitude* and a *longitude*. It may also include a height, but only if the height
is an *ellipsoid height*. If you have a *local*, *geoid* or *orthometric* height, then you will need a both a ``GeographicPoint`` and a
``VerticalPoint`` and then to tie them together with a ``CompoundPoint``.

A ``GeographicPoint`` can be constructed by calling ``GeographicPoint::create``, which has the following signature:

.. code-block:: php

    public static function create(
        Angle $latitude,
        Angle $longitude,
        ?Length $height = null,
        Geographic $crs,
        ?DateTimeInterface $epoch = null
    ): GeographicPoint

For ``$crs`` use a ``Geographic3D`` CRS if you are supplying height, or a ``Geographic2D`` CRS if you are not.



Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Geographic2D;
    use PHPCoord\GeographicPoint;
    use PHPCoord\UnitOfMeasure\Angle\Degree;

    // the Statue of Liberty in WGS84 (unknown date), traditional arguments, decimal degrees
    $crs = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
    $point = GeographicPoint::create(
        new Degree(40.689167),
        new Degree(-74.044444),
        null,
        $crs
    );

    // the Statue of Liberty in WGS84 (2020-02-01), traditional arguments, string representation of degrees
    $crs = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
    $point = GeographicPoint::create(
        Degree::fromDegreeMinuteSecondHemisphere('40° 41′ 21″ N'),
        Degree::fromDegreeMinuteSecondHemisphere('74° 2′ 40″ W'),
        null,
        $crs,
        new DateTime('2020-02-01')
    );

    // the Statue of Liberty in WGS84 (unknown date), named arguments, decimal degrees
    $crs = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
    $point = GeographicPoint::create(
        latitude: new Degree(40.689167),
        longitude: new Degree(-74.044444),
        crs: $crs
    );

    // the Statue of Liberty in WGS84 (2020-02-01), named arguments, string representation of degrees
    $crs = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
    $point = GeographicPoint::create(
        latitude: Degree::fromDegreeMinuteSecondHemisphere('40° 41′ 21″ N'),
        longitude: Degree::fromDegreeMinuteSecondHemisphere('74° 2′ 40″ W'),
        epoch: new DateTime('2020-02-01'),
        crs: $crs
    );

    $latitude = $point->getLatitude(); // Angle
    $longitude = $point->getLongitude(); // Angle
    $height = $point->getHeight(); // Length|null
    $epoch = $point->getCoordinateEpoch(); // DateTimeImmutable|null
    $crs = $point->getCRS(); // Geographic2D|Geographic3D
    $asString = (string) $point; // '(40.689167, -74.044444)'
