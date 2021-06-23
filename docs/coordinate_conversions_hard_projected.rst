Projected points
================

Affine parametric transformation
--------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->affineParametricTransform(
        Projected $to,
        Length $A0,
        Coefficient $A1,
        Coefficient $A2,
        Length $B0,
        Coefficient $B1,
        Coefficient $B2,
        bool $inReverse
    ); // returns a new ProjectedPoint

Albers Equal Area
-----------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->albersEqualArea(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new GeographicPoint

American Polyconic
------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->americanPolyconic(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Bonne
-----

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->bonne(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Bonne (south orientated)
------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->bonneSouthOrientated(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Cartesian Grid Offsets
----------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->offsets(
        Projected $to,
        Length $eastingOffset,
        Length $northingOffset
    ); // returns a new ProjectedPoint

Cassini-Soldner
---------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->cassiniSoldner(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Colombia Urban
--------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->columbiaUrban(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing,
        Length $projectionPlaneOriginHeight
    ); // returns a new GeographicPoint

Complex polynomial
------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->complexPolynomial(
        Projected $to,
        Length $ordinate1OfEvaluationPointInSourceCRS,
        Length $ordinate2OfEvaluationPointInSourceCRS,
        Length $ordinate1OfEvaluationPointInTargetCRS,
        Length $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scalingFactorForSourceCRSCoordDifferences,
        Scale $scalingFactorForTargetCRSCoordDifferences,
        Scale $A1,
        Scale $A2,
        Scale $A3,
        Scale $A4,
        Scale $A5,
        Scale $A6,
        ?Scale $A7 = null,
        ?Scale $A8 = null
    ); // returns a new ProjectedPoint

Equal Earth
-----------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->equalEarth(
        Geographic $to,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Equidistant Cylindrical
-----------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->equidistantCylindrical(
        Geographic $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

General polynomial
------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->generalPolynomial(
        Projected $to,
        Length $ordinate1OfEvaluationPointInSourceCRS,
        Length $ordinate2OfEvaluationPointInSourceCRS,
        Length $ordinate1OfEvaluationPointInTargetCRS,
        Length $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scalingFactorForSourceCRSCoordDifferences,
        Scale $scalingFactorForTargetCRSCoordDifferences,
        Scale $A0,
        Scale $B0,
        array $powerCoefficients
    ); // returns a new ProjectedPoint

Guam Projection
---------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->guamProjection(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Hotine Oblique Mercator (variant A)
-----------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->obliqueMercatorHotineVariantA(
        Geographic $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Hotine Oblique Mercator (variant B)
-----------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->obliqueMercatorHotineVariantB(
        Geographic $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $eastingAtProjectionCentre,
        Length $northingAtProjectionCentre
    ); // returns a new GeographicPoint

Hyperbolic Cassini-Soldner
--------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->hyperbolicCassiniSoldner(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Krovak
------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->krovak(
        Geographic $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfOrigin,
        Angle $coLatitudeOfConeAxis,
        Angle $latitudeOfPseudoStandardParallel,
        Scale $scaleFactorOnPseudoStandardParallel,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Krovak Modified
---------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->krovakModified(
        Geographic $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfOrigin,
        Angle $coLatitudeOfConeAxis,
        Angle $latitudeOfPseudoStandardParallel,
        Scale $scaleFactorOnPseudoStandardParallel,
        Length $falseEasting,
        Length $falseNorthing,
        Length $ordinate1OfEvaluationPoint,
        Length $ordinate2OfEvaluationPoint,
        Coefficient $C1,
        Coefficient $C2,
        Coefficient $C3,
        Coefficient $C4,
        Coefficient $C5,
        Coefficient $C6,
        Coefficient $C7,
        Coefficient $C8,
        Coefficient $C9,
        Coefficient $C10
    ); // returns a new GeographicPoint

Laborde Oblique Mercator
------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->obliqueMercatorLaborde(
        Geographic $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Lambert Azimuthal Equal Area (ellipsoidal)
------------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertAzimuthalEqualArea(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Lambert Azimuthal Equal Area (spherical)
----------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertAzimuthalEqualAreaSpherical(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Lambert Conic Conformal (1SP)
-----------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertConicConformal1SP(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Lambert Conic Conformal (1SP) variant B
---------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertConicConformal1SPVariantB(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new GeographicPoint

Lambert Conic Conformal (west orientated)
-----------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertConicConformalWestOrientated(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Lambert Conic Conformal (2SP)
-----------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertConicConformal2SP(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new GeographicPoint

Lambert Conic Conformal (2SP Michigan)
--------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertConicConformal2SPMichigan(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin,
        Scale $ellipsoidScalingFactor
    ); // returns a new GeographicPoint

Lambert Conic Conformal (2SP Belgium)
-------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertConicConformal2SPBelgium(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new GeographicPoint

Lambert Conic Near-Conformal
----------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertConicNearConformal(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Lambert Cylindrical Equal Area
------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->lambertCylindricalEqualArea(
        Geographic $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Mercator (variant A)
--------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->mercatorVariantA(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Mercator (variant B)
--------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->mercatorVariantB(
        Geographic $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Modified Azimuthal Equidistant
------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->modifiedAzimuthalEquidistant(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

New Zealand Map Grid
--------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->newZealandMapGrid(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Oblique Stereographic
---------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->obliqueStereographic(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

OSTN15 (Ordnance Survey National Transformation)
------------------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->OSTN15(
        Geographic2D $to,
        OSTNOSGM15Grid $eastingAndNorthingDifferenceFile
    ); // returns a new GeographicPoint

Polar Stereographic (variant A)
-------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->polarStereographicVariantA(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Polar Stereographic (variant B)
-------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->polarStereographicVariantB(
        Geographic $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Polar Stereographic (variant C)
-------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->polarStereographicVariantC(
        Geographic $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new GeographicPoint

Popular Visualisation Pseudo Mercator
-------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->popularVisualisationPseudoMercator(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Similarity transformation
-------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->similarityTransformation(
        Projected $to,
        Length $ordinate1OfEvaluationPointInTargetCRS,
        Length $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scaleFactorForSourceCRSAxes,
        Angle $rotationAngleOfSourceCRSAxes,
        bool $inReverse
    ); // returns a new ProjectedPoint

Transverse Mercator
-------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->transverseMercator(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint

Transverse Mercator Zoned Grid System
-------------------------------------

.. code-block:: php

    $point = ProjectedPoint::createFromEastingNorthing(...);
    $newPoint = $point->transverseMercatorZonedGrid(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $initialLongitude,
        Angle $zoneWidth,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new GeographicPoint






