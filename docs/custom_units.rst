Custom units of measure
=======================

Coordinates have many different types of unit e.g. latitudes are angles, but eastings are lengths.

There are also many different units in use across the world and across history, for instance most current mapping uses
the metre for lengths, but older mapping often used feet or yards.

To avoid confusion about what any given number is intended to represent, all units in PHPCoord are typed as value objects.

In addition to the many built-in units, you can also register and make use of custom units. To do this, first create an
implementation class for your unit that extends one of the following base classes:

 - ``PHPCoord\UnitOfMeasure\Angle\Angle``
 - ``PHPCoord\UnitOfMeasure\Length\Length``
 - ``PHPCoord\UnitOfMeasure\Scale\Scale``
 - ``PHPCoord\UnitOfMeasure\Time\Time``

.. tip::
    You only have to implement 4 required methods. All ``UnitOfMeasure`` require implementations of ``__construct()``,
    ``getUnitName()`` and ``getValue()``. There is then 1 additional method that is specific to each type of unit, e.g.
    a custom ``Angle`` type would be required to implement an ``asRadians()`` method. Your IDE will guide you through
    what is required, although of course you may reference the existing units as a guide.

Then register it, by calling the appropriate registration function:

 - ``PHPCoord\UnitOfMeasure\Angle\Angle::registerCustomUnit(string $srid, string $name, string $implementingClassFQCN)``
 - ``PHPCoord\UnitOfMeasure\Length\Length::registerCustomUnit(string $srid, string $name, string $implementingClassFQCN)``
 - ``PHPCoord\UnitOfMeasure\Scale\Scale::registerCustomUnit(string $srid, string $name, string $implementingClassFQCN)``
 - ``PHPCoord\UnitOfMeasure\Time\Time::registerCustomUnit(string $srid, string $name, string $implementingClassFQCN)``

Once registered, your custom unit can be used exactly like any other unit built into PHPCoord.

.. tip::
    A SRID (spatial reference identifier), is a just a unique string that can be used to identify the specific unit
    in question. The PHPCoord built-in units all use an URN for this purpose, but you can use anything you like as long
    as it is unique. For a unit, this might include reusing the FQCN.


For example, a custom ``HalfKilometre`` unit, could be implemented like this:

.. code-block:: php

    <?php
    namespace YourApp\Geo\Units;

    use PHPCoord\UnitOfMeasure\Length\Length;

    class HalfKilometre extends Length {

        public const SRID = 'urn:yourcompany:geo:uom:halfkm';

        private float $length;

        public function __construct(float $length)
        {
            $this->length = $length;
        }

        public function asMetres(): Metre
        {
            return new Metre($this->length * 500);
        }

        public function getValue(): float
        {
            return $this->length;
        }

        public function getUnitName(): string
        {
            return 'Half-kilometre';
        }
    }

    Length::registerCustomUnit(HalfKilometre::SRID, 'Half-kilometre', HalfKilometre::class);

    $value = new HalfKilometre(123);
    // or
    $value = Angle::makeUnit(123, HalfKilometre::SRID);
