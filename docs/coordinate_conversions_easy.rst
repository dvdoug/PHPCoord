The easy way
============

When working with the built-in *Coordinate Reference Systems*, PHPCoord can usually\ [#f1]_ convert the
coordinates in any given ``Point`` to be in a different system by calling the ``convert()`` method.

.. code-block:: php

    $newPoint = $point->convert(
        CoordinateReferenceSystem $to,
        bool $ignoreBoundaryRestrictions = false
    ); // returns a new Point

Ignoring the second optional parameter for now, calling ``convert()`` will first look to see if the built-in
dataset knows how to perform a direct conversion. If it can, then PHPCoord will automatically invoke the
relevant conversion methods with the appropriate parameters and return a new ``Point`` object with the adjusted
coordinates in the target CRS.

Although PHPCoord has knowledge of thousands of different conversions, this does not cover many scenarios. For example
there is no published direct conversion between a British National Grid reference and a UTM Grid reference. In these
scenarios PHPCoord can "chain" conversions it does know about to achieve the desired result. For that scenario, it would
automatically calculate British National Grid -> OSGB36 -> WGS84 -> UTM. This ability to chain means conversion
between almost any two CRSs is possible as long as they have a common linkage.

.. code-block:: php

    $from = ProjectedPoint::createFromEastingNorthing(
        new Metre(577275),
        new Metre(69741),
        Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID)
    );
    $toCRS = Projected::fromSRID(Projected::EPSG_WGS_84_UTM_GRID_SYSTEM_NORTHERN_HEMISPHERE);
    $to = $from->convert($toCRS);

.. note::

    Calculating every single possible permutation of chain between two CRSs is very computationally expensive
    and so for practicality PHPCoord limits the chain depth to 5 (i.e. the source CRS, 3 intermediate CRSs and
    the target CRS). If you know a transformation should be possible, but PHPCoord cannot find it you may wish
    to try an explicit 2-stage conversion (e.g. source to WGS84, WGS84 to target).

Boundaries
----------
Every CRS has a defined area ("extent") over which it operates. Some are worldwide (e.g WGS84), but most are regional
(e.g. NAD83) or country-specific (e.g. GDA94). Trying to convert from one region/country specific CRS to
another region/country CRS is likely to result in either inaccurate or completely nonsensical coordinates due to
the relevant algorithms being designed and tested only over their defined areas. Plotting a point in Tokyo onto
the New Zealand Map Grid just shouldn't be done, regardless if a chain can be found through e.g. WGS84.

By default therefore PHPCoord will not allow such conversions to take place.

There are occasions however where the formal definitions of the CRS and real-life conflict - for example in Germany
(which is partially in UTM zone 32 and partially in zone 33), coordinates are sometimes requested as zone 32-based
even for points that are in zone 33. The administrative convenience is considered to outweigh the slight loss of
accuracy of extending the zone.

If you are sure that you know what you're doing, you can set the optional parameter ``$ignoreBoundaryRestrictions``
to ``true``.

.. caution::
    The importance of boundary checking to ensure fidelity of results means that converting a standalone
    ``VerticalPoint`` cannot safely be done. ``VerticalPoint`` objects therefore do not have a ``->convert`` method.

    In practice this should not affect you as a ``VerticalPoint`` will normally be used as part of a ``CompoundPoint``.

.. rubric:: Footnotes

.. [#f1] There are over 36 million possible combinations of source and target CRS. They have not all been tested...
