Coordinate conversions
======================
PHPCoord can convert coordinates representing a point from one *Coordinate Reference System (CRS)* to another one. In
this simplest case this might just be converting units (e.g. feet to metres or vice versa), but in most cases involves
running one or more complex algorithms on the numbers.

Most such algorithms are not standalone, but require parameters to work - for instance many require an origin point
to be specified and these points differ across mapping systems even when they utilise the same algorithm. Knowing both
the algorithm(s) to be used and the parameters used to tune them is essential to perform high-accuracy conversions.

PHPCoord offers two models of operation for coordinate conversion:

* The hard way in which you can directly utilise one of the many implemented algorithms along with the parameters of your
  choice to keep full control over the conversion
* The easy way in which PHPCoord consults the built-in EPSG dataset for the relevant algorithm(s) to use and best
  parameters to use for your chosen conversion and executes them behind the scenes on your behalf.

.. toctree::
    :maxdepth: 1

    coordinate_conversions_easy
    coordinate_conversions_hard
