Units of rate
=============

.. tip::
    You can access the list of supported rates at runtime using ``Rate::getSupportedSRIDs()`` or
    ``Rate::getSupportedSRIDsWithHelp()``

Arc-seconds per year
--------------------


.. code-block:: php

    new Rate(new ArcSecond(float $angle), new Year(1));
    Rate::makeUnit(float $number, Rate::EPSG_ARC_SECONDS_PER_YEAR)
    Rate::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1043')

Centimetres per year
--------------------


.. code-block:: php

    new Rate(new Centimetre(float $number), new Year(1));
    Rate::makeUnit(float $number, Rate::EPSG_CENTIMETRES_PER_YEAR)
    Rate::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1034')

Metres per year
---------------


.. code-block:: php

    new Rate(new Metre(float $number), new Year(1));
    Rate::makeUnit(float $number, Rate::EPSG_METRES_PER_YEAR)
    Rate::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1042')

Milliarc-seconds per year
-------------------------


.. code-block:: php

    new Rate(new ArcSecond(float $angle / 1000), new Year(1));
    Rate::makeUnit(float $number, Rate::EPSG_MILLIARC_SECONDS_PER_YEAR)
    Rate::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1032')

Millimetres per year
--------------------


.. code-block:: php

    new Rate(new Millimetre(float $number), new Year(1));
    Rate::makeUnit(float $number, Rate::EPSG_MILLIMETRES_PER_YEAR)
    Rate::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1027')

Parts per billion per year
--------------------------


.. code-block:: php

    new Rate(new PartsPerBillion(float $number), new Year(1))
    Rate::makeUnit(float $number, Rate::EPSG_PARTS_PER_BILLION_PER_YEAR)
    Rate::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1030')


Parts per million per year
--------------------------


.. code-block:: php

    new Rate(new PartsPerMillion(float $number), new Year(1))
    Rate::makeUnit(float $number, Rate::EPSG_PARTS_PER_MILLION_PER_YEAR)
    Rate::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1041')



