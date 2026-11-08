Geographic points
=================
A geographic point is one that has a *latitude* and a *longitude*. It may also include a height, but only if the height
is an *ellipsoid height*. If you have a *local*, *geoid* or *orthometric* height, then you will need a both a ``GeographicPoint`` and a
``VerticalPoint`` and then to tie them together with a ``CompoundPoint``.

A ``GeographicPoint`` can be constructed by calling ``GeographicPoint::create``, which has the following signature:

.. code-block:: php

    public static function create(
        Geographic $crs,
        Angle $latitude,
        Angle $longitude,
        ?Length $height = null,
        ?DateTimeInterface $epoch = null
    ): GeographicPoint

For ``$crs`` use a ``Geographic3D`` CRS if you are supplying height, or a ``Geographic2D`` CRS if you are not.



Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Geographic2D;
    use PHPCoord\Point\GeographicPoint;
    use PHPCoord\UnitOfMeasure\Angle\Degree;

    // the Statue of Liberty in WGS84 (unknown date), traditional arguments, decimal degrees
    $crs = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
    $point = GeographicPoint::create(
        $crs,
        new Degree(40.689167),
        new Degree(-74.044444),
        null
    );

    // the Statue of Liberty in WGS84 (2020-02-01), traditional arguments, string representation of degrees
    $crs = Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
    $point = GeographicPoint::create(
        $crs,
        Degree::fromDegreeMinuteSecondHemisphere('40° 41′ 21″ N'),
        Degree::fromDegreeMinuteSecondHemisphere('74° 2′ 40″ W'),
        null,
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

US National Grid
----------------
A latitude and longitude on NAD27, NAD83 or one of the 2022
terrestrial reference frames is a ``NorthAmericanGeographicPoint``. ``GeographicPoint::create`` returns that
class for those datums.

The US National Grid is a way of writing that latitude and longitude modelled on UTM.

.. code-block:: php

    use PHPCoord\CoordinateReferenceSystem\Geographic2D;
    use PHPCoord\Point\GeographicPoint;
    use PHPCoord\Point\NorthAmericanGeographicPoint;
    use PHPCoord\UnitOfMeasure\Angle\Degree;

    $point = GeographicPoint::create(
        Geographic2D::fromSRID(Geographic2D::EPSG_NAD83_2011),
        new Degree(38.8895),
        new Degree(-77.0353),
        null
    );

    $reference = $point->asUSNGWithSpaces(); // e.g. "18S UJ 2348 0647"
    $again = NorthAmericanGeographicPoint::fromUSNG('18S UJ 2348 0647');

``$digits`` is the number of numeric characters across both axes: 0, 2, 4, 6, 8 or 10. Ten is one metre. The value is
the south-west corner of that square, truncated rather than rounded. An unlabelled reference means NAD83, and
``fromUSNG`` reads it as NAD83(2011) unless another North American coordinate reference system is supplied.
NAD27 is written ``18S UJ 2348 0647 (NAD 27)``. NATRF2022, CATRF2022, PATRF2022 and MATRF2022
are named in the same way.
