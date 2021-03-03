Units of scale
==============

.. tip::
    All scale units have helper methods ``->asUnity()``, ``->add()``, ``->subtract()``,
    ``->multiply()`` and ``->divide()``

Unity
-----


.. code-block:: php

    new Unity(float $number)
    Scale::makeUnit(float $number, Scale::EPSG_UNITY)
    Scale::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::9201')

SI coherent derived unit (standard unit) for dimensionless quantity.

Coefficient
-----------


.. code-block:: php

    new Coefficient(float $number)
    Scale::makeUnit(float $number, Scale::EPSG_COEFFICIENT)
    Scale::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::9203')

Used when parameters are coefficients. They inherently take the units which depend upon the term to which the coefficient applies.

Parts per billion
-----------------


.. code-block:: php

    new PartsPerBillion(float $number)
    Scale::makeUnit(float $number, Scale::EPSG_PARTS_PER_BILLION)
    Scale::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::1028')

Billion is internationally ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be 1E+9.

Parts per million
-----------------


.. code-block:: php

    new PartsPerMillion(float $number)
    Scale::makeUnit(float $number, Scale::EPSG_PARTS_PER_MILLION)
    Scale::makeUnit(float $number, 'urn:ogc:def:uom:EPSG::9202')



