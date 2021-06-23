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

Geographic3D to Geographic2D+GravityRelatedHeight (OSGM-GB)
-----------------------------------------------------------

.. code-block:: php

    $point = CompoundPoint::create(...);
    $newPoint = $point->geographic3DTo2DPlusGravityHeightOSGM15(
        Geographic3D $to,
        OSTNOSGM15Grid $geoidHeightCorrectionModelFile,
        string $EPSGCodeForInterpolationCRS
    ); // returns a new GeographicPoint
