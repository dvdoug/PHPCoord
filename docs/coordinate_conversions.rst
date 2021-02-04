Coordinate conversions
======================
PHPCoord can convert coordinates representing a point from one *Coordinate Reference System (CRS)* to another one. In
this simplest case this might just be converting units (e.g. feet to metres or vice versa), but in most cases involves
running one or more complex algorithms involving a **lot** of trigonometry on the numbers.

Most algorithms are not standalone, but require parameters to be work - for instance many require the origin point
to be specified and these points differ across mapping systems even when they utilise the same algorithm. Knowing both
the algorithm(s) to be used and the parameters used to tune them is essential for high-accuracy conversions.

.. note::
    If the Earth were actually the shape of an ellipsoid, algorithms could be devised so that conversions between systems
    could be performed with no absolutely no loss of accuracy - systems would in effect be mathematically equivalent.

    Unfortunately the Earth isn't an ellipsoid and (pre-GPS) all coordinates were calculated by individual humans
    operating on the Earth's actual, irregular surface using instruments subject to observation error. That means
    that conversions between CRSs are not just converting between mathematical ideals but often convert between
    *sets of observations*. When this happens it means that the conversions between the CRSs can only ever be
    an approximation (typically within a few metres) rather a precise transformation.

    A corollary is that when dealing with CRSs that cover significant land area it is possible (and common) for mapping
    agencies to derive multiple different parameter sets for use to obtain better accuracy depending on location. For
    example when converting from ED50 to ETRS89 you would ideally use slightly different parameters for a point inside
    Portugal than for a point inside Norway.

PHPCoord offers two models of operation for coordinate conversion:

* The hard way in which you can directly utilise one of the many implemented algorithms along with the parameters of your
  choice to keep full control over the conversion
* The easy way in which PHPCoord consults the built-in EPSG dataset for the relevant algorithm(s) to use and best
  parameters to use for your chosen conversion and executes them behind the scenes on your behalf. Recommended.

.. toctree::
    :maxdepth: 1

    coordinate_conversions_easy
    coordinate_conversions_hard
