Geocentric points
=================

Coordinate Frame rotation
-------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
    $newPoint = $point->coordinateFrameRotation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference
    ); // returns a new GeocentricPoint

Geocentric translation
----------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
    $newPoint = $point->geocentricTranslation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation
    ); // returns a new GeocentricPoint

Geographic <=> geocentric conversion
------------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
    $newPoint = $point->geographicGeocentric(
        Geographic $to
    ); // returns a new GeographicPoint

Molodensky-Badekas Coordinate Frame rotation
--------------------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
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
    ); // returns a new GeocentricPoint

Molodensky-Badekas Position Vector transformation
-------------------------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
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
    ); // returns a new GeocentricPoint

Position Vector transformation
------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
    $newPoint = $point->positionVectorTransformation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference
    ); // returns a new GeocentricPoint

Time-dependent Coordinate Frame rotation
----------------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
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
    ); // returns a new GeocentricPoint

Time-dependent Position Vector tranformation
--------------------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
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
    ); // returns a new GeocentricPoint

Time-specific Coordinate Frame rotation
---------------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
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
    ); // returns a new GeocentricPoint

Time-specific Position Vector transformation
--------------------------------------------

.. code-block:: php

    $point = GeocentricPoint::create(...);
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
    ); // returns a new GeocentricPoint
