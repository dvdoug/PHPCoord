# Changelog

## [Unreleased]
### Changed
 - All value objects are now immutable - calling a conversion function on them now returns a *new* object rather than modifying the existing one  
 - Minimum PHP version is now 7.1
### Removed
 - HHVM support now that project has a stated goal of no longer targeting PHP7 compatibility

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

[Unreleased]: https://github.com/dvdoug/PHPCoord/compare/v2.1...HEAD
[2.1]: https://github.com/dvdoug/PHPCoord/compare/2.0.3...2.1
[2.0.3]: https://github.com/dvdoug/PHPCoord/compare/2.0.2...2.0.3
[2.0.2]: https://github.com/dvdoug/PHPCoord/compare/2.0.1...2.0.2
[2.0.1]: https://github.com/dvdoug/PHPCoord/compare/2.0...2.0.1
[2.0]: https://github.com/dvdoug/PHPCoord/compare/1.1.2...2.0
[1.1.2]: https://github.com/dvdoug/PHPCoord/compare/1.1.1...1.1.2
[1.1.1]: https://github.com/dvdoug/PHPCoord/compare/1.1...1.1.1
[1.1]: https://github.com/dvdoug/PHPCoord/compare/1.0...1.1
