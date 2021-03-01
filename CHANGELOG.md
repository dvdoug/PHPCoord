# Changelog

## [Unreleased]

## [4.0.0] - 2021-03-01
### Added
- Chaining of conversions
- Documentation(!)

## [4.0.0beta1] - 2021-01-05
### Added
 - 6200 new coordinate systems.
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

[Unreleased]: https://github.com/dvdoug/PHPCoord/compare/v4.0.0...HEAD

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
