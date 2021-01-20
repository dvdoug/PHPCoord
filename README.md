PHPCoord
========

[![Build Status](https://github.com/dvdoug/PHPCoord/workflows/CI/badge.svg?branch=master)](https://github.com/dvdoug/PHPCoord/actions?query=workflow%3ACI+branch%3Amaster)
[![Download count](https://img.shields.io/packagist/dt/php-coord/php-coord.svg)](https://packagist.org/packages/php-coord/php-coord)
[![Current version](https://img.shields.io/packagist/v/php-coord/php-coord.svg)](https://packagist.org/packages/php-coord/php-coord)
[![Documentation](https://readthedocs.org/projects/phpcoord/badge/?version=latest)](https://phpcoord.readthedocs.io/en/latest/)

PHPCoord is a PHP library to aid in handling coordinates. It's main function is to convert coordinates from one system
to another, although additional helper functionality exists as well such as distance calculation and unit conversion.

6000+ different coordinate systems are supported, covering the entire globe. Some common systems include:
 - WGS84 (GPS)
 - OSGB36 (Great Britain)
 - NAD27 and NAD83 (North America)
 - UTM (Universal Transverse Mercator)
 - ED50 and ETRS89 (Europe)
 - GDA94 and GDA2020 (Australia)
 - NZGD49 and NZGD2000 (New Zealand)

Installation
------------
If you use [Composer](http://getcomposer.org/), just add `php-coord/php-coord` to your project's `composer.json` file:
```
    composer require php-coord/php-coord
```

Otherwise, the library is PSR-4 compliant, so will work with the autoloader of your choice.
