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
