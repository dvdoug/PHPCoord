Geographic points
=================

3D <=> 2D conversion
--------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->threeDToTwoD(
        Geographic $to
    ); // returns a new GeographicPoint

Abridged Molodensky
--------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->abridgedMolodensky(
        Geographic $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Length $differenceInSemiMajorAxis,
        Scale $differenceInFlattening
    ); // returns a new GeographicPoint

Albers Equal Area
-----------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->albersEqualArea(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new ProjectedPoint

American Polyconic
------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->americanPolyconic(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Bonne
-----

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->bonne(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Bonne (south orientated)
------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->bonneSouthOrientated(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Cassini-Soldner
---------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->cassiniSoldner(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Colombia Urban
--------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->columbiaUrban(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing,
        Length $projectionPlaneOriginHeight
    ); // returns a new ProjectedPoint

Coordinate Frame rotation
-------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->coordinateFrameRotation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference
    ); // returns a new GeographicPoint

Equal Earth
-----------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->equalEarth(
        Projected $to,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Equidistant Cylindrical
-----------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->equidistantCylindrical(
        Projected $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

General polynomial
------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->generalPolynomial(
        Geographic $to,
        Angle $ordinate1OfEvaluationPointInSourceCRS,
        Angle $ordinate2OfEvaluationPointInSourceCRS,
        Angle $ordinate1OfEvaluationPointInTargetCRS,
        Angle $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scalingFactorForSourceCRSCoordDifferences,
        Scale $scalingFactorForTargetCRSCoordDifferences,
        Scale $A0,
        Scale $B0,
        array $powerCoefficients
    ); // returns a new GeographicPoint

Geocentric translation
----------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geocentricTranslation(
        Geographic $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation
    ); // returns a new GeographicPoint

Geocentric translation by grid interpolation (IGNF)
---------------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geocentricTranslationByGridInterpolationIGNF(
        Geographic $to,
        IGNFGeocentricTranslationGrid $geocentricTranslationFile,
        string $EPSGCodeForInterpolationCRS,
        string $EPSGCodeForStandardCT,
        bool $inReverse
    ); // returns a new GeographicPoint

Geographic <=> geocentric conversion
------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geographicGeocentric(
        Geocentric $to
    ); // returns a new GeocentricPoint

Geographic2D offsets
--------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geographic2DOffsets(
        Geographic $to,
        Angle $latitudeOffset,
        Angle $longitudeOffset
    ); // returns a new GeographicPoint

Geographic2D with Height Offsets
--------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geographic2DWithHeightOffsets(
        Compound $to,
        Angle $latitudeOffset,
        Angle $longitudeOffset,
        Length $geoidUndulation
    ); // returns a new CompoundPoint

Geographic3D to Geographic2D+GravityRelatedHeight (GTX)
-----------------------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geographic3DTo2DPlusGravityHeightGTX(
        Compound $to,
        GTXGrid $geoidHeightCorrectionModelFile
    ); // returns a new CompoundPoint

Geographic3D to Geographic2D+GravityRelatedHeight (OSGM-GB)
-----------------------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geographic3DTo2DPlusGravityHeightOSGM15(
        Compound $to,
        OSTNOSGM15Grid $geoidHeightCorrectionModelFile,
        string $EPSGCodeForInterpolationCRS
    ); // returns a new CompoundPoint

Geographic3D to GravityRelatedHeight (GTX)
----------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geographic3DToGravityHeightGTX(
        Vertical $to,
        GTXGrid $geoidHeightCorrectionModelFile
    ); // returns a new VerticalPoint

Geographic3D to GravityRelatedHeight (OSGM-GB)
----------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->geographic3DToGravityHeightOSGM15(
        Vertical $to,
        OSTNOSGM15Grid $geoidHeightCorrectionModelFile
    ); // returns a new VerticalPoint

Guam Projection
---------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->guamProjection(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Hotine Oblique Mercator (variant A)
-----------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->obliqueMercatorHotineVariantA(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Hotine Oblique Mercator (variant B)
-----------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->obliqueMercatorHotineVariantB(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $eastingAtProjectionCentre,
        Length $northingAtProjectionCentre
    ); // returns a new ProjectedPoint

Hyperbolic Cassini-Soldner
--------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->hyperbolicCassiniSoldner(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Krovak
------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->krovak(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfOrigin,
        Angle $coLatitudeOfConeAxis,
        Angle $latitudeOfPseudoStandardParallel,
        Scale $scaleFactorOnPseudoStandardParallel,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Krovak Modified
---------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->krovakModified(
        Projected $to,
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
    ); // returns a new ProjectedPoint

Laborde Oblique Mercator
------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->obliqueMercatorLaborde(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Lambert Azimuthal Equal Area (ellipsoidal)
------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertAzimuthalEqualArea(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Lambert Azimuthal Equal Area (spherical)
----------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertAzimuthalEqualAreaSpherical(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Lambert Conic Conformal (1SP)
-----------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertConicConformal1SP(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Lambert Conic Conformal (1SP) variant B
---------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertConicConformal1SPVariantB(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new ProjectedPoint

Lambert Conic Conformal (west orientated)
-----------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertConicConformalWestOrientated(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Lambert Conic Conformal (2SP)
-----------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertConicConformal2SP(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new ProjectedPoint

Lambert Conic Conformal (2SP Michigan)
--------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertConicConformal2SPMichigan(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin,
        Scale $ellipsoidScalingFactor
    ); // returns a new ProjectedPoint

Lambert Conic Conformal (2SP Belgium)
-------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertConicConformal2SPBelgium(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new ProjectedPoint

Lambert Conic Near-Conformal
----------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertConicNearConformal(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Lambert Cylindrical Equal Area
------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->lambertCylindricalEqualArea(
        Projected $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Longitude rotation
------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->longitudeRotation(
        Geographic $to,
        Angle $longitudeOffset
    ); // returns a new GeographicPoint

Madrid to ED50 polynomial
-------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->madridToED50Polynomial(
        Geographic2D $to,
        Scale $A0,
        Scale $A1,
        Scale $A2,
        Scale $A3,
        Angle $B00,
        Scale $B0,
        Scale $B1,
        Scale $B2,
        Scale $B3
    ); // returns a new GeographicPoint

Mercator (variant A)
--------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->mercatorVariantA(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Mercator (variant B)
--------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->mercatorVariantB(
        Projected $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Modified Azimuthal Equidistant
------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->modifiedAzimuthalEquidistant(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Molodensky
----------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->molodensky(
        Geographic $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Length $differenceInSemiMajorAxis,
        Scale $differenceInFlattening
    ); // returns a new GeographicPoint

Molodensky-Badekas Coordinate Frame rotation
--------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->coordinateFrameMolodenskyBadekas(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Length $ordinate1OfEvaluationPoint,
        Length $ordinate2OfEvaluationPoint,
        Length $ordinate3OfEvaluationPoint
    ); // returns a new GeographicPoint

Molodensky-Badekas Position Vector transformation
-------------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->positionVectorMolodenskyBadekas(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Length $ordinate1OfEvaluationPoint,
        Length $ordinate2OfEvaluationPoint,
        Length $ordinate3OfEvaluationPoint
    ); // returns a new GeographicPoint

NADCON5
-------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->NADCON5(
        Geographic $to,
        NADCON5Grid $latitudeDifferenceFile,
        NADCON5Grid $longitudeDifferenceFile,
        ?NADCON5Grid $ellipsoidalHeightDifferenceFile = null,
        bool $inReverse
    ); // returns a new GeographicPoint

New Zealand Map Grid
--------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->newZealandMapGrid(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

NTv2
----

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->NTv2(
        Geographic $to,
        NTv2Grid $latitudeAndLongitudeDifferenceFile,
        bool $inReverse
    ); // returns a new GeographicPoint

Oblique Stereographic
---------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->obliqueStereographic(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

OSTN15 (Ordnance Survey National Transformation)
------------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->OSTN15(
        Projected $to,
        OSTNOSGM15Grid $eastingAndNorthingDifferenceFile
    ); // returns a new ProjectedPoint

Polar Stereographic (variant A)
-------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->polarStereographicVariantA(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Polar Stereographic (variant B)
-------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->polarStereographicVariantB(
        Projected $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Polar Stereographic (variant C)
-------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->polarStereographicVariantC(
        Projected $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ); // returns a new ProjectedPoint

Popular Visualisation Pseudo Mercator
-------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->popularVisualisationPseudoMercator(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Position Vector transformation
------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->positionVectorTransformation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference
    ); // returns a new GeographicPoint

Reversible polynomial
---------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->reversiblePolynomial(
        Geographic $to,
        Angle $ordinate1OfEvaluationPoint,
        Angle $ordinate2OfEvaluationPoint,
        Scale $scalingFactorForCoordDifferences,
        Scale $A0,
        Scale $B0,
        $powerCoefficients
    ); // returns a new GeographicPoint

Time-dependent Coordinate Frame rotation
----------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->timeDependentCoordinateFrameRotation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Rate $rateOfChangeOfXAxisTranslation,
        Rate $rateOfChangeOfYAxisTranslation,
        Rate $rateOfChangeOfZAxisTranslation,
        Rate $rateOfChangeOfXAxisRotation,
        Rate $rateOfChangeOfYAxisRotation,
        Rate $rateOfChangeOfZAxisRotation,
        Rate $rateOfChangeOfScaleDifference,
        Time $parameterReferenceEpoch
    ); // returns a new GeographicPoint

Time-dependent Position Vector tranformation
--------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->timeDependentPositionVectorTransformation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Rate $rateOfChangeOfXAxisTranslation,
        Rate $rateOfChangeOfYAxisTranslation,
        Rate $rateOfChangeOfZAxisTranslation,
        Rate $rateOfChangeOfXAxisRotation,
        Rate $rateOfChangeOfYAxisRotation,
        Rate $rateOfChangeOfZAxisRotation,
        Rate $rateOfChangeOfScaleDifference,
        Time $parameterReferenceEpoch
    ); // returns a new GeographicPoint

Time-specific Coordinate Frame rotation
---------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->timeSpecificCoordinateFrameRotation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Time $transformationReferenceEpoch
    ); // returns a new GeographicPoint

Time-specific Position Vector transformation
--------------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->timeSpecificPositionVectorTransformation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Time $transformationReferenceEpoch
    ); // returns a new GeographicPoint

Transverse Mercator
-------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->transverseMercator(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint

Transverse Mercator Zoned Grid System
-------------------------------------

.. code-block:: php

    $point = GeographicPoint::create(...);
    $newPoint = $point->transverseMercatorZonedGrid(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $initialLongitude,
        Angle $zoneWidth,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ); // returns a new ProjectedPoint
