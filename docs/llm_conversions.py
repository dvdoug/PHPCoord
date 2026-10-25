"""Markdown-only view of the generated conversion catalogues.

The HTML docs keep every operation parameter. The llms.txt Markdown build
keeps the conversion target, operation name, EPSG code, and extent.
"""

from __future__ import annotations

import re

from sphinx.directives.other import Include

_NAME = re.compile(r'^\s*"?\| Name: (.*)$')
_CODE = re.compile(r'^\s*\| Code: ``(.*)``\s*$')
_EXTENT = re.compile(r'^\s*\| Extent: (.*)$')
_EXTENT_TAIL = re.compile(r'"\s*,.*$')


def slim_conversions(text: str) -> str:
    """Return reStructuredText listing conversion targets without parameters.

    Raises ValueError when the generated catalogue is not in the expected
    shape, so a change to the EPSG codegen fails the docs build instead of
    silently dropping operations.
    """
    lines = text.splitlines()
    expected = sum(1 for line in lines if _NAME.match(line))
    out: list[str] = []
    emitted = 0
    index = 0
    total = len(lines)
    while index < total:
        line = lines[index]
        nxt = lines[index + 1] if index + 1 < total else ''
        if (
            line
            and not line[0].isspace()
            and nxt
            and len(nxt) == len(line)
            and nxt[0] in '-^'
            and nxt == nxt[0] * len(nxt)
        ):
            if out and out[-1] != '':
                out.append('')
            out.append(line)
            out.append(nxt)
            out.append('')
            index += 2
            continue
        if line.startswith('``') and line.endswith('``'):
            out.append(line)
            out.append('')
            index += 1
            continue
        name = _NAME.match(line)
        if name and index + 2 < total:
            code = _CODE.match(lines[index + 1])
            extent = _EXTENT.match(lines[index + 2])
            if code and extent:
                extent_text = _EXTENT_TAIL.sub('', extent.group(1)).strip().removesuffix('"').strip()
                out.append(f'- {name.group(1).strip()} (``{code.group(1)}``). {extent_text}')
                emitted += 1
                index += 3
                continue
        index += 1
    if emitted != expected:
        raise ValueError(f'expected {expected} conversion targets, wrote {emitted}')
    return '\n'.join(out).rstrip() + '\n'


class LlmConversionList(Include):
    """Include a conversion catalogue, slimmed for the Markdown build."""

    def read_file(self, path):
        text = super().read_file(path)
        if self.state.document.settings.env.app.tags.has('sphinx_llm_markdown'):
            try:
                return slim_conversions(text)
            except ValueError as error:
                self.severe(str(error))
                raise
        return text
