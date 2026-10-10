---
name: epsg-update
description: >
  Import a new EPSG Dataset and regenerate the PHPCoord catalogue. Use when
  updating EPSG data, editing BLACKLISTED_METHODS or BLACKLISTED_OPERATIONS,
  adding a grid file or a FilenameToProviderMap entry, or running importSQL.php
  or generateData.php.
---

# EPSG dataset update

Checklist for importing a new EPSG Dataset and regenerating the catalogue.
`BLACKLISTED_METHODS` and `BLACKLISTED_OPERATIONS` in
`src/EPSG/Import/EPSGCodegenFromDataImport.php` are PHPCoord policy, not EPSG
deprecation. The consts and the comments next to them are the lists. This note
is the decisions those comments do not spell out. A method code can collide
with an operation or area code (method 1139 vs the Fehmarnbelt operation,
method 1150 vs the GDA94 shortcut operation 1150, method 1159 vs an area code).

## Import and codegen

EPSG SQL is imported with `src/EPSG/Import/importSQL.php`
(`EPSGImporter::dataFromSQLFiles()`, then `dataFromGeoRepository()`).
That step loads Spatialite (`mod_spatialite.so`). On Windows that import is run
under WSL. It rebuilds `resources/epsg/epsg.sqlite`. `extents.sqlite` is updated
in place. A polygon is downloaded again only when that extent’s `revision_date`
has changed or `original` is empty. Buffer and interior point are filled only
where those columns are still null. `bbox` is a GeoJSON rectangle rewritten from
the four `epsg_extent` bounds, expanded by 0.1° on each side, on every import,
including extents whose polygon was not downloaded again. Leave the file in place. Deleting it rebuilds every
polygon from the EPSG polygon service.

`generateDataCoordinateOperations()` does `require 'FilenameToProviderMap.php'`
from the process working directory. Run codegen with the working directory set
to `src/EPSG/Import`. `generateData.php` sets `memory_limit` to `-1`.

When the only change is an operation blacklist or a new `FilenameToProviderMap`
entry, call `generateDataCoordinateOperations()` and skip `generateExtents()`.
A full `generateData.php` always regenerates extents.

Superseded operations stay out of the catalogue even when the replacement is
published at the same accuracy. Concatenated operations are not exported;
`convert()` chains the steps.

`tests/CoordinateOperation/EPSGConcatenatedOperations.csv` is a frozen
reachability fixture. Do not try and sync it with the database table.

A generated method constant still needs a hand entry in
`CoordinateOperationMethods::METHOD_CODE_TO_IMPLEMENTATION_LOOKUP` before it
is callable. A vertical-offset grid method must also be on
`Point::METHODS_REQUIRING_HORIZONTAL_POINT` and
`Point::METHODS_THAT_REQUIRE_DIRECTION`.

If the newly updated dataset requires a new method to be implemented, there
should usually be a worked example for it in the EPSG guidance notes or 
in the notes field in the database. Use that point to write a test case in
the prevailing style rather than picking your own if possible. We don't need
a test point per operation, only per method.

You may implement methods that are pure maths autonomously, do not implement
a file parser for a new grid file format without user permission.

## Method blacklist vs operation blacklist

`BLACKLISTED_METHODS` removes the method and every operation that uses it.
Use it only when the method itself cannot be shipped. An operation that is
still live and must not ship goes on `BLACKLISTED_OPERATIONS` by itself.
Superseded and deprecated operations already drop out. A deprecated method
emits nothing.

## Grid hookup

Grid files and provider classes live in the regional Composer datapacks under
`vendor/php-coord/`. The main repository does not vendor the files. Each
datapack’s `license.txt` is the attribution. e.g. `datapack-asia`’s composer licence
field is `(MIT and CC-BY-4.0 and PDL-1.0 and proprietary)`.

`FilenameToProviderMap` keys are the EPSG filename strings, which is not always the
name of the actual file. Sometimes there's a typo or the grid file creator renamed it,
sometimes we use a different file format. EPSG creates a new method per grid file format,
we abstract that away via the provider classes.

`generateDataCoordinateOperations()` deletes a datapack `resources/` file, its provider
class, and the `FilenameToProviderMap` line when no generated operation, other library
code, or test still names that provider. Extent JSON is not part of that pass.

## WGS 84 hub

These filters run in `EPSGCodegenFromDataImport` against `epsg.sqlite`. They
are not parsed again at runtime. Path cost is the sum of EPSG accuracies, so a
direct operation beats a chain of the same total when the direct operation is
still in the graph.

The Replaces scan parses only the “Replaces … (datum code N)” sentence, not
“Replaced by”. It does not catch OSGB36, the 0.2 m Bogota Helmerts, or an edge
with no shared extent and accuracy match. GDA94/GDA2020, MTRF-2000/KSA-GRF17,
and Bonaire/Bonaire 2004 have no datum Replaces remark (KSA is a rename; the
Bonaire coincidence is on the operation). Do not add a hub for those without
checking that the dropped hop is not the only path out.

If IOGP changes the remark sentence, the scan silently stops matching. Do not
hard-code the operation codes the scan happens to emit, fix the scan.

## Do not automate

- A file whose heading is redistribution-forbidden, paid, or not public. Blacklist the operation under the relevant heading
- A new grid filename with no `FilenameToProviderMap` entry. Blacklist that operation or add a sourced provider.
- Sometimes (e.g. Canada), the files are publically redistibutable but the originals are behind a login. Ask the user
  for help in retrieving them.
- Anything that is already blacklisted without explicit user instruction

## Changelog
- This section applies both to this project but also the datapacks
- Update (or create if not present) a new changelog entry under "Unreleased" noting which countries have updated data
  according to existing style. Keep the changelog at country level, don't specify which new grid files specifically.
