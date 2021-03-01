Compound points
===============

Geographic2D with Height Offsets
--------------------------------

.. code-block:: php

    $point = CompoundPoint::create(...);
    $newPoint = $point->geographic2DWithHeightOffsets(
        Geographic3D $to,
        Angle $latitudeOffset,
        Angle $longitudeOffset,
        Length $geoidUndulation
    ); // returns a new GeographicPoint

Vertical Offset and Slope
-------------------------

.. code-block:: php

    $point = CompoundPoint::create(...);
    $newPoint = $point->verticalOffset(
        Compound $to,
        Angle $ordinate1OfEvaluationPoint,
        Angle $ordinate2OfEvaluationPoint,
        Length $verticalOffset,
        Angle $inclinationInLatitude,
        Angle $inclinationInLongitude
    ); // returns a new CompoundPoint
