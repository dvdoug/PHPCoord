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

## Update loop

1. Source the data. epsg.org: EPSG Dataset > Download dataset > PostgreSQL scripts
   (needs a login). Unzip over `resources/epsg`. The download is a full dataset, so
   skipping versions is fine. Until NGS declares the NSRS 2022 grids officially final,
   also check NCAT (https://beta.ngs.noaa.gov/NCAT/index.xhtml, "Nadcon6 grids") for
   updated grids.
2. Run `importSQL.php`, then add a `RegionMap` line for every new extent (see below),
   then run `generateData.php`.
3. Run the tests (`vendor/bin/phpunit`).
4. Changelogs and PRs: the main repository plus every datapack with changed files.
   Then watch CI.

Anything unfamiliar at any step: stop and ask rather than improvising.

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

## RegionMap

`src/Geometry/RegionMap.php` `EXTENTS` decides which regional `CRSTransformations*`
file an operation goes in and which datapack holds an extent's polygon. Add it after
`importSQL.php` and before `generateData.php`.

- Find new extents by comparing the extent codes in the old and new
  `PostgreSQL_Data_Script.sql`, not just codes above the old maximum.
- Only USED extents get exported. Unmapped older extents just weren't used before.
  Adding them anyway is harmless.
- Region test: which datapack would a human pick? Hawaii is North America. Be
  consistent, even if that means fixing older mappings.
- Grids and providers must live in the same datapack as their operations' extents.
  When an extent moves region, move any provider classes and grid files that go with it.
- When a region moves, the legacy-extent cleanup at the end of `generateExtents()`
  ("Remove unused extents") does not remove the old datapack's copy of the extent
  JSON. It only deletes codes that are no longer used anywhere. Delete the old copy by
  hand, and check every datapack's `src/Geometry/Extents/*.json` against `RegionMap`.

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

The only expected `generateData.php` failure is `X has no entry in
FilenameToProviderMap (op)`. Prefer sourcing the grid: download it, add a provider
in the right datapack with the right parser, and add a `FilenameToProviderMap` entry.
If the grid can't be sourced, blacklist the operation under
`// Grid files not tracked down yet` with a `// METHOD filename` comment, and rerun
until codegen passes. Never abandon the update over a missing grid. Any other
codegen failure: stop and ask.

Provider classes copy their neighbours exactly: same namespace
(`PHPCoord\CoordinateOperation`), name derived mechanically from the file name, and
the grid/parser class that existing providers for that format use.

EPSG filenames can differ from the real files. For example, the NSRS 2022 PRVI grids
are `natrf2022` in EPSG but `catrf2022` from NGS. The map keys absorb that: the key
is the EPSG name and the value is the provider for the real file.

NGS NADCON 6 files ending `.le.b` are little-endian (`.be.b` is big-endian).
`NADCON5Grid` detects the byte order from the filename, and plain `.b` stays
big-endian, so keep NGS's original filename in `resources/`.

Licence attribution is part of adding grids. If the provider isn't already credited,
add its section to that datapack's `license.txt` (copy the wording from a datapack
that already has it) and its SPDX id to the `composer.json` licence expression. Then
run `composer validate --strict`. Not every government licence has an SPDX id.

After moving or adding provider classes in a local `vendor/` checkout, run
`composer dump-autoload`. The optimised classmap still points at the old paths
otherwise.

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

## Test failures

Report them, don't auto-patch. Known fixes:

- EPSG renamed something used in a GIGS fixture (e.g. a datum name): update the
  name in the fixture under `tests/GIGS/`. The files are tab-separated, so edit the
  bytes.
- An extent whose surface point lands exactly on the antimeridian, where the test
  tolerance has no wraparound: add an interior-point override in `EPSGImporter` next
  to the Mayotte (1159) one, then rerun both scripts.
- Datapack-based tests skipping with "datapack not installed" usually mean the
  installed datapacks are behind master. Update them before trusting the run.

## Changelog
- This section applies both to this project but also the datapacks
- Update (or create if not present) a new changelog entry under "Unreleased" noting which countries have updated data
  according to existing style. Keep the changelog at country level, don't specify which new grid files specifically.
- Main repository: `Updates to data for <countries>` under `## [Unreleased]` /
  `### Changed`. Always add newly affected countries to the existing line.
- Datapacks: `Updates to extents for <countries>` under `### Changed`, and
  `Grid files for <countries>` under `### Added`. Grid files moved out to another
  datapack go under `### Removed`. A datapack whose only changes are floating-point
  noise from rebuilding polygons gets plain `Updates to extents`, with no country list.
- Country names only, no technical detail. Rename-only (title-only) extent changes
  don't count. Territories are listed separately (e.g. Puerto Rico, Guam, Mayotte,
  US Minor Outlying Islands).
- Wrap list lines at 80–120 characters, and never split a country name across lines.
- A good source for affected countries is the new rows in `epsg_change` (diff the old
  and new `PostgreSQL_Data_Script.sql`), cross-checked against the generated source.

## Pull requests

- Main repository: branch `epsg-<version>` off master. PR title
  `Update to EPSG dataset <version>`. The generated changes are the PR.
- Every datapack with changed files gets a matching branch and PR with the same title.
  Link each one to the main PR.
