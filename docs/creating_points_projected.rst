Projected points
================
A projected point is one that has an *east-west* distance and a *north-south* distance. These are most often called
*eastings* and *northings*, but sometimes *westings* and/or *southings* are used instead. Some coordinate systems eschew
directional naming and use just *x* and *y* instead, the meaning of which varies. PHPCoord's input always uses the
directional naming system.

If you have coordinates ``(x,y,h)``, then you will need a both a ``ProjectedPoint`` and a ``VerticalPoint`` and then to tie
them together with a ``CompoundPoint``.

.. caution::
    Do not confuse ``(x,y,h)`` with ``(x,y,z)``. ``(x,y,z)`` is used by Geocentric coordinate systems.



A ``ProjectedPoint`` can be constructed by calling one of the ``ProjectedPoint::create*`` methods, which have the
following signatures:

.. code-block:: php

    public static function createFromEastingNorthing(
        Length $easting,
        Length $northing,
        Projected $crs,
        ?DateTimeInterface $epoch = null
    ): ProjectedPoint

    public static function createFromWestingNorthing(
        Length $westing,
        Length $northing,
        Projected $crs,
        ?DateTimeInterface $epoch = null
    ): ProjectedPoint

    public static function createFromWestingSouthing(
        Length $westing,
        Length $southing,
        Projected $crs,
        ?DateTimeInterface $epoch = null
    ): ProjectedPoint

Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Projected;
    use PHPCoord\ProjectedPoint;
    use PHPCoord\UnitOfMeasure\Length\Metre;

    // Nelson's Column in British National Grid (unknown date), traditional arguments
    $crs = Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID);
    $point = ProjectedPoint::createFromEastingNorthing(
        new Metre(530017),
        new Metre(180419),
        $crs
    );

    // Nelson's Column in British National Grid (2020-02-01), traditional arguments
    $crs = Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID);
    $point = ProjectedPoint::createFromEastingNorthing(
        new Metre(530017),
        new Metre(180419),
        $crs,
        new DateTime('2020-02-01')
    );

    // Nelson's Column in British National Grid (unknown date), named arguments
    $crs = Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID);
    $point = ProjectedPoint::createFromEastingNorthing(
        easting: new Metre(530017),
        northing: new Metre(180419),
        crs: $crs
    );

    // Nelson's Column in British National Grid (2020-02-01), named arguments
    $crs = Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID);
    $point = ProjectedPoint::createFromEastingNorthing(
        easting: new Metre(530017),
        northing: new Metre(180419),
        epoch: new DateTime('2020-02-01'),
        crs: $crs
    );

    $easting = $point->getEasting(); // Length
    $northing = $point->getNorthing(); // Length
    $epoch = $point->getCoordinateEpoch(); // DateTimeImmutable|null
    $crs = $point->getCRS(); // Projected
    $asString = (string) $point; // '(530017, 180419)'

British National Grid
---------------------
.. sidebar:: GB grid references

    .. image:: images/osgb.png

(also known as Ordnance Survey National Grid)

In Great Britain, the convention is not to use as-is the easting and northing coordinates produced by the projection.
The country is divided into sub-grids of 100km×100km which are given 2 letter codes, and then coordinates are given
referenced to their position within the subgrid rather than the national origin. Thus, Nelson's Column
``(530017, 180419)`` would usually be referred to as ``TQ 30017 80419``. Exchanging numbers for letters in this way
sounds complex, but having the grid letters aids greatly in finding the right map sheet when working with paper
maps.

Using the letters also clearly distinguishes between "pure" eastings/northings and the grid system. This has the benefit
that it becomes permissible to truncate coordinates when full metre-level precision is not required, e.g. when trying to
locate a building. For example, if just trying to locate Trafalger Square as a whole rather than specifically Nelson's
statue, a coordinate like ``TQ 300 804`` could be given which is accurate to ~100m. This would not be possible to give
purely numerically, as it could be confused with an actual full coordinate for a different point.

A ``BritishNationalGridPoint`` is automatically created from ``ProjectedPoint::createFromEastingNorthing()`` if
the relevant CRS is supplied - the examples above all actually create a ``BritishNationalGridPoint``
rather than a standard ``ProjectedPoint``. Alternatively, you can construct one directly.

.. code-block:: php

    // from full eastings and northings
    public function __construct(
        Length $easting,
        Length $northing,
        ?DateTimeInterface $epoch = null
    ): BritishNationalGridPoint

    // from  a grid reference
    public static function fromGridReference(
        string $reference,
        ?DateTimeInterface $epoch = null
    ): BritishNationalGridPoint

Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Projected;
    use PHPCoord\BritishNationalGridPoint;
    use PHPCoord\ProjectedPoint;
    use PHPCoord\UnitOfMeasure\Length\Metre;

    // Nelson's Column
    $crs = Projected::fromSRID(Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID);
    $point = ProjectedPoint::createFromEastingNorthing(
        new Metre(530017),
        new Metre(180419),
        $crs
    );

    // also Nelson's Column
    $point = new BritishNationalGridPoint::fromGridReference(new Metre(530017), new Metre(180419)); // CRS is implied

    // also Nelson's Column
    $point = BritishNationalGridPoint::fromGridReference('TQ 30017 80419'); // CRS is implied

    $isBritishGrid = $point instanceof BritishNationalGridPoint; //true
    $asString = (string) $point; // '(530017, 180419)'
    $asString = $point->asGridReference(10); // 'TQ3001780419'
    $asString = $point->asGridReference(6); // 'TQ300804'
    $asString = $point->asGridReferenceWithSpaces(10); // 'TQ 30017 80419'
    $asString = $point->asGridReferenceWithSpaces(6); // 'TQ 300 804'

Irish Grid
----------
Ireland adopted a similar system to Britain that also uses grid letters. Each 100km×100km grid square in Ireland is
identified by a single letter rather than by two, in other respects the system is near identical.

A ``IrishGridPoint`` is automatically created from ``ProjectedPoint::createFromEastingNorthing()`` if
the relevant CRS is supplied. Alternatively, you can construct one directly.

.. code-block:: php

    // from full eastings and northings
    public function __construct(
        Length $easting,
        Length $northing,
        ?DateTimeInterface $epoch = null
    ): IrishGridPoint

    // from  a grid reference
    public static function fromGridReference(
        string $reference,
        ?DateTimeInterface $epoch = null
    ): IrishGridPoint

Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Projected;
    use PHPCoord\IrishGridPoint;
    use PHPCoord\ProjectedPoint;
    use PHPCoord\UnitOfMeasure\Length\Metre;

    // Spire of Dublin
    $crs = Projected::fromSRID(Projected::EPSG_TM75_IRISH_GRID);
    $point = ProjectedPoint::createFromEastingNorthing(
        new Metre(315904),
        new Metre(234671),
        $crs
    );

    // also Spire of Dublin
    $point = new IrishGridPoint(new Metre(315904), new Metre(234671)); // CRS is implied

    // also Spire of Dublin
    $point = IrishGridPoint::fromGridReference('O1590434671'); // CRS is implied

    $isIrishGrid = $point instanceof IrishGridPoint; //true
    $asString = (string) $point; // '(315904, 234671)'
    $asString = $point->asGridReference(10); // 'O1590434671'
    $asString = $point->asGridReference(6); // 'O159346'
    $asString = $point->asGridReferenceWithSpaces(10); // 'O 15904 34671'
    $asString = $point->asGridReferenceWithSpaces(6); // 'O 159 346'

Irish Transverse Mercator
-------------------------
In 2001, Ireland introduced a replacement system for the Irish Grid system known as Irish Transverse Mercator (ITM).
In ITM eastings and northings are always given in full. ITM does not use grid letters.

Nonetheless, PHPCoord comes with a dedicated ``IrishTransverseMercatorPoint`` class. This class exists only to try and
mitigate any confusion in advance between the two systems - a developer who was not aware of the older system, might
accidentally try to use a ``IrishGridPoint`` thinking it was the right thing to do when they actually have coordinates
in the ITM system. The class has no additional functionality over a standard ``ProjectedPoint``.

.. code-block:: php

    // from full eastings and northings
    public function __construct(
        Length $easting,
        Length $northing,
        ?DateTimeInterface $epoch = null
    ): IrishTransverseMercatorPoint

Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Projected;
    use PHPCoord\IrishTransverseMercatorPoint;
    use PHPCoord\ProjectedPoint;
    use PHPCoord\UnitOfMeasure\Length\Metre;

    // Spire of Dublin
    $crs = Projected::fromSRID(Projected::EPSG_IRENET95_IRISH_TRANSVERSE_MERCATOR);
    $point = ProjectedPoint::createFromEastingNorthing(
        new Metre(715830),
        new Metre(734697),
        $crs
    );

    // also Spire of Dublin
    $point = new IrishTransverseMercatorPoint(new Metre(715830), new Metre(734697)); // CRS is implied

    $isITM = $point instanceof IrishTransverseMercatorPoint; //true
    $asString = (string) $point; // '(715830, 734697)'
