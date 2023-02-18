Custom coordinate systems
=========================

.. note::
    In ISO 19111 terminology, what most people refer to as a *Coordinate System* is actually called a
    *Coordinate Reference System* (or *CRS* for short), with the term *Coordinate System* being used to refer to the
    :ref:`axes used <builtincs>`. PHPCoord's actual code uses the ISO naming system.

To make use of a custom CRS, all you need to do is register it. Once registered, your custom system can be
used exactly like any other built into PHPCoord. To register, call the appropriate registration function:

.. code-block:: php

    PHPCoord\CoordinateReferenceSystem\Geocentric::registerCustomCRS(
        string $srid,
        string $name,
        string $coordinateSystemSrid,
        string $datumSrid,
        BoundingArea $extent
    );

    PHPCoord\CoordinateReferenceSystem\Geographic2D::registerCustomCRS(
        string $srid,
        string $name,
        string $coordinateSystemSrid,
        string $datumSrid,
        BoundingArea $extent,
        ?string $baseCRS
    );

    PHPCoord\CoordinateReferenceSystem\Geographic3D::registerCustomCRS(
        string $srid,
        string $name,
        string $coordinateSystemSrid,
        string $datumSrid,
        BoundingArea $extent,
        ?string $baseCRS
    );

    PHPCoord\CoordinateReferenceSystem\Projected::registerCustomCRS(
        string $srid,
        string $name,
        string $baseCRS,
        string $derivingConversionSrid,
        string $coordinateSystemSrid,
        BoundingArea $extent
    );

    PHPCoord\CoordinateReferenceSystem\Vertical::registerCustomCRS(
        string $srid,
        string $name,
        string $coordinateSystemSrid,
        string $datumSrid,
        BoundingArea $extent
    );

For example

.. code-block:: php

    <?php
    namespace YourApp\Geo;
    use PHPCoord\CoordinateSystem\Geographic;
    use PHPCoord\CoordinateReferenceSystem\Geographic2D;
    use PHPCoord\Datum\Datum;
    use PHPCoord\Geometry\BoundingArea;
    use PHPCoord\Geometry\RegionMap;

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

    Geographic2D::registerCustomCRS(
        'urn:yourcompany:geo:crs:GDA2020-lon-lat',
        'GDA2020 (in lon-lat order)',
        Ellipsoidal::fromSRID(
            Ellipsoidal::EPSG_2D_AXES_LONGITUDE_LATITUDE_ORIENTATIONS_EAST_NORTH_UOM_DEGREE
        ),
        Datum::fromSRID(
            Datum::EPSG_GEOCENTRIC_DATUM_OF_AUSTRALIA_2020
        ),
        $boundingArea
    );

.. note::
    If defining a custom projected CRS, you must specify the SRID of the conversion to/from the base CRS. Although you
    *can* specify the SRID of a built-in conversion, please note that unlike CRSs, the set of conversions built in to
    PHPCoord is considered an implementation detail and although stable in practice, stability is not guaranteed.
    Consider duplicating the one you need and registering it as a custom operation to avoid this risk.

.. tip::
    A SRID (spatial reference identifier), is a just a unique string that can be used to identify the specific CRS or
    other geospatial type in question. The PHPCoord built-in systems all use an URN for this purpose, but you can use
    anything you like as long as it is unique.
