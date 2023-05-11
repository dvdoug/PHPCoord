Units of time
=============

.. tip::
    All time units have helper methods ``->asYears()``, ``->add()``, ``->subtract()``,
    ``->multiply()`` and ``->divide()``

.. tip::
    You can access the list of supported time units at runtime using ``Time::getSupportedSRIDs()`` or
    ``Time::getSupportedSRIDsWithHelp()``

Year
----


.. code-block:: php

    new Year(float $year)
    Time::makeUnit(float $year, Time::EPSG_YEAR)
    Time::makeUnit(float $year, 'urn:ogc:def:uom:EPSG::1029')



