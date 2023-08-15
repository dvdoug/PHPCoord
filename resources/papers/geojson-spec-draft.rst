================================
The GeoJSON Format Specification
================================

:Abstract: 
  GeoJSON is a geospatial data interchange format based on JavaScript Object
  Notation (JSON).

:Authors:
  Howard Butler (Hobu Inc.),
  Martin Daly (Cadcorp),
  Allan Doyle (MIT),
  Sean Gillies (UNC-Chapel Hill),
  Tim Schaub (OpenGeo),
  Christopher Schmidt (MetaCarta)

:Revision: 1.0
:Date: 16 June 2008

:Copyright: Copyright |copy| 2008 by the Authors. This work is licensed under a `Creative Commons Attribution 3.0
  United States License`__.

.. |copy| unicode:: 0xA9 .. copyright sign
.. __: http://creativecommons.org/licenses/by/3.0/us/

.. contents::

1. Introduction
===============

GeoJSON is a format for encoding a variety of geographic data structures.  A
GeoJSON object may represent a geometry, a feature, or a collection of
features.  GeoJSON supports the following geometry types: Point, LineString,
Polygon, MultiPoint, MultiLineString, MultiPolygon, and GeometryCollection.
Features in GeoJSON contain a geometry object and additional properties, and a
feature collection represents a list of features.

A complete GeoJSON data structure is always an object (in JSON terms). In
GeoJSON, an object consists of a collection of name/value pairs -- also called
members. For each member, the name is always a string. Member values are either
a string, number, object, array or one of the literals: "true", "false", and
"null". An array consists of elements where each element is a value as
described above. 

1.1. Examples
-------------

A GeoJSON feature collection::

  { "type": "FeatureCollection",
    "features": [
      { "type": "Feature",
        "geometry": {"type": "Point", "coordinates": [102.0, 0.5]},
        "properties": {"prop0": "value0"}
        },
      { "type": "Feature",
        "geometry": {
          "type": "LineString",
          "coordinates": [
            [102.0, 0.0], [103.0, 1.0], [104.0, 0.0], [105.0, 1.0]
            ]
          },
        "properties": {
          "prop0": "value0",
          "prop1": 0.0
          }
        },
      { "type": "Feature",
         "geometry": {
           "type": "Polygon",
           "coordinates": [
             [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0],
               [100.0, 1.0], [100.0, 0.0] ]
             ]
         },
         "properties": {
           "prop0": "value0",
           "prop1": {"this": "that"}
           }
         }
       ]
     }

1.2. Definitions
----------------

* JavaScript Object Notation (JSON), and the terms object, name, value, array,
  and number, are defined in IETF RTC 4627, at
  http://www.ietf.org/rfc/rfc4627.txt.

* The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD",
  "SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be
  interpreted as described in IETF RFC 2119, at
  http://www.ietf.org/rfc/rfc2119.txt.

2. GeoJSON Objects
==================

GeoJSON always consists of a single object. This object (referred to as the
GeoJSON object below) represents a geometry, feature, or collection of
features.

* The GeoJSON object may have any number of members (name/value pairs).

* The GeoJSON object must have a member with the name "type". This member's
  value is a string that determines the type of the GeoJSON object.

* The value of the type member must be one of: "Point", "MultiPoint",
  "LineString", "MultiLineString", "Polygon", "MultiPolygon",
  "GeometryCollection", "Feature", or "FeatureCollection". The case of the type
  member values must be as shown here.

* A GeoJSON object may have an optional "crs" member, the value of which must
  be a coordinate reference system object (see `3. Coordinate Reference System
  Objects`_).

* A GeoJSON object may have a "bbox" member, the value of which must be a
  bounding box array (see `4. Bounding Boxes`_).

2.1 Geometry Objects
--------------------

A geometry is a GeoJSON object where the type member's value is one of the
following strings: "Point", "MultiPoint", "LineString", "MultiLineString",
"Polygon", "MultiPolygon", or "GeometryCollection".

A GeoJSON geometry object of any type other than "GeometryCollection" must have
a member with the name "coordinates". The value of the coordinates member is
always an array. The structure for the elements in this array is determined by
the type of geometry.

2.1.1. Positions
................

A position is the fundamental geometry construct. The "coordinates" member of a
geometry object is composed of one position (in the case of a Point geometry),
an array of positions (LineString or MultiPoint geometries), an array of arrays
of positions (Polygons, MultiLineStrings), or a multidimensional array of
positions (MultiPolygon).

A position is represented by an array of numbers. There must be at least two
elements, and may be more. The order of elements must follow x, y, z order
(easting, northing, altitude for coordinates in a projected coordinate
reference system, or longitude, latitude, altitude for coordinates in a
geographic coordinate reference system). Any number of additional elements are
allowed -- interpretation and meaning of additional elements is beyond the
scope of this specification.

Examples of positions and geometries are provided in `Appendix A. Geometry
Examples`_.

2.1.2. Point
............

For type "Point", the "coordinates" member must be a single position.

2.1.3. MultiPoint
.................

For type "MultiPoint", the "coordinates" member must be an array of positions.

2.1.4. LineString
.................

For type "LineString", the "coordinates" member must be an array of two or more
positions.

A LinearRing is closed LineString with 4 or more positions. The first and last
positions are equivalent (they represent equivalent points). Though a
LinearRing is not explicitly represented as a GeoJSON geometry type, it is
referred to in the Polygon geometry type definition.

2.1.5. MultiLineString
......................

For type "MultiLineString", the "coordinates" member must be an array of
LineString coordinate arrays.

2.1.6. Polygon
..............

For type "Polygon", the "coordinates" member must be an array of LinearRing
coordinate arrays. For Polygons with multiple rings, the first must be the
exterior ring and any others must be interior rings or holes.

2.1.7. MultiPolygon
...................

For type "MultiPolygon", the "coordinates" member must be an array of Polygon
coordinate arrays.

2.1.8 Geometry Collection
.........................

A GeoJSON object with type "GeometryCollection" is a geometry object which
represents a collection of geometry objects.

A geometry collection must have a member with the name "geometries". The value
corresponding to "geometries" is an array. Each element in this array is a
GeoJSON geometry object.

2.2. Feature Objects
--------------------

A GeoJSON object with the type "Feature" is a feature object.

* A feature object must have a member with the name "geometry". The value of
  the geometry member is a geometry object as defined above or a JSON null
  value.

* A feature object must have a member with the name "properties". The value of
  the properties member is an object (any JSON object or a JSON null value).

* If a feature has a commonly used identifier, that identifier should be
  included as a member of the feature object with the name "id".

2.3. Feature Collection Objects
-------------------------------

A GeoJSON object with the type "FeatureCollection" is a feature collection
object.

An object of type "FeatureCollection" must have a member with the name
"features". The value corresponding to "features" is an array. Each element in
the array is a feature object as defined above.

3. Coordinate Reference System Objects
======================================

The coordinate reference system (CRS) of a GeoJSON object is determined by its
"crs" member (referred to as the CRS object below). If an object has no crs
member, then its parent or grandparent object's crs member may be acquired. If
no crs member can be so acquired, the default CRS shall apply to the GeoJSON
object.

* The default CRS is a geographic coordinate reference system, using the WGS84
  datum, and with longitude and latitude units of decimal degrees.

* The value of a member named "crs" must be a JSON object (referred to as the
  CRS object below) or JSON null. If the value of CRS is null, no CRS can be
  assumed.

* The crs member should be on the top-level GeoJSON object in a hierarchy (in
  feature collection, feature, geometry order) and should not be repeated or
  overridden on children or grandchildren of the object.

* A non-null CRS object has two mandatory members: "type" and "properties".

* The value of the type member must be a string, indicating the type of CRS
  object.

* The value of the properties member must be an object.

* CRS shall not change coordinate ordering (see `2.1.1. Positions`_).

3.1. Named CRS
--------------

A CRS object may indicate a coordinate reference system by name. In this case,
the value of its "type" member must be the string "name". The value of its
"properties" member must be an object containing a "name" member. The value of
that "name" member must be a string identifying a coordinate reference system.
OGC CRS URNs such as "urn\:ogc:def:crs:OGC:1.3:CRS84" shall be preferred over
legacy identifiers such as "EPSG:4326"::

  "crs": {
    "type": "name",
    "properties": {
      "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
      }
    }

3.2. Linked CRS
---------------

A CRS object may link to CRS parameters on the Web. In this case, the value of
its "type" member must be the string "link", and the value of its "properties"
member must be a Link object (see `3.2.1. Link Objects`_).

3.2.1. Link Objects
...................

A link object has one required member: "href", and one optional member: "type".

The value of the required "href" member must be a dereferenceable URI.

The value of the optional "type" member must be a string that hints at the
format used to represent CRS parameters at the provided URI. Suggested values
are: "proj4", "ogcwkt", "esriwkt", but others can be used::

  "crs": {
    "type": "link", 
    "properties": {
      "href": "http://example.com/crs/42",
      "type": "proj4"
      }
    }
    
Relative links may be used to direct processors to CRS parameters in an
auxiliary file::

  "crs": {
    "type": "link",
    "properties": {
      "href": "data.crs",
      "type": "ogcwkt"
      }
    }

4. Bounding Boxes
=================

To include information on the coordinate range for geometries, features, or
feature collections, a GeoJSON object may have a member named "bbox". The value
of the bbox member must be a 2*n array where n is the number of dimensions
represented in the contained geometries, with the lowest values for all axes
followed by the highest values. The axes order of a bbox follows the axes order
of geometries. In addition, the coordinate reference system for the bbox is
assumed to match the coordinate reference system of the GeoJSON object of which
it is a member.

Example of a bbox member on a feature::

  { "type": "Feature",
    "bbox": [-180.0, -90.0, 180.0, 90.0],
    "geometry": {
      "type": "Polygon",
      "coordinates": [[
        [-180.0, 10.0], [20.0, 90.0], [180.0, -5.0], [-30.0, -90.0]
        ]]
      }
    ...
    }

Example of a bbox member on a feature collection::

  { "type": "FeatureCollection",
    "bbox": [100.0, 0.0, 105.0, 1.0],
    "features": [
      ...
      ] 
    }

Appendix A. Geometry Examples
=============================

Each of the examples below represents a complete GeoJSON object. Note that
unquoted whitespace is not significant in JSON. Whitespace is used in the
examples to help illustrate the data structures, but is not required.

Point
-----

Point coordinates are in x, y order (easting, northing for projected
coordinates, longitude, latitude for geographic coordinates)::

  { "type": "Point", "coordinates": [100.0, 0.0] }

LineString
----------

Coordinates of LineString are an array of positions (see `2.1.1. Positions`_)::

  { "type": "LineString",
    "coordinates": [ [100.0, 0.0], [101.0, 1.0] ]
    }

Polygon
-------

Coordinates of a Polygon are an array of LinearRing coordinate arrays. The
first element in the array represents the exterior ring. Any subsequent
elements represent interior rings (or holes).

No holes::

  { "type": "Polygon",
    "coordinates": [
      [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0] ]
      ]
   }

With holes::

  { "type": "Polygon",
    "coordinates": [
      [ [100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0] ],
      [ [100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8], [100.2, 0.2] ]
      ]
   }

MultiPoint
----------

Coordinates of a MultiPoint are an array of positions::

  { "type": "MultiPoint",
    "coordinates": [ [100.0, 0.0], [101.0, 1.0] ]
    }

MultiLineString
---------------

Coordinates of a MultiLineString are an array of LineString coordinate arrays::

  { "type": "MultiLineString",
    "coordinates": [
        [ [100.0, 0.0], [101.0, 1.0] ],
        [ [102.0, 2.0], [103.0, 3.0] ]
      ]
    }

MultiPolygon
------------

Coordinates of a MultiPolygon are an array of Polygon coordinate arrays::

  { "type": "MultiPolygon",
    "coordinates": [
      [[[102.0, 2.0], [103.0, 2.0], [103.0, 3.0], [102.0, 3.0], [102.0, 2.0]]],
      [[[100.0, 0.0], [101.0, 0.0], [101.0, 1.0], [100.0, 1.0], [100.0, 0.0]],
       [[100.2, 0.2], [100.8, 0.2], [100.8, 0.8], [100.2, 0.8], [100.2, 0.2]]]
      ]
    }

GeometryCollection
------------------

Each element in the geometries array of a GeometryCollection is one of the
geometry objects described above::

  { "type": "GeometryCollection",
    "geometries": [
      { "type": "Point",
        "coordinates": [100.0, 0.0]
        },
      { "type": "LineString",
        "coordinates": [ [101.0, 0.0], [102.0, 1.0] ]
        }
    ]
  }

Appendix B. Contributors
========================

The GeoJSON format specification is the product of discussion on the GeoJSON
list:

http://lists.geojson.org/listinfo.cgi/geojson-geojson.org
