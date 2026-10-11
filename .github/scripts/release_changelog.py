#!/usr/bin/env python3
"""Promote the Unreleased section of a Keep a Changelog file."""

from __future__ import annotations

import argparse
import re
import sys
from datetime import datetime
from pathlib import Path

UNRELEASED_HEADING = re.compile(r"^## \[Unreleased\][ \t]*$", re.MULTILINE)
VERSION_HEADING = re.compile(
    r"^## \[(\d+\.\d+\.\d+)\](?:[ \t]+-[ \t]+\d{4}-\d{2}-\d{2})?[ \t]*$",
    re.MULTILINE,
)
ADDED_HEADING = re.compile(r"^### Added[ \t]*$", re.MULTILINE)
UNRELEASED_LINK = re.compile(
    r"^\[Unreleased\]:[ \t]+"
    r"(?P<prefix>https://github\.com/[^/\s]+/[^/\s]+/compare/)"
    r"(?P<tagprefix>v?)"
    r"(?P<version>\d+\.\d+\.\d+)"
    r"(?P<dots>\.\.\.|\.\.)"
    r"(?P<target>\S+)[ \t]*$",
    re.MULTILINE,
)
PREVIEW_MARKER = "<!-- phpcoord-release-preview -->"


class NothingToRelease(Exception):
    """The Unreleased section has no notes."""


def bump(version: str, kind: str) -> str:
    major, minor, patch = (int(part) for part in version.split("."))
    if kind == "minor":
        return f"{major}.{minor + 1}.0"
    if kind == "patch":
        return f"{major}.{minor}.{patch + 1}"
    raise ValueError(f"Unknown bump {kind}")


def kind_for(body: str) -> str:
    if ADDED_HEADING.search(body):
        return "minor"
    return "patch"


def split_unreleased(text: str) -> tuple[str, str, str, str]:
    heading = UNRELEASED_HEADING.search(text)
    if heading is None:
        raise ValueError("CHANGELOG.md has no ## [Unreleased] heading")
    following = VERSION_HEADING.search(text, heading.end())
    if following is None:
        raise ValueError("CHANGELOG.md has no version heading after Unreleased")
    body = text[heading.end() : following.start()]
    return text[: heading.start()], body, following.group(1), text[following.start() :]


def plan(text: str) -> tuple[bool, str | None, str | None]:
    _before, body, current, _rest = split_unreleased(text)
    if body.strip() == "":
        return True, None, None
    kind = kind_for(body)
    return False, bump(current, kind), kind


def rewrite_links(text: str, previous: str, version: str) -> str:
    match = UNRELEASED_LINK.search(text)
    if match is None:
        raise ValueError("CHANGELOG.md has no [Unreleased] compare link")
    prefix = match.group("prefix")
    tagprefix = match.group("tagprefix")
    dots = match.group("dots")
    target = match.group("target")
    new_unreleased = f"[Unreleased]: {prefix}{tagprefix}{version}{dots}{target}"
    new_version_link = f"[{version}]: {prefix}{tagprefix}{previous}{dots}{tagprefix}{version}"
    end = match.end()
    following_break = ""
    if text[end : end + 1] == "\n":
        following_break = "\n"
        end += 1
    replacement = f"{new_unreleased}\n{new_version_link}{following_break}"
    return text[: match.start()] + replacement + text[end:]


def promote(text: str, date: str) -> tuple[str, str, str]:
    datetime.strptime(date, "%Y-%m-%d")
    before, body, current, rest = split_unreleased(text)
    if body.strip() == "":
        raise NothingToRelease()
    kind = kind_for(body)
    version = bump(current, kind)
    notes = body.strip("\n")
    updated = (
        f"{before}"
        "## [Unreleased]\n"
        "\n"
        f"## [{version}] - {date}\n"
        f"{notes}\n"
        "\n"
        f"{rest.lstrip(chr(10))}"
    )
    return rewrite_links(updated, current, version), version, kind


def notes_for(text: str, version: str) -> str:
    pattern = re.compile(
        rf"^## \[{re.escape(version)}\][^\n]*\n(.*?)(?=^## |\Z)",
        re.MULTILINE | re.DOTALL,
    )
    match = pattern.search(text)
    if match is None:
        raise ValueError(f"CHANGELOG.md has no section for {version}")
    return match.group(1).strip("\n") + "\n"


def comment_body(text: str | None, removed: bool) -> str:
    if removed:
        line = "Merging this pull request will not release. The `EPSG dataset update` label was removed."
    else:
        if text is None:
            raise ValueError("CHANGELOG.md is required")
        empty, version, kind = plan(text)
        if empty:
            line = (
                "This pull request is labeled `EPSG dataset update`, and `## [Unreleased]` "
                "has no notes. Merging it will not release."
            )
        else:
            line = (
                "This pull request is labeled `EPSG dataset update`. "
                f"Merging it will release v{version} ({kind}) after CI passes."
            )
    return f"{line}\n\n{PREVIEW_MARKER}\n"


def read_changelog(path: Path) -> str:
    return path.read_text(encoding="utf-8")


def write_changelog(path: Path, original: str, updated: str) -> None:
    if "\r\n" in original:
        updated = updated.replace("\r\n", "\n").replace("\n", "\r\n")
    path.write_bytes(updated.encode("utf-8"))


def main(argv: list[str] | None = None) -> int:
    parser = argparse.ArgumentParser()
    commands = parser.add_subparsers(dest="command", required=True)

    plan_command = commands.add_parser("plan")
    plan_command.add_argument("changelog")

    promote_command = commands.add_parser("promote")
    promote_command.add_argument("changelog")
    promote_command.add_argument("--date", required=True)

    notes_command = commands.add_parser("notes")
    notes_command.add_argument("changelog")
    notes_command.add_argument("version")

    comment_command = commands.add_parser("comment")
    comment_command.add_argument("changelog", nargs="?")
    comment_command.add_argument("--removed", action="store_true")

    args = parser.parse_args(argv)
    try:
        if args.command == "plan":
            empty, version, kind = plan(read_changelog(Path(args.changelog)))
            if empty:
                print("empty=true")
            else:
                print("empty=false")
                print(f"version={version}")
                print(f"bump={kind}")
            return 0
        if args.command == "promote":
            path = Path(args.changelog)
            original = read_changelog(path)
            updated, version, kind = promote(original, args.date)
            write_changelog(path, original, updated)
            print(f"version={version}")
            print(f"bump={kind}")
            print(f"Release v{version} ({kind})", file=sys.stderr)
            return 0
        if args.command == "notes":
            sys.stdout.write(notes_for(read_changelog(Path(args.changelog)), args.version))
            return 0
        text = None if args.removed or args.changelog is None else read_changelog(Path(args.changelog))
        sys.stdout.write(comment_body(text, args.removed))
        return 0
    except NothingToRelease:
        print("Unreleased has no notes; not releasing.", file=sys.stderr)
        return 2
    except ValueError as error:
        print(str(error), file=sys.stderr)
        return 1


if __name__ == "__main__":
    sys.exit(main())
