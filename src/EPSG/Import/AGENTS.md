# EPSG import

Before an EPSG dataset import, a blacklist edit, or a new grid, follow `.agents/skills/epsg-update/SKILL.md`.

- Run coordinate-operation codegen from this directory with `memory_limit=-1`. `generateDataCoordinateOperations()` requires `FilenameToProviderMap.php` from the working directory.
- A method belongs on `BLACKLISTED_METHODS` only when the method itself cannot be shipped. An operation that must not ship is listed on `BLACKLISTED_OPERATIONS` by itself, and the method stays available.
- A grid filename missing from `FilenameToProviderMap` is sourced into a datapack or operation-blacklisted. Do not export the raw name.
- Coordinate-operation codegen deletes a datapack grid whose provider is no longer named by a generated operation, other library code, or a test.
- Do not vendor a file whose licence forbids redistribution, and do not replace the WGS 84 hub filters with one global shortcut rule.
