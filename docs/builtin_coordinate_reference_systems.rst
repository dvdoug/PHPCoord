.. _builtincrs:

Built in coordinate systems
===========================

.. note::
    In ISO 19111 terminology, what most people refer to as a *Coordinate System* is actually called a
    *Coordinate Reference System* (or *CRS* for short), with the term *Coordinate System* being used to refer to the
    :ref:`axes used <builtincs>`. PHPCoord's actual code uses the ISO naming system, although this documentation uses
    the more common version.

.. tip::
    A constant has been defined for each and every built in CRS, with supporting docblocks that match the contents of
    the following pages. These should be searchable/available for autocomplete from inside your favourite IDE.

.. toctree::
    :maxdepth: 1

    builtin_crs_geocentric
    builtin_crs_geographic2d
    builtin_crs_geographic3d
    builtin_crs_projected
    builtin_crs_vertical
    builtin_crs_compound
