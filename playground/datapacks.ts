// Regional datapacks the docs demo can mount. Ids match RegionMap::PACKAGES
// and scripts/datapack-ids.mjs. Grids and polygons stay out of the core
// preload; the worker plants a pack only while its toggle is on.

export const DATAPACKS = [
    { id: "africa", label: "Africa" },
    { id: "antarctic", label: "Antarctic" },
    { id: "arctic", label: "Arctic" },
    { id: "asia", label: "Asia" },
    { id: "europe", label: "Europe" },
    { id: "northamerica", label: "North America" },
    { id: "oceania", label: "Oceania" },
    { id: "southamerica", label: "South America" },
] as const;

export type DatapackId = (typeof DATAPACKS)[number]["id"];

export const DATAPACK_STORAGE_KEY = "phpcoord-demo-datapacks";

const knownIds = new Set<string>(DATAPACKS.map((pack) => pack.id));

export function datapackLabel(id: string): string {
    return DATAPACKS.find((pack) => pack.id === id)?.label ?? id;
}

export function normalizePacks(ids: readonly string[]): DatapackId[] {
    const chosen: DatapackId[] = [];
    for (const id of ids) {
        if (!knownIds.has(id) || chosen.includes(id as DatapackId)) {
            continue;
        }
        chosen.push(id as DatapackId);
    }
    return chosen;
}

// InstalledVersions treats a versions entry as installed. Drop packs that are
// off, and add a missing entry for a pack that is on. A block this cannot
// parse is left in place: the files are still unmounted, so file_exists and
// class_exists stay false.
export function installedPhpFor(source: string, enabledIds: readonly string[]): string {
    const enabled = new Set<string>(normalizePacks(enabledIds));
    let output = source;
    for (const pack of DATAPACKS) {
        const packageName = `php-coord/datapack-${pack.id}`;
        const block = findPackageBlock(output, packageName);
        if (block.kind === "parsed") {
            if (!enabled.has(pack.id)) {
                output = output.slice(0, block.start) + output.slice(block.end);
            }
            continue;
        }
        if (block.kind === "absent" && enabled.has(pack.id)) {
            output = insertPackageBlock(output, packageName);
        }
    }
    return output;
}

type PackageBlock =
    | { kind: "absent" }
    | { kind: "unparsed" }
    | { kind: "parsed"; start: number; end: number };

function findPackageBlock(source: string, packageName: string): PackageBlock {
    const marker = `'${packageName}' =>`;
    const at = source.indexOf(marker);
    if (at < 0) {
        return { kind: "absent" };
    }
    const arrayAt = source.indexOf("array(", at + marker.length);
    if (arrayAt < 0 || arrayAt > at + marker.length + 16) {
        return { kind: "unparsed" };
    }
    const close = closeParen(source, arrayAt + "array".length);
    if (close < 0) {
        return { kind: "unparsed" };
    }
    let end = close + 1;
    while (end < source.length && (source[end] === " " || source[end] === "\t")) {
        end += 1;
    }
    if (source[end] === ",") {
        end += 1;
    }
    if (source[end] === "\r") {
        end += 1;
    }
    if (source[end] === "\n") {
        end += 1;
    }
    let start = at;
    while (start > 0 && source[start - 1] !== "\n") {
        start -= 1;
    }
    return { kind: "parsed", start, end };
}

function closeParen(source: string, openParen: number): number {
    let depth = 0;
    let quote: "'" | '"' | null = null;
    for (let index = openParen; index < source.length; index += 1) {
        const ch = source[index];
        if (quote) {
            if (ch === "\\") {
                index += 1;
                continue;
            }
            if (ch === quote) {
                quote = null;
            }
            continue;
        }
        if (ch === "'" || ch === '"') {
            quote = ch;
            continue;
        }
        if (ch === "(") {
            depth += 1;
            continue;
        }
        if (ch === ")") {
            depth -= 1;
            if (depth === 0) {
                return index;
            }
        }
    }
    return -1;
}

function insertPackageBlock(source: string, packageName: string): string {
    const anchor = source.indexOf("'php-coord/php-coord' =>");
    if (anchor < 0) {
        throw new Error("installed.php has no php-coord/php-coord entry");
    }
    let start = anchor;
    while (start > 0 && source[start - 1] !== "\n") {
        start -= 1;
    }
    const id = packageName.slice("php-coord/datapack-".length);
    const block = [
        `        '${packageName}' => array(`,
        "            'pretty_version' => 'dev-master',",
        "            'version' => 'dev-master',",
        "            'reference' => null,",
        "            'type' => 'library',",
        `            'install_path' => __DIR__ . '/../php-coord/datapack-${id}',`,
        "            'aliases' => array(),",
        "            'dev_requirement' => false,",
        "        ),",
        "",
    ].join("\n");
    return source.slice(0, start) + block + source.slice(start);
}
