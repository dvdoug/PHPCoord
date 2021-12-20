Creating points
===============

.. include:: reflection/numOfCRS.txt

In PHPCoord, the core domain object is a ``Point``. A ``Point`` is constructed from set of coordinates (for example
latitude and longitude), and a *Coordinate Reference System (CRS)* which encodes all of the parameters that make a
particular system different from any other system. PHPCoord contains built-in knowledge of |numOfCRS| different CRSs, so in
almost all cases you only need to know the CRS name rather than the individual defining parameters. A full list of
built-in CRSs is :ref:`available here<builtincrs>`.

Ideally (but optionally), a ``Point`` also has a *coordinate epoch* aka the date the coordinates are intended to
represent. This is important for high-accuracy applications as :ref:`explained here<explained_epochs>`.

Each CRS contains within its definition the units of measurement to be used - for example the British National Grid
uses metres, but the Arkansas State Plane Coordinate System uses US Survey Feet. To avoid any confusion about
representation, all numbers in PHPCoord are strongly typed as value objects with conversions automatically performed
between them as needed. All outputs are in the defined units of the relevant CRS, even if the inputs were given in
different units. You may of course convert these units into other units if desired, but using units that are different
from those defined in the CRS itself may lead to confusion later on.

.. toctree::
    :maxdepth: 1

    creating_points_geographic
    creating_points_projected
    creating_points_geocentric
    creating_points_vertical
    creating_points_compound
