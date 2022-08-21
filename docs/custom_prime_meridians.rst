Custom prime meridians
======================

To make use of a custom prime meridian, all you need to do is register it. Once registered, your custom meridian can be
used exactly like any other built into PHPCoord. To register, call:

``PHPCoord\Datum\PrimeMeridian::registerCustomMeridian(string $srid, string $name, Angle $longitudeFromGreenwich)``

.. code-block:: php

    <?php
    namespace YourApp\Geo;
    use PHPCoord\UnitOfMeasure\Angle\Degree;
    use PHPCoord\Datum\PrimeMeridian;

    $longitudeFromGreenwich = new Degree(-6.260278); // any Angle unit is acceptable

    PrimeMeridian::registerCustomMeridian('urn:yourcompany:geo:datum:dublin', 'Dublin', $longitudeFromGreenwich);

    $meridian = PrimeMeridian::fromSRID('urn:yourcompany:geo:datum:dublin');

.. tip::
    A SRID (spatial reference identifier), is a just a unique string that can be used to identify the specific meridian
    in question. The PHPCoord built-in meridians all use an URN for this purpose, but you can use anything you like as
    long as it is unique.
