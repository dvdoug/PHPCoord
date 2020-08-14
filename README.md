PHPCoord
========

Conversion/modernisation/enhancement of phpcoord.
[![Build Status](https://github.com/dvdoug/PHPCoord/workflows/CI/badge.svg?branch=master)](https://github.com/dvdoug/PHPCoord/actions?query=workflow%3ACI+branch%3Amaster)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dvdoug/PHPCoord/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dvdoug/PHPCoord/?branch=master)
[![Download count](https://img.shields.io/packagist/dt/php-coord/php-coord.svg)](https://packagist.org/packages/php-coord/php-coord)
[![Current version](https://img.shields.io/packagist/v/php-coord/php-coord.svg)](https://packagist.org/packages/php-coord/php-coord)


The original code by Jonathan Stott can be found at http://www.jstott.me.uk/phpcoord/

PHPCoord is a set of PHP functions for handling various co-ordinate systems and converting
between them. Currently, OSGB (Ordnance Survey of Great Britain) grid references,
traditional Irish Grid references, the newer ITM (Irish Transverse Mercator) system,
UTM (Universal Transverse Mercator) references and latitude/longitude are supported.

Conversions between latitudes/longitudes in WGS84 (GPS), OSGB36, ED50 and NAD27 datums are
built-in, and helper functions exist to ease conversion between other datums. 

A function is also provided to find the surface distance between two points of latitude
and longitude.

Usage
-----
```php
$OSRef = new OSRef(500000, 200000); //Easting, Northing
$LatLng = $OSRef->toLatLng();
$GPSLatLng = $LatLng->toWGS84(); //optional, for GPS compatibility

$lat =  $LatLng->getLat();
$long = $LatLng->getLng();

$LatLng = new LatLng(50.12345, 1.23456, 0, RefEll::wgs84()); //Latitude, Long, height
$OSRef = $LatLng->toOSRef(); 

$easting = $OSRef->getX();
$northing = $OSRef->getY();

```

Installation
------------
If you use [Composer](http://getcomposer.org/), just add `php-coord/php-coord` to your project's `composer.json` file:
```
    composer require php-coord/php-coord
```

Otherwise, the library is PSR-4 compliant, so will work with the autoloader of your choice.

License
-------
The original PHPcoord is GPL-licensed, and this version inherits that. Terms can be found at http://www.gnu.org/licenses/gpl.html 
