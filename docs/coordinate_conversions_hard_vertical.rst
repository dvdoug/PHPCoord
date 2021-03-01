Vertical points
===============

Height <=> Depth reversal
-------------------------

.. code-block:: php

    $point = VerticalPoint::create(...);
    $newPoint = $point->heightDepthReversal(
        Vertical $to
    ); // returns a new VerticalPoint

Vertical Offset
---------------

.. code-block:: php

    $point = VerticalPoint::create(...);
    $newPoint = $point->verticalOffset(
        Vertical $to,
        Length $verticalOffset
    ); // returns a new VerticalPoint
