Custom ellipsoids
=================

To make use of a custom ellipsoid, all you need to do is register it. Once registered, your custom ellipsoid can be
used exactly like any other built into PHPCoord.

.. code-block:: php

    <?php
    namespace YourApp\Geo;
    use PHPCoord\UnitOfMeasure\Length\Metre;
    use PHPCoord\Datum\Ellipsoid;

    $semiMajorAxis = new Metre(6378137.0); // any Length unit is acceptable
    $semiMinorAxis = new Metre(6356752.314); // any Length unit is acceptable

    /*
     * Some ellipsoids are defined by a semi-major axis and their flattening, rather than by a combination
     * of a semi-major and semi-minor axis. If this is your situation, you will need to calculate the
     * semi-minor axis yourself, this can be done via the formula below.
     */
    $semiMinorAxis = $semiMajorAxis - ($semiMajorAxis / $inverseFlattening);

    Ellipsoid::registerCustomEllipsoid('urn:yourcompany:geo:datum:FOO123', 'FOO-123', $semiMajorAxis, $semiMinorAxis);
    $ellipsoid = Ellipsoid::fromSRID('urn:yourcompany:geo:datum:FOO123');

.. tip::
    A SRID (spatial reference identifier), is a just a unique string that can be used to identify the specific ellipsoid
    in question. The PHPCoord built-in ellipsoids all use an URN for this purpose, but you can use anything you like as
    long as it is unique.
