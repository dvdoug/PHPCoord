Units of angle
==============

.. tip::
    All angle units have helper methods ``->asDegrees()``, ``->asRadians()``, ``->add()``, ``->substract()``,
    ``->multiply()`` and ``->divide()``

Degree
------

.. code-block:: php

    new Degree(float $angle)
    Angle::makeUnit(float $angle, Angle::EPSG_DEGREE)
    Angle::makeUnit(float $angle, 'urn:ogc:def:uom:EPSG::9102')

:math:`\frac{π}{180}` radians

.. tip::
    Degrees have a very large number of written representations. Although the *output* of PHPCoord will always be in
    decimal degrees, *input* helpers exist for many alternate representations.

Degree hemisphere
^^^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromDegreeHemisphere(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_DEGREE_HEMISPHERE)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9116')

Format: degrees (real, any precision) - hemisphere abbreviation (single character N S E or W).

Degree minute
^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromDegreeMinute(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_DEGREE_MINUTE)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9115')

Format: signed degrees (integer)  - arc-minutes (real, any precision). Different symbol sets are in use as field separators, for example º '.

Degree minute hemisphere
^^^^^^^^^^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromDegreeMinuteHemisphere(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_DEGREE_MINUTE_HEMISPHERE)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9118')

Format: degrees (integer) - arc-minutes (real, any precision) - hemisphere abbreviation (single character N S E or W). Different symbol sets are in use as field separators, for example º '.

Degree minute second
^^^^^^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromDegreeMinuteSecond(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_DEGREE_MINUTE_SECOND)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9107')

Format: signed degrees (integer) - arc-minutes (integer) - arc-seconds (real, any precision). Different symbol sets are in use as field separators, for example º ' ".

Degree minute second hemisphere
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromDegreeMinuteSecondHemisphere(string $angle)
    Angle::makeunit(string $angle, Angle::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9108')

Format: degrees (integer) - arc-minutes (integer) - arc-seconds (real) - hemisphere abbreviation (single character N S E or W). Different symbol sets are in use as field separators for example º ' ".

Hemisphere degree
^^^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromHemisphereDegree(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_HEMISPHERE_DEGREE)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9117')

Format: hemisphere abbreviation (single character N S E or W) - degrees (real, any precision).

Hemisphere degree minute
^^^^^^^^^^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromHemisphereDegreeMinute(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_HEMISPHERE_DEGREE_MINUTE)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9119')

Format:  hemisphere abbreviation (single character N S E or W) - degrees (integer) - arc-minutes (real, any precision). Different symbol sets are in use as field separators, for example º '.

Hemisphere degree minute second
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromHemisphereDegreeMinuteSecond(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9120')

Format: hemisphere abbreviation (single character N S E or W) - degrees (integer) - arc-minutes (integer) - arc-seconds (real). Different symbol sets are in use as field separators for example º ' ".


Sexagesimal DMS
^^^^^^^^^^^^^^^


.. code-block:: php

    Degree::fromSexagesimalDMS(string $angle)
    Angle::makeUnit(string $angle, Angle::EPSG_SEXAGESIMAL_DMS)
    Angle::makeUnit(string $angle, 'urn:ogc:def:uom:EPSG::9110')

Format: signed degrees - period - minutes (2 digits) - integer seconds (2 digits) - fraction of seconds (any precision). Must include leading zero in minutes and seconds and exclude decimal point for seconds.

Arc second
----------


.. code-block:: php

    new ArcSecond(float $angle)
    Angle::makeUnit(float $angle, Angle::EPSG_ARC_SECOND)
    Angle::makeUnit(float $angle, 'urn:ogc:def:uom:EPSG::9104')

:math:`\frac{1}{3600}` degrees.

Milliarc second
^^^^^^^^^^^^^^^


.. code-block:: php

    new ArcSecond(float $angle / 1000)
    Angle::makeUnit(float $angle, Angle::EPSG_MILLIARC_SECOND)
    Angle::makeUnit(float $angle, 'urn:ogc:def:uom:EPSG::1031')

:math:`\frac{1}{3600000}` degrees.

Radian
------


.. code-block:: php

    new Radian(float $angle)
    Angle::makeUnit(Angle::EPSG_RADIAN)
    Angle::makeUnit(float $angle, 'urn:ogc:def:uom:EPSG::9101')

SI derived unit (standard unit) for angles.

Microradian
^^^^^^^^^^^


.. code-block:: php

    new Radian(float $angle / 1000000)
    Angle::makeunit(float $angle, Angle::EPSG_MICRORADIAN)
    Angle::makeUnit(float $angle, 'urn:ogc:def:uom:EPSG::9109')

:math:`\frac{1}{1000000}` radians.


Grad
----


.. code-block:: php

    new Grad(float $angle)
    Angle::makeUnit(float $angle, Angle::EPSG_GRAD)
    Angle::makeUnit(float $angle, 'urn:ogc:def:uom:EPSG::9105')

:math:`\frac{π}{200}` radians.

Centesimal second
^^^^^^^^^^^^^^^^^


.. code-block:: php

    new Radian(float $angle * M_PI / 2000000)
    Angle::makeUnit(float $angle, Angle::EPSG_CENTESIMAL_SECOND)
    Angle::makeUnit(float $angle, 'urn:ogc:def:uom:EPSG::9113')

:math:`\frac{1}{100}` of a centesimal minute or :math:`\frac{1}{10000}` th of a grad and gon = :math:`\frac{π/200}{10000}` radians.







