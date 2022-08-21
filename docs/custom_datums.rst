Custom datums
=============

To make use of a custom datum, all you need to do is register it. Once registered, your custom datum can be
used exactly like any other built into PHPCoord. To register, call:

``PHPCoord\Datum\Datum::registerCustomDatum(string $srid, string $name, string $type, ?string $ellipsoidSrid, ?string $primeMeridianSrid, ?DateTimeInterface $frameReferenceEpoch)``

where ``$type`` is one of ``Datum::DATUM_TYPE_GEODETIC``, ``Datum::DATUM_TYPE_DYNAMIC_GEODETIC``, or ``Datum::DATUM_TYPE_VERTICAL``

.. code-block:: php

    <?php
    namespace YourApp\Geo;
    use PHPCoord\Datum\Datum;
    use PHPCoord\Datum\Ellipsoid;
    use PHPCoord\Datum\PrimeMeridian;

    Datum::registerCustomDatum(
        'urn:yourcompany:geo:datum:WGS84-Athens',
        'WGS 84 (Athens)',
        Datum::DATUM_TYPE_GEODETIC,
        Ellipsoid::EPSG_WGS_84,
        PrimeMeridian::EPSG_ATHENS
    );
    $datum = Datum::fromSRID('urn:yourcompany:geo:datum:WGS84-Athens');

.. tip::
    A SRID (spatial reference identifier), is a just a unique string that can be used to identify the specific datum or
    other geospatial type in question. The PHPCoord built-in datums all use an URN for this purpose, but you can use
    anything you like as long as it is unique.
