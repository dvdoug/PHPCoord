# Changelog

## [Unreleased]

## [4.6.1] - 2022-01-29
Unless a major bug is found, this will be the last release in the v4.x series. All future releases will be v5.x.
This is because one of PHP8.1's [new deprecations](https://github.com/php/php-src/commit/afc4d67c8b4e02a985a4cd27b8e79b343eb3c0ad)
requires a significant non-backwards compatible change to address.

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

## [1.1] - 2014-01-23
Just cleanup

## 1.0.0 - 2014-01-23
Initial release of this fork (based off of v2.3 of original)
### Fixed
 - When converting Latitude and Longitude between WGS84 and OSGB36 or vice-versa, a wrong constant for the y translation has been corrected (was off by 1 metre)
### Changed
 - Eastings and northings are rounded to 1m, and lat/long to 5dp (approx 1m) to avoid any misconceptions that precision is the same thing as accuracy.
 - When calculating surface distances, a more accurate mean radius is now used rather than that derived from historical definitions of a nautical mile

[Unreleased]: https://github.com/dvdoug/PHPCoord/compare/v4.5.0...HEAD

[4.5.0]: https://github.com/dvdoug/PHPCoord/compare/v4.4.0...v4.5.0
[4.4.0]: https://github.com/dvdoug/PHPCoord/compare/v4.3.0...v4.4.0
[4.3.0]: https://github.com/dvdoug/PHPCoord/compare/v4.2.0...v4.3.0
[4.2.0]: https://github.com/dvdoug/PHPCoord/compare/v4.1.0...v4.2.0
[4.1.0]: https://github.com/dvdoug/PHPCoord/compare/v4.0.1...v4.1.0
[4.0.1]: https://github.com/dvdoug/PHPCoord/compare/v4.0.0...v4.0.1
[4.0.0]: https://github.com/dvdoug/PHPCoord/compare/v4.0.0beta1...v4.0.0
[4.0.0beta1]: https://github.com/dvdoug/PHPCoord/compare/v3.1.2...v4.0.0beta1
[3.1.2]: https://github.com/dvdoug/PHPCoord/compare/v3.1.1...v3.1.2
[3.1.1]: https://github.com/dvdoug/PHPCoord/compare/v3.1.0...v3.1.1
[3.1.0]: https://github.com/dvdoug/PHPCoord/compare/v3.0.0...v3.1.0
[3.0.0]: https://github.com/dvdoug/PHPCoord/compare/2.1...v3.0.0
[2.1]: https://github.com/dvdoug/PHPCoord/compare/2.0.3...2.1
[2.0.3]: https://github.com/dvdoug/PHPCoord/compare/2.0.2...2.0.3
[2.0.2]: https://github.com/dvdoug/PHPCoord/compare/2.0.1...2.0.2
[2.0.1]: https://github.com/dvdoug/PHPCoord/compare/2.0...2.0.1
[2.0]: https://github.com/dvdoug/PHPCoord/compare/1.1.2...2.0
[1.1.2]: https://github.com/dvdoug/PHPCoord/compare/1.1.1...1.1.2
[1.1.1]: https://github.com/dvdoug/PHPCoord/compare/1.1...1.1.1
[1.1]: https://github.com/dvdoug/PHPCoord/compare/1.0...1.1
