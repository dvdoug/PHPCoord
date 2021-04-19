Compound points
===============

A compound point ties together horizontal coordinates (2D) and a vertical coordinate (1D) to fully locate a point in 3D.

A ``CompoundPoint`` can be constructed by calling ``CompoundPoint::create``, which has the following signature:

.. code-block:: php

    public static function create(
        GeographicPoint|ProjectedPoint $horizontalPoint,
        VerticalPoint $verticalPoint,
        Compound $crs,
        ?DateTimeInterface $epoch = null
    ): CompoundPoint


Example:

.. code-block:: php

    <?php
    use PHPCoord\CoordinateReferenceSystem\Projected;
    use PHPCoord\CoordinateReferenceSystem\Vertical;
    use PHPCoord\CompoundPoint;
    use PHPCoord\ProjectedPoint;
    use PHPCoord\VerticalPoint;
    use PHPCoord\UnitOfMeasure\Length\Metre;

    // Horizontal location of Ben Nevis peak using British National Grid
    $horizontalCRS = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
    $horizontalPoint = ProjectedPoint::createFromEastingNorthing(
        new Metre(216692),
        new Metre(771274),
        $horizontalCRS
    );

    // Height above Newlyn Sea Level of Ben Nevis peak
    $verticalCRS = Vertical::fromSRID(Vertical::EPSG_ODN_HEIGHT);
    $verticalPoint = VerticalPoint::create(
        new Metre(1345),
        $verticalCRS
    );

    // Full coordinate of Ben Nevis Peak
    $compoundCRS = Compound::fromSRID(Compound::EPSG_OSGB36_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT);
    $point = CompoundPoint::create(
        $horizontalPoint,
        $verticalPoint,
        $compoundCRS
    );

    $horizontal = $point->getHorizontalPoint(); // GeographicPoint|ProjectedPoint
    $vertical = $point->getVerticalPoint(); // VerticalPoint
    $epoch = $point->getCoordinateEpoch(); // DateTimeImmutable|null
    $crs = $point->getCRS(); // Compound
    $asString = (string) $point; // '((216692, 771274), (1345))'
