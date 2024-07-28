Distance calculations
=====================
PHPCoord can calculate the distance between two ``Point``\s via the ``calculateDistance()`` method.

.. code-block:: php

    public function calculateDistance(
        Point $to,
    ): Length

* The distance between two ``ProjectedPoint``\s is calculated via Pythagoras' theorem
* The distance between two ``GeographicPoint``\s or two ``GeocentricPoint``\s is calculated via Karney's formula
* The distance between two ``VerticalPoint``\s is calculated as simple difference

Example

.. code-block:: php

    $from = GeographicPoint::create(...);
    $to = GeographicPoint::create(...);
    $distance = $from->calculateDistance($to);
