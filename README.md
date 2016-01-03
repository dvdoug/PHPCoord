PHPCoord
========

Conversion/modernisation/enhancement of phpcoord for PHP5.3+/PSR-4.

[![Build Status](https://travis-ci.org/dvdoug/PHPCoord.svg?branch=master)](https://travis-ci.org/dvdoug/PHPCoord)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dvdoug/PHPCoord/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dvdoug/PHPCoord/?branch=master)

The original code by Jonathan Stott can be found at http://www.jstott.me.uk/phpcoord/

PHPCoord is a set of PHP functions for handling various co-ordinate systems and converting
between them. Currently, OSGB (Ordnance Survey of Great Britain) grid references,
traditional Irish Grid references, the newer ITM (Irish Transverse Mercator) system,
UTM (Universal Transverse Mercator) references and latitude/longitude are supported.

Conversions between latitudes/longitudes in WGS84 (GPS), OSGB36, ED50 and NAD27 datums are
built-in, and helper functions exist to ease conversion between other datums. 

A function is also provided to find the surface distance between two points of latitude
and longitude.

Output of calculations have been changed from the original code in various ways:
 * [BUGFIX] When converting latitude and longitude between WGS84 and OSGB36 or vice-versa,
   a wrong constant for the y translation has been corrected (was off by 1 metre)
 * [BUGFIX] Corrected issue with Helmert transform where the resulting co-ordinate could be placed into
   the wrong quadrant
 * [BUGFIX] When calculating surface distances, a more accurate mean radius is now used rather than
   that derived from historical definitions of a nautical mile 
 * [BUGFIX] Corrected calculation of OS 6-figure grid references (rounding instead of truncating meant the
   grid square was sometimes off by 1)
 * [CHANGE] Eastings and northings are rounded to 1m, and lat/long to 5dp (approx 1m) to avoid any
   misconceptions that precision is the same thing as accuracy
 * [CHANGE] You must specify the reference ellipsoid when creating a LatLng object to avoid guesses as to what
   was actually meant. If you don't know what that means, you probably want WGS84 which gives GPS
   compatibility
 * [CHANGE] Added Irish grid and ITM support
 * [CHANGE] Co-ordinates are now 3D (i.e. w/height), not 2D

Usage
-----
```php
$OSRef = new OSRef(500000, 200000); //Easting, Northing
$LatLng = $OSRef->toLatLng();
$LatLng->toWGS84(); //optional, for GPS compatibility

$lat =  $LatLng->getLat();
$long = $LatLng->getLng();

$LatLng = new LatLng(50.12345, 1.23456, 0, RefEll::wgs84()); //Latitude, Long, height
$OSRef = $LatLng->toOSRef(); 

$easting = $OSRef->getX();
$northing = $OSRef->getY();

```

Requirements
------------
* PHP 5.3 or higher

License
-------
The original PHPcoord is GPL-licensed, and this version inherits that. Terms can be found at http://www.gnu.org/licenses/gpl.html 
