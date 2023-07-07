Vertical points
===============

A vertical point is one that has a *height* (or *depth* as negative) component only. Since this is of limited practical
use, they are usually paired with 2D ``GeographicPoint`` or a ``ProjectedPoint`` as part of a ``CompoundPoint``.

A ``VerticalPoint`` can be constructed by calling ``VerticalPoint::create``, which has the following signature:

.. code-block:: php

    public static function create(
        Vertical $crs,
        Length $height,
        ?DateTimeInterface $epoch = null
    ): VerticalPoint


Examples:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Vertical;
    use PHPCoord\Point\VerticalPoint;
    use PHPCoord\UnitOfMeasure\Length\Metre;

    // an arbitrary height in New Zealand Vertical Datum (unknown date), traditional arguments
    $crs = Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT);
    $point = VerticalPoint::create(
        $crs,
        new Metre(12.34),
    );

    // an arbitrary height in New Zealand Vertical Datum (2020-02-01), traditional arguments
    $crs = Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT);
    $point = VerticalPoint::create(
        $crs,
        new Metre(12.34),
        new DateTime('2020-02-01')
    );

    // an arbitrary height in New Zealand Vertical Datum (unknown date), named arguments
    $crs = Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT);
    $point = VerticalPoint::create(
        height: new Metre(12.34),
        crs: $crs
    );

    // an arbitrary height in New Zealand Vertical Datum (2020-02-01), named arguments
    $crs = Vertical::fromSRID(Vertical::EPSG_NZVD2016_HEIGHT);
    $point = VerticalPoint::create(
        height: new Metre(12.34),
        epoch: new DateTime('2020-02-01'),
        crs: $crs
    );

    $height = $point->getHeight(); // Length
    $epoch = $point->getCoordinateEpoch(); // DateTimeImmutable|null
    $crs = $point->getCRS(); // Vertical
    $asString = (string) $point; // '(12.34)'
