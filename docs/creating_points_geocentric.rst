Geocentric points
=================
A geocentric point is one that measures distances from the centre of the Earth. These are usually in ``(x,y,z)`` format.


A ``GeocentricPoint`` can be constructed by calling ``GeocentricPoint::create`` which has the following signature:

.. code-block:: php

    public static function create(
        Geocentric $crs,
        Length $x,
        Length $y,
        Length $z,
        ?DateTimeInterface $epoch = null
    ): GeocentricPoint

Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Geocentric;
    use PHPCoord\Point\GeocentricPoint;
    use PHPCoord\UnitOfMeasure\Length\Metre;

    // Ascension Island GPS tracking station in ITRF2008 (unknown date), traditional arguments
    $crs = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
    $point = GeocentricPoint::create(
        $crs,
        new Metre(6121152),
        new Metre(-1563979),
        new Metre(-872615)
    );

    // Ascension Island GPS tracking station in ITRF2008 (2020-02-01), traditional arguments
    $crs = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
    $point = GeocentricPoint::create(
        $crs,
        new Metre(6121152),
        new Metre(-1563979),
        new Metre(-872615),
        new DateTime('2020-02-01')
    );

    // Ascension Island GPS tracking station in ITRF2008 (unknown date), named arguments
    $crs = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
    $point = GeocentricPoint::create(
        x: new Metre(6121152),
        y: new Metre(-1563979),
        z: new Metre(-872615),
        crs: $crs
    );

    // Ascension Island GPS tracking station in ITRF2008 (2020-02-01), named arguments
    $crs = Geocentric::fromSRID(Geocentric::EPSG_ITRF2008);
    $point = GeocentricPoint::create(
        x: new Metre(6121152),
        y: new Metre(-1563979),
        z: new Metre(-872615),
        epoch: new DateTime('2020-02-01'),
        crs: $crs
    );

    $x = $point->getX(); // Length
    $y = $point->getY(); // Length
    $z = $point->getZ(); // Length
    $epoch = $point->getCoordinateEpoch(); // DateTimeImmutable|null
    $crs = $point->getCRS(); // Geocentric
    $asString = (string) $point; // '(6121152, -1563979, -872615)'
