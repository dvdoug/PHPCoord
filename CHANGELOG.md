# Changelog

## [Unreleased]

## [5.11.0] - 2025-06-15
### Added
- Added new parameter `$accuracy` and new method `getAccuracy()` on `Point` objects to store/reveal accuracy of the point.
  You can use this either to store the data for your own use (e.g. survey errors) and/or PHPCoord will update this with
  the accuracy of the calculated point after a conversion
### Changed
- Updates to data for BES Islands, Brazil, Canada, Finland, ITRF, Latvia, Liberia, Mayotte, Uganda and Uzbekistan

## [5.10.3] - 2025-01-31
### Changed
- Updates to data for Canada and Germany
### Fixed
- Calculation of small distances along a meridian

## [5.10.2] - 2024-10-06
### Fixed
- Fix off by 1 error when computing certain British/Irish grid references

## [5.10.1] - 2024-09-24
### Fixed
- Compatibility with opcache preloading

## [5.10.0] - 2024-08-23
### Added
- Added a new method `isWithinCRSBoundingArea()` on most `Point` objects to check if they lie within the bounds
  of their defined CRS

## [5.9.2] - 2024-08-18
### Changed
- Split declaration of the `Projected::EPSG_*` constants into multiple files internally to aid with static analysis
  in IDEs (there are so many, the file defining them was over the max file size analysis threshold for Intelephense)

## [5.9.1] - 2024-08-15
### Changed
- Updates to data for USA and WGS84
- Support for Irish polynomial transformation in the ETRS89 to TM75 direction (TM75 to ETRS89 was already supported)

### Fixed
- British and Irish Grid references were rounding rather than truncating causing a sometimes off-by-1 error

## [5.9.0] - 2024-08-04
### Changed
- Updates to data for Czechia, Denmark, ETRS89, Germany, Martinique, Portugal, St Helena, UK and WGS84
- Switched from Vincenty to Karney algorithm for calculating distance between two Geographic points
- Minimum PHP version increased to 8.1

## [5.8.0] - 2024-02-03
### Added
- Support for compressed grid files to reduce distribution sizes

## [5.7.0] - 2024-01-27
### Changed
- Updates to data for Canada, Denmark, France, Germany and USA
- More aggressive buffering of extent polygons

## [5.6.0] - 2023-09-30
### Changed
- Updates to data for Australia, Austria, Canada, Germany, Italy, Netherlands, Portugal, South Korea, UK and USA

## [5.5.0] - 2023-07-07
### Added
- Support for Lambert Cylindrical Equal Area (Spherical) projection

### Changed
- Infer a current epoch when doing time-dependant transforms and no explicit epoch is supplied
- Updates to data for Polar regions, Algeria and Spain

### Deprecated
- The namespace of all `*Point` classes have been tidied up and changed to from `PHPCoord` to `PHPCoord\Point` e.g. 
  `PHPCoord\GeographicPoint` is now `PHPCoord\Point\GeographicPoint`. An alias has been provided, all existing
  code referencing the old names will continue to work

## [5.4.0] - 2023-05-27
### Added
- Added `getSupportedSRIDsWithHelp()` as a version of `getSupportedSRIDs()` that returns at runtime the inline help
  available within the source code

### Changed
- Updates to data for Algeria, Bosnia and Herzegovina, Denmark, Germany, Latvia and USA

## [5.3.1] - 2023-02-20
### Changed
- Further enhancements to coordinate conversion from a `CompoundPoint`

## [5.3.0] - 2023-02-19
### Added
- Support for converting coordinates from a `CompoundPoint` where the horizontal component is `Projected` to a 3D CRS

### Changed
- Updates to data for ETRS89, Colombia, Slovenia, USA and UK

### Fixed
- Don't use 2D CRS as intermediate in a chain when converting from/to a 3D CRS

## [5.2.0] - 2023-01-08
### Changed
- Updates to data for IGS, Japan and UK

### Fixed
- Improved handling of extent polygon buffering involving complex shapes (e.g. Netherlands)
- Fixed longitude wraparound issue with GTX grids

## [5.1.0] - 2022-11-10
### Added
- Support for 3D projected coordinates
- Support for custom coordinate reference systems and custom conversions

### Changed
- Updates to data for ITRF, WGS84, Australia, Belgium, Canada, France, Germany, Iceland, Indonesia, Ireland, Japan, Luxembourg, Norway, North Macedonia, UK and USA
- Some internal simplifications and optimisations

### Fixed
- Improved handling of longitudes greater than 180 degrees
- Corrected conversion of geocentric coordinates to geographic coordinates when using a non-Greenwich prime meridian

## [5.0.1] - 2022-01-29
### Fixed
- Guard against divide by zero issues when calculating distance between two points

## [5.0.0] - 2021-11-12
### Added
- Support for IGN France geocentric translation by grid interpolation. This requires the [Europe datapack](https://www.phpcoord.net/en/stable/coordinate_conversions_easy.html#grids)
- Support for vertical grid files. These require a [relevant datapack](https://www.phpcoord.net/en/stable/coordinate_conversions_easy.html#grids)

### Changed
- The signatures of all `*Point::create*()` methods have been changed to put the CRS *first*. Previously the distance/direction values came first. This is to ensure that all optional parameters are at the end of the signature, addressing a PHP8.1 deprecation.

  Example:

  ```
  // in v4
  GeographicPoint::create(
      Angle $latitude,
      Angle $longitude,
      ?Length $height = null,
      Geographic $crs, // was after distance/direction
      ?DateTimeInterface $epoch = null
  ): GeographicPoint

  // in v5
  GeographicPoint::create(
      Geographic $crs, // now goes first
      Angle $latitude,
      Angle $longitude,
      ?Length $height = null,
      ?DateTimeInterface $epoch = null
  ): GeographicPoint
   ```


- Updates to data for Canada, Norway, UK
- Some internal simplifications and optimisations
- Supported PHP versions changed to `^8.0`

## [4.7.1] - 2024-01-26
The v4.x series is receiving basic maintenance only. All feature development takes place in v5.x.
This is because one of PHP8.1's [new deprecations](https://github.com/php/php-src/commit/afc4d67c8b4e02a985a4cd27b8e79b343eb3c0ad)
required a significant non-backwards compatible change to address.

### Fixed
- Buffering of Irish extent

## [4.7.0] - 2022-06-26
### Added
- Support for defining 3D projected coordinates

### Fixed
- Improved handling of longitudes greater than 180 degrees
- Corrected conversion of geocentric coordinates to geographic coordinates when using a non-Greenwich prime meridian

### Changed
- Updates to data for ITRF, WGS84, Australia, Belgium, Canada, France, Germany, Iceland, Ireland, Japan, Luxembourg, Norway, North Macedonia, UK and USA

## [4.6.1] - 2022-01-29
### Fixed
- Guard against divide by zero issues when calculating distance between two points

## [4.6.0] - 2021-10-22
### Changed
 - Updates to data for Papua New Guinea, Ukraine and WGS84
 - Some internal simplifications and optimisations

### Fixed
 - Corrected the decoding of sexagesimal DMS degree fractional components

## [4.5.0] - 2021-09-25
### Changed
 - Updates to data for Canada, Costa Rica, France, French Southern Territories, Kyrgistan, Liechtenstein, Poland, Russia, Switzerland, Tonga, UK, USA, Wallis and Futuna
 - Many internal simplifications and optimisations, leading to faster conversions and a corresponding update of the maximum chain depth from 5 to 7

### Fixed
 - _Some_ PHP8.1 deprecations

### Deprecated
 - `Compound::EPSG_RGF93_LAMBERT_93_PLUS_NGF_IGN69_HEIGHT`, use `Compound::EPSG_RGF93_V1_LAMBERT_93_PLUS_NGF_IGN69_HEIGHT` instead
 - `Compound::EPSG_RGF93_LAMBERT_93_PLUS_NGF_IGN78_HEIGHT`, use `Compound::EPSG_RGF93_V1_LAMBERT_93_PLUS_NGF_IGN78_HEIGHT` instead
 - `Compound::EPSG_RGF93_PLUS_NGF_IGN69_HEIGHT`, use `Compound::EPSG_RGF93_V2_PLUS_NGF_IGN69_HEIGHT` instead
 - `Compound::EPSG_RGF93_PLUS_NGF_IGN78_HEIGHT`, use `Compound::EPSG_RGF93_V2_PLUS_NGF_IGN78_HEIGHT` instead
 - `Geocentric::EPSG_CHTRF95`, use `Geocentric::EPSG_CHTRS95` instead
 - `Geocentric::EPSG_RGF93`, use `Geocentric::EPSG_RGF93_V1` instead
 - `Geographic2D::EPSG_CHTRF95`, use `Geographic2D::EPSG_CHTRS95` instead
 - `Geographic2D::EPSG_RGF93`, use `Geographic2D::EPSG_RGF93_V1` instead
 - `Geographic2D::EPSG_RGF93_LON_LAT`, use `Geographic2D::EPSG_RGF93_V1_LON_LAT` instead
 - `Geographic3D::EPSG_CHTRF95`, use `Geographic3D::EPSG_CHTRS95` instead
 - `Geographic3D::EPSG_RGF93`, use `Geographic3D::EPSG_RGF93_V1` instead
 - `Geographic3D::EPSG_RGF93_LON_LAT`, use `Geographic3D::EPSG_RGF93_V1_LON_LAT` instead
 - `Projected::EPSG_RGF93_CC42`, use `Projected::EPSG_RGF93_V1_CC42` instead
 - `Projected::EPSG_RGF93_CC43`, use `Projected::EPSG_RGF93_V1_CC43` instead
 - `Projected::EPSG_RGF93_CC44`, use `Projected::EPSG_RGF93_V1_CC44` instead
 - `Projected::EPSG_RGF93_CC45`, use `Projected::EPSG_RGF93_V1_CC45` instead
 - `Projected::EPSG_RGF93_CC46`, use `Projected::EPSG_RGF93_V1_CC46` instead
 - `Projected::EPSG_RGF93_CC47`, use `Projected::EPSG_RGF93_V1_CC47` instead
 - `Projected::EPSG_RGF93_CC48`, use `Projected::EPSG_RGF93_V1_CC48` instead
 - `Projected::EPSG_RGF93_CC49`, use `Projected::EPSG_RGF93_V1_CC49` instead
 - `Projected::EPSG_RGF93_CC50`, use `Projected::EPSG_RGF93_V1_CC50` instead
 - `Projected::EPSG_RGF93_LAMBERT_93`, use `Projected::EPSG_RGF93_V1_LAMBERT_93` instead
 - `Datum::EPSG_SWISS_TERRESTRIAL_REFERENCE_FRAME_1995`, use `Datum::EPSG_SWISS_TERRESTRIAL_REFERENCE_SYSTEM_1995` instead
 - `Datum::EPSG_RESEAU_GEODESIQUE_FRANCAIS_1993`, use `Datum::EPSG_RESEAU_GEODESIQUE_FRANCAIS_1993_V1` instead

## [4.4.0] - 2021-06-24
### Added
 - Support for NTv2, OSTN15/OSGM15 and NADCON5 grid files. These require a [relevant datapack](https://www.phpcoord.net/en/stable/coordinate_conversions_easy.html#grids)

### Changed
 - Updates to data for Argentina, Belgium, Canada, Costa Rica, Czechia, Greenland, Italy, Russia, UK and USA
 - Performance optimisations
 - Supported PHP versions changed to `^7.4||^8.0`

### Deprecated
 - `Compound::EPSG_BELGE_1972_BELGIAN_LAMBERT_72_PLUS_OSTEND_HEIGHT`, use `Compound::EPSG_BD72_BELGIAN_LAMBERT_72_PLUS_OSTEND_HEIGHT` instead
 - `Geographic2D::EPSG_BELGE_1950`, use `Geographic2D::EPSG_BD50` instead
 - `Geographic2D::EPSG_BELGE_1950_BRUSSELS`, use `Geographic2D::EPSG_BD50_BRUSSELS` instead
 - `Geographic2D::EPSG_BELGE_1972`, use `Geographic2D::EPSG_BD72` instead
 - `Projected::EPSG_BELGE_1950_BRUSSELS_BELGE_LAMBERT_50`, use `Projected::EPSG_BD50_BRUSSELS_BELGE_LAMBERT_50` instead
 - `Projected::EPSG_BELGE_1972_BELGE_LAMBERT_72`, use `Projected::EPSG_BD72_BELGE_LAMBERT_72` instead
 - `Projected::EPSG_BELGE_1972_BELGIAN_LAMBERT_72`, use `Projected::EPSG_BD72_BELGIAN_LAMBERT_72` instead
 - `Vertical::EPSG_GENOA_HEIGHT`, use `Vertical::EPSG_GENOA_1942_HEIGHT` instead
 - `Datum::EPSG_GENOA`, use `Datum::EPSG_GENOA_1942` instead

## [4.3.0] - 2021-04-24
### Added
 - Datapacks. [See docs](https://www.phpcoord.net/en/stable/coordinate_conversions_easy.html#accuracy) for more info

### Changed
 - Updates to data for Canada

## [4.2.0] - 2021-04-19
### Added
 - More accurate extent data

### Fixed
 - Ensure projections still work even when origin points are on the other side of the antimeridian

### Changed
 - Updates to data for Australia, Poland, UK and US Gulf of Mexico

### Deprecated
 - `Compound::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT`, use `Compound::EPSG_OSGB36_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT` instead
 - `Geographic2D::EPSG_OSGB_1936`, use `Geographic2D::EPSG_OSGB36` instead
 - `Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID`, use `Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID` instead
 - `Projected::EPSG_ETRS89_POLAND_CS2000_ZONE_5`, use `Projected::EPSG_ETRF2000_PL_CS2000_15` instead
 - `Projected::EPSG_ETRS89_POLAND_CS2000_ZONE_6`, use `Projected::EPSG_ETRF2000_PL_CS2000_18` instead
 - `Projected::EPSG_ETRS89_POLAND_CS2000_ZONE_7`, use `Projected::EPSG_ETRF2000_PL_CS2000_21` instead
 - `Projected::EPSG_ETRS89_POLAND_CS2000_ZONE_8`, use `Projected::EPSG_ETRF2000_PL_CS2000_24` instead
 - `Projected::EPSG_ETRS89_POLAND_CS92`, use `Projected::EPSG_ETRF2000_PL_CS92` instead
 - `Datum::EPSG_OSGB_1936`, use `Datum::EPSG_ORDNANCE_SURVEY_OF_GREAT_BRITAIN_1936` instead

## [4.1.0] - 2021-03-03
### Added
 - Added `UTMPoint` as a better way of handling UTM zones than the EPSG model does it
- Improved conversion chaining for `CompoundPoint`s

### Changed
  - Moved `verticalOffsetAndSlope` method from `CompoundPoint` to `VerticalPoint`. This is technically a breaking change, but since the code is only 2 days old shouldn't affect anyone.

## [4.0.1] - 2021-03-01
### Fixed
 - Documentation issues

## [4.0.0] - 2021-03-01
### Added
 - Chaining of conversions
 - Documentation(!)

## [4.0.0beta1] - 2021-01-05
### Added
 - 6200+ new coordinate systems.

### Changed
 - Project reimplemented from scratch. License changed from GPL to MIT.

## [3.1.2] - 2020-09-29
### Changed
 - Supported PHP versions changed from `^7.1` to `^7.3||^8.0`

## [3.1.1] - 2020-04-16
### Fixed
 - Corrected an issue with transforming ITM references to WGS84
 - Corrected an issue with transforming Irish Grid references to WGS84

## [3.1.0] - 2019-07-21
### Added
 - Added `OSRef::toGridReferenceWithSpaces` to complement `OSRef::toGridReference` [thomasedwards]

## [3.0.0] - 2019-04-13
### Added
 - Support for _accepting_ 2, 4, 8 and 10 figure Ordnance Survey references (6 figure was already supported)

### Changed
 - fromSixFigureReference
 - All value objects are now immutable - calling a conversion function on them now returns a *new* object rather than modifying the existing one  
 - Minimum PHP version is now 7.1

### Removed
 - HHVM support now that project has a stated goal of no longer targeting PHP7 compatibility
 - `OSRef::fromSixFigureReference()` has been removed, use `OSRef::fromGridReference()` instead
 - `OSRef::to[Two/Four/Six/Eight/Ten]FigureReference()` have been removed, use `OSRef::toGridReference($length)` instead

## [2.1] - 2016-09-20
### Added
 - Added distance calculations for grid-based co-ordinate systems to complement the existing lat/long implementation

## [2.0.3] - 2016-05-29
### Fixed
 - Fixed confusing docblock

## [2.0.2] - 2016-01-31
### Fixed
 - Ensure consistency of units

## [2.0.1] - 2016-01-19
### Added
 - Add support for 2, 4, 8 and 10 figure Ordnance Survey references (6 figure was already supported) [stevegoddard]

## [2.0] - 2016-01-03
### Added
 - 3D co-ordinates
 - Irish Grid and ITM support

### Changed
 - Major refactoring, breaks compatibility with previous API (hopefully for the better!)

## [1.1.2] - 2015-12-31
### Fixed
 - Corrected issue with Helmert transform where the resulting co-ordinate could be placed into the wrong quadrant

## [1.1.1] - 2014-11-19
### Fixed
 - Corrected bug in original code where OS 6-figure grid references were sometimes off by 1

### Changed
 - Updated Composer to use PSR-4

## [1.1] - 2013-08-01
Just cleanup

## 1.0.0 - 2013-02-13
Initial release of this fork (based off of v2.3 of original)
### Fixed
 - When converting Latitude and Longitude between WGS84 and OSGB36 or vice-versa, a wrong constant for the y translation has been corrected (was off by 1 metre)

### Changed
 - Eastings and northings are rounded to 1m, and lat/long to 5dp (approx 1m) to avoid any misconceptions that precision is the same thing as accuracy.
 - When calculating surface distances, a more accurate mean radius is now used rather than that derived from historical definitions of a nautical mile

[Unreleased]: https://github.com/dvdoug/PHPCoord/compare/v5.11.0..master

[5.11.0]: https://github.com/dvdoug/PHPCoord/compare/v5.10.3..v5.11.0
[5.10.3]: https://github.com/dvdoug/PHPCoord/compare/v5.10.2..v5.10.3
[5.10.2]: https://github.com/dvdoug/PHPCoord/compare/v5.10.1..v5.10.2
[5.10.1]: https://github.com/dvdoug/PHPCoord/compare/v5.10.0..v5.10.1
[5.10.0]: https://github.com/dvdoug/PHPCoord/compare/v5.9.2..v5.10.0
[5.9.2]: https://github.com/dvdoug/PHPCoord/compare/v5.9.1..v5.9.2
[5.9.1]: https://github.com/dvdoug/PHPCoord/compare/v5.9.0..v5.9.1
[5.9.0]: https://github.com/dvdoug/PHPCoord/compare/v5.8.0..v5.9.0
[5.8.0]: https://github.com/dvdoug/PHPCoord/compare/v5.7.0..v5.8.0
[5.7.0]: https://github.com/dvdoug/PHPCoord/compare/v5.6.0..v5.7.0
[5.6.0]: https://github.com/dvdoug/PHPCoord/compare/v5.5.0..v5.6.0
[5.5.0]: https://github.com/dvdoug/PHPCoord/compare/v5.4.0..v5.5.0
[5.4.0]: https://github.com/dvdoug/PHPCoord/compare/v5.3.1..v5.4.0
[5.3.1]: https://github.com/dvdoug/PHPCoord/compare/v5.3.0..v5.3.1
[5.3.0]: https://github.com/dvdoug/PHPCoord/compare/v5.2.0..v5.3.0
[5.2.0]: https://github.com/dvdoug/PHPCoord/compare/v5.1.0..v5.2.0
[5.1.0]: https://github.com/dvdoug/PHPCoord/compare/v5.0.1..v5.1.0
[5.0.1]: https://github.com/dvdoug/PHPCoord/compare/v5.0.0..v5.0.1
[5.0.0]: https://github.com/dvdoug/PHPCoord/compare/v4.7.1..v5.0.0
[4.7.1]: https://github.com/dvdoug/PHPCoord/compare/v4.7.0..v4.7.1
[4.7.0]: https://github.com/dvdoug/PHPCoord/compare/v4.6.1..v4.7.0
[4.6.1]: https://github.com/dvdoug/PHPCoord/compare/v4.6.0..v4.6.1
[4.6.0]: https://github.com/dvdoug/PHPCoord/compare/v4.5.0..v4.6.0
[4.5.0]: https://github.com/dvdoug/PHPCoord/compare/v4.4.0..v4.5.0
[4.4.0]: https://github.com/dvdoug/PHPCoord/compare/v4.3.0..v4.4.0
[4.3.0]: https://github.com/dvdoug/PHPCoord/compare/v4.2.0..v4.3.0
[4.2.0]: https://github.com/dvdoug/PHPCoord/compare/v4.1.0..v4.2.0
[4.1.0]: https://github.com/dvdoug/PHPCoord/compare/v4.0.1..v4.1.0
[4.0.1]: https://github.com/dvdoug/PHPCoord/compare/v4.0.0..v4.0.1
[4.0.0]: https://github.com/dvdoug/PHPCoord/compare/v4.0.0beta1..v4.0.0
[4.0.0beta1]: https://github.com/dvdoug/PHPCoord/compare/v3.1.2..v4.0.0beta1
[3.1.2]: https://github.com/dvdoug/PHPCoord/compare/v3.1.1..v3.1.2
[3.1.1]: https://github.com/dvdoug/PHPCoord/compare/v3.1.0..v3.1.1
[3.1.0]: https://github.com/dvdoug/PHPCoord/compare/v3.0.0..v3.1.0
[3.0.0]: https://github.com/dvdoug/PHPCoord/compare/2.1..v3.0.0
[2.1]: https://github.com/dvdoug/PHPCoord/compare/2.0.3..2.1
[2.0.3]: https://github.com/dvdoug/PHPCoord/compare/2.0.2..2.0.3
[2.0.2]: https://github.com/dvdoug/PHPCoord/compare/2.0.1..2.0.2
[2.0.1]: https://github.com/dvdoug/PHPCoord/compare/2.0..2.0.1
[2.0]: https://github.com/dvdoug/PHPCoord/compare/1.1.2..2.0
[1.1.2]: https://github.com/dvdoug/PHPCoord/compare/1.1.1..1.1.2
[1.1.1]: https://github.com/dvdoug/PHPCoord/compare/1.1..1.1.1
[1.1]: https://github.com/dvdoug/PHPCoord/compare/1.0..1.1
