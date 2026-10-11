#!/usr/bin/env python3
"""Tests for the changelog promotion used by the EPSG dataset release."""

from __future__ import annotations

import sys
import tempfile
import unittest
from pathlib import Path

sys.path.insert(0, str(Path(__file__).resolve().parent))

import release_changelog as changelog

ROOT = Path(__file__).resolve().parents[2]
REAL_CHANGELOG = (ROOT / "CHANGELOG.md").read_text(encoding="utf-8")

# The checked-in changelog grows an Unreleased section on every dataset pull
# request, so the cases below use a frozen file instead of CHANGELOG.md.
EMPTY_CHANGELOG = '# Changelog\n\n## [Unreleased]\n\n## [5.11.1] - 2025-08-14\n### Changed\n- Updates to data for Georgia, Germany, Greenland, Kazakhstan and USA\n\n## [5.11.0] - 2025-06-15\n### Changed\n- More aggressive buffering of extent polygons\n\n[Unreleased]: https://github.com/dvdoug/PHPCoord/compare/v5.11.1..master\n[5.11.1]: https://github.com/dvdoug/PHPCoord/compare/v5.11.0..v5.11.1\n'


def with_unreleased(body: str) -> str:
    return EMPTY_CHANGELOG.replace("## [Unreleased]\n\n", f"## [Unreleased]\n{body}\n", 1)


class PromoteTests(unittest.TestCase):
    def test_empty_unreleased_has_nothing_to_release(self) -> None:
        empty, version, kind = changelog.plan(EMPTY_CHANGELOG)
        self.assertTrue(empty)
        self.assertIsNone(version)
        self.assertIsNone(kind)
        with self.assertRaises(changelog.NothingToRelease):
            changelog.promote(EMPTY_CHANGELOG, "2026-10-11")

    def test_real_changelog_can_be_planned(self) -> None:
        empty, version, kind = changelog.plan(REAL_CHANGELOG)
        if empty:
            self.assertIsNone(version)
            self.assertIsNone(kind)
            return
        self.assertRegex(version or "", r"^\d+\.\d+\.\d+$")
        self.assertIn(kind, ("patch", "minor"))

    def test_changed_only_is_a_patch_and_preserves_the_compare_style(self) -> None:
        source = with_unreleased("### Changed\n- Updates to extents\n")
        updated, version, kind = changelog.promote(source, "2026-10-11")

        self.assertEqual(version, '5.11.2')
        self.assertEqual(kind, "patch")
        self.assertIn('## [Unreleased]\n\n## [5.11.2] - 2026-10-11\n### Changed\n- Updates to extents\n\n## [5.11.1] - 2025-08-14\n', updated)
        self.assertIn("- More aggressive buffering of extent polygons", updated)
        self.assertIn('compare/v5.11.1..v5.11.2', updated)
        self.assertNotIn('compare/v5.11.1..master', updated)
        self.assertEqual(changelog.notes_for(updated, '5.11.2'), "### Changed\n- Updates to extents\n")

    def test_added_is_a_minor_even_when_changed_is_present(self) -> None:
        source = with_unreleased("### Added\n- New grid for Greenland\n### Changed\n- Updates to extents\n")
        _updated, version, kind = changelog.promote(source, "2026-10-11")
        self.assertEqual((version, kind), ('5.12.0', "minor"))

    def test_added_in_an_older_release_does_not_bump_the_minor(self) -> None:
        source = with_unreleased("### Fixed\n- Extent polygon winding\n")
        source = source.replace(
            "### Changed\n- More aggressive buffering of extent polygons",
            "### Added\n- More aggressive buffering of extent polygons",
            1,
        )
        _updated, version, kind = changelog.promote(source, "2026-10-11")
        self.assertEqual((version, kind), ('5.11.2', "patch"))

    def test_two_dot_master_links_are_left_in_that_style(self) -> None:
        source = """# Changelog

## [Unreleased]
### Changed
- Updates to extents

## [5.11.1] - 2025-08-14
### Changed
- Updates to data

[Unreleased]: https://github.com/dvdoug/PHPCoord/compare/v5.11.1..master
[5.11.1]: https://github.com/dvdoug/PHPCoord/compare/v5.11.0..v5.11.1
"""
        updated, version, kind = changelog.promote(source, "2026-10-11")
        self.assertEqual((version, kind), ("5.11.2", "patch"))
        self.assertIn("[Unreleased]: https://github.com/dvdoug/PHPCoord/compare/v5.11.2..master\n", updated)
        self.assertIn("[5.11.2]: https://github.com/dvdoug/PHPCoord/compare/v5.11.1..v5.11.2\n", updated)
        self.assertNotIn("...", updated)


    def test_three_dot_head_links_are_left_in_that_style(self) -> None:
        source = """# Changelog

## [Unreleased]
### Changed
- Updates to extents

## [1.4.1] - 2026-09-14
### Changed
- Updates to extents

[Unreleased]: https://github.com/dvdoug/PHPCoordAntarctic/compare/v1.4.1...HEAD
[1.4.1]: https://github.com/dvdoug/PHPCoordAntarctic/compare/v1.4.0...v1.4.1
"""
        updated, version, kind = changelog.promote(source, "2026-10-11")
        self.assertEqual((version, kind), ("1.4.2", "patch"))
        self.assertIn("[Unreleased]: https://github.com/dvdoug/PHPCoordAntarctic/compare/v1.4.2...HEAD\n", updated)
        self.assertIn("[1.4.2]: https://github.com/dvdoug/PHPCoordAntarctic/compare/v1.4.1...v1.4.2\n", updated)
        self.assertNotIn("..master", updated)

    def test_heading_wins_when_the_unreleased_link_is_stale(self) -> None:
        source = with_unreleased("### Changed\n- Updates to extents\n")
        source = source.replace('compare/v5.11.1..master', 'compare/v0.0.1..master', 1)
        updated, version, _kind = changelog.promote(source, "2026-10-11")
        self.assertEqual(version, '5.11.2')
        self.assertIn('compare/v5.11.1..v5.11.2', updated)
        self.assertNotIn('compare/v0.0.1..master', updated)

    def test_notes_for_an_existing_release_are_verbatim(self) -> None:
        self.assertEqual(changelog.notes_for(EMPTY_CHANGELOG, '5.11.1'), '### Changed\n- Updates to data for Georgia, Germany, Greenland, Kazakhstan and USA\n')

    def test_notes_without_a_blank_line_under_unreleased_are_a_patch(self) -> None:
        source = EMPTY_CHANGELOG.replace(
            "## [Unreleased]\n\n",
            "## [Unreleased]\n### Changed\n- Updates to extents\n\n",
            1,
        )
        _updated, version, kind = changelog.promote(source, "2026-10-11")
        self.assertEqual((version, kind), ('5.11.2', "patch"))

    def test_comment_bodies(self) -> None:
        ready = changelog.comment_body(with_unreleased("### Changed\n- Updates to extents\n"), removed=False)
        self.assertIn('release v5.11.2 (patch)', ready)
        self.assertTrue(ready.endswith("<!-- phpcoord-release-preview -->\n"))

        empty = changelog.comment_body(EMPTY_CHANGELOG, removed=False)
        self.assertIn("has no notes", empty)

        removed = changelog.comment_body(None, removed=True)
        self.assertIn("label was removed", removed)

    def test_promote_command_writes_the_file(self) -> None:
        source = with_unreleased("### Changed\n- Updates to extents\n")
        with tempfile.TemporaryDirectory() as directory:
            path = Path(directory) / "CHANGELOG.md"
            path.write_text(source, encoding="utf-8", newline="\n")
            code = changelog.main(["promote", str(path), "--date", "2026-10-11"])
            self.assertEqual(code, 0)
            written = path.read_text(encoding="utf-8")
            self.assertIn('## [5.11.2] - 2026-10-11\n', written)

    def test_promote_command_refuses_an_empty_section(self) -> None:
        with tempfile.TemporaryDirectory() as directory:
            path = Path(directory) / "CHANGELOG.md"
            path.write_text(EMPTY_CHANGELOG, encoding="utf-8", newline="\n")
            code = changelog.main(["promote", str(path), "--date", "2026-10-11"])
            self.assertEqual(code, 2)
            self.assertEqual(path.read_text(encoding="utf-8"), EMPTY_CHANGELOG)


if __name__ == "__main__":
    unittest.main()
