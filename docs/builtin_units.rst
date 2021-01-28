Built in units of measure
=========================

Coordinates have many different types of unit e.g. latitudes are angles, but eastings are lengths.

There are also many different units in use across the world and across history, for instance most current mapping uses
the metre for lengths, but older mapping often used feet or yards.

To avoid confusion about what any given number is intended to represent,
all units in PHPCoord are typed as value objects.

.. tip::
    All unit objects have helper methods ``->getValue()`` and ``->getUnitName()``, and implement the ``Stringable``
    interface

.. toctree::
    :maxdepth: 1

    builtin_units_angles
    builtin_units_lengths
    builtin_units_scales
    builtin_units_times
    builtin_units_rates
