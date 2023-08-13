Welcome to PHPCoord's documentation!
=====================================

.. include:: reflection/numOfCRS.txt

PHPCoord is a PHP library to aid in handling coordinates. It can convert coordinates for a point from one system
to another and also calculate distance between points.

|numOfCRS| different coordinate systems are supported, covering the entire globe. Common systems supported include:
 - WGS84 (GPS)
 - OSGB36 (Great Britain)
 - NAD27 and NAD83 (North America)
 - UTM (Universal Transverse Mercator)
 - ED50 and ETRS89 (Europe)
 - GDA94 and GDA2020 (Australia)
 - NZGD49 and NZGD2000 (New Zealand)

License
-------
PHPCoord code is licensed under the MIT license. It uses the EPSG dataset which is made available under the EPSG license.
See `license.txt`_ for full details.

.. _license.txt: https://github.com/dvdoug/PHPCoord/blob/master/license.txt


.. toctree::
    :maxdepth: 1
    :caption: Getting started

    installation
    primer
    creating_points
    coordinate_conversions
    distance_calculations

.. toctree::
    :maxdepth: 1
    :caption: Built-in

    builtin_coordinate_reference_systems
    builtin_units
    builtin_datums
    builtin_ellipsoids
    builtin_prime_meridians
    builtin_coordinate_systems
    builtin_conversions
    builtin_conversion_methods

.. toctree::
    :maxdepth: 1
    :caption: Custom

    custom_coordinate_reference_systems
    custom_conversions
    custom_datums
    custom_ellipsoids
    custom_prime_meridians
    custom_units

.. toctree::
    :maxdepth: 1
    :caption: About

    changelog
    Project history <https://doug.codes/phpcoord-is-10>
