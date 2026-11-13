import catalogueFile from "./php/crs-index.json";
import type { ConvertResult, Problem } from "./convert.worker.ts";
import { DATAPACKS, DATAPACK_STORAGE_KEY, normalizePacks } from "./datapacks.ts";

interface AxisInfo {
    name: string;
    abbreviation: string;
    unit: string;
    kind: "angle" | "length";
    sample?: string;
}

interface CrsRecord {
    srid: string;
    code: string;
    name: string;
    kind: string;
    axes: AxisInfo[];
    usng?: boolean;
}

interface AngleUnit {
    srid: string;
    name: string;
    textual: boolean;
    help: string;
}

interface Catalogue {
    degreeUnit: string;
    angleUnits: AngleUnit[];
    units: Record<string, string>;
    crs: CrsRecord[];
}

interface Example {
    title: string;
    source: string;
    target: string;
    values: Record<string, string>;
}

const catalogue = catalogueFile as Catalogue;
const inputEpoch = new Set<string>();
const METRE_UNIT = "urn:ogc:def:uom:EPSG::9001";
// EPSG:9115, EPSG:9118 and EPSG:9119 are degree-plus-fractional-minute
// notations. No current CRS uses them.
const unusedDegreeMinuteUnits = new Set([
    "urn:ogc:def:uom:EPSG::9115",
    "urn:ogc:def:uom:EPSG::9118",
    "urn:ogc:def:uom:EPSG::9119",
]);
const degreeFormats = catalogue.angleUnits.filter(
    (unit) => (unit.srid === catalogue.degreeUnit || unit.textual) && !unusedDegreeMinuteUnits.has(unit.srid),
);

const EXAMPLES: Example[] = [
    {
        title: "Statue of Liberty",
        source: "urn:ogc:def:crs:EPSG::4269",
        target: "urn:ogc:def:crs:EPSG::2263",
        values: {
            "Geodetic latitude": "40.689167",
            "Geodetic longitude": "-74.044502",
        },
    },
    {
        title: "Nelson's Column",
        source: "urn:ogc:def:crs:EPSG::27700",
        target: "urn:ogc:def:crs:EPSG::4326",
        values: {
            Easting: "530017",
            Northing: "180419",
        },
    },
    {
        title: "Eiffel Tower",
        source: "urn:ogc:def:crs:EPSG::4258",
        target: "urn:ogc:def:crs:EPSG::2154",
        values: {
            "Geodetic latitude": "48.858222",
            "Geodetic longitude": "2.294500",
        },
    },
    {
        title: "Sydney Opera House",
        source: "urn:ogc:def:crs:EPSG::4283",
        target: "urn:ogc:def:crs:EPSG::4326",
        values: {
            "Geodetic latitude": "-33.85681",
            "Geodetic longitude": "151.21514",
        },
    },
    {
        title: "Tokyo Skytree",
        source: "urn:ogc:def:crs:EPSG::6668",
        target: "urn:ogc:def:crs:EPSG::6677",
        values: {
            "Geodetic latitude": "35.710064",
            "Geodetic longitude": "139.810699",
        },
    },
];

const KIND_LABEL: Record<string, string> = {
    geographic2d: "geographic 2D",
    geographic3d: "geographic 3D",
    projected: "projected",
    geocentric: "geocentric",
    compound: "compound",
};

const bySrid = new Map(catalogue.crs.map((crs) => [crs.srid, crs]));

const worker = new Worker(new URL("./convert.worker.ts", import.meta.url), { type: "module" });

let requestId = 0;
const pending = new Map<number, { resolve: (result: ConvertResult) => void; reject: (error: Error) => void }>();

worker.onmessage = (event: MessageEvent<{ id: number; ok: boolean; warmed?: boolean; inputEpochSrids?: string[]; result?: ConvertResult; error?: string }>) => {
    const waiting = pending.get(event.data.id);
    if (!waiting) {
        return;
    }
    pending.delete(event.data.id);
    if (event.data.warmed) {
        inputEpoch.clear();
        for (const srid of event.data.inputEpochSrids ?? []) {
            inputEpoch.add(srid);
        }
        presentEpoch();
        waiting.resolve({ crs: { srid: "", name: "", code: "" }, axes: [], accuracy: [], route: [], unchanged: false, error: null });
        return;
    }
    if (!event.data.ok || !event.data.result) {
        waiting.reject(new Error(event.data.error || "Conversion failed"));
        return;
    }
    waiting.resolve(event.data.result);
};

worker.onerror = (event) => {
    for (const waiting of pending.values()) {
        waiting.reject(new Error(event.message || "The conversion worker failed"));
    }
    pending.clear();
};

function askWorker(message: { warmup?: boolean; problem?: Problem; packs: string[]; volumeBase: string }): Promise<ConvertResult> {
    const id = ++requestId;
    return new Promise((resolve, reject) => {
        pending.set(id, { resolve, reject });
        worker.postMessage({ id, ...message });
    });
}

let boot: Promise<void> | null = null;
let bootGeneration = 0;
const packInputs = new Map<string, HTMLInputElement>();

function volumeBaseUrl(): string {
    return new URL("_static/volumes/", document.baseURI).href;
}

function selectedPacks(): string[] {
    return DATAPACKS.filter((pack) => packInputs.get(pack.id)?.checked).map((pack) => pack.id);
}

function ensureBoot(): Promise<void> {
    if (boot === null) {
        const pendingBoot = askWorker({
            warmup: true,
            packs: selectedPacks(),
            volumeBase: volumeBaseUrl(),
        }).then(() => undefined).catch((error: unknown) => {
            if (boot === pendingBoot) {
                boot = null;
            }
            throw error;
        });
        boot = pendingBoot;
    }
    return boot;
}

function crsLabel(crs: CrsRecord): string {
    const prefix = crs.srid.includes(":EPSG::") ? `EPSG:${crs.code}` : crs.code;
    return `${prefix} ${crs.name}`;
}

function axisTitle(name: string): string {
    if (name === "Geodetic latitude") {
        return "Latitude";
    }
    if (name === "Geodetic longitude") {
        return "Longitude";
    }
    return name;
}

function searchTokens(query: string): string[] {
    return query.split(/[^a-z0-9]+/).filter((token) => token !== "");
}

function matchesToken(name: string, code: string, token: string): boolean {
    if (code === token) {
        return true;
    }
    // A letter just typed is the start of the next word, so "u" matches "UTM".
    return name.split(/[^a-z0-9]+/).some((word) => word.startsWith(token));
}

function tokenRank(name: string, tokens: string[]): number {
    let from = 0;
    let ordered = 1;
    for (const token of tokens) {
        const at = name.indexOf(token, from);
        if (at < 0) {
            ordered = 0;
            break;
        }
        from = at + token.length;
    }
    const starts = name.startsWith(tokens[0] ?? "") ? 1 : 0;
    return (ordered * 2 + starts) * 10000 - name.length;
}

function searchCrs(query: string): CrsRecord[] {
    const q = query.trim().toLowerCase().replace(/^epsg:\s*/, "");
    if (q === "") {
        return catalogue.crs;
    }
    const folded = q.replace(/ /g, "");
    const tokens = searchTokens(q);
    const exact: CrsRecord[] = [];
    const codePrefix: CrsRecord[] = [];
    const namePrefix: CrsRecord[] = [];
    const nameIncludes: CrsRecord[] = [];
    const foldedExact: CrsRecord[] = [];
    const foldedPrefix: CrsRecord[] = [];
    const foldedIncludes: CrsRecord[] = [];
    const tokenMatches: CrsRecord[] = [];
    for (const crs of catalogue.crs) {
        const code = crs.code.toLowerCase();
        const name = crs.name.toLowerCase();
        if (code === q) {
            exact.push(crs);
        } else if (code.startsWith(q)) {
            codePrefix.push(crs);
        } else if (name.startsWith(q)) {
            namePrefix.push(crs);
        } else if (name.includes(q)) {
            nameIncludes.push(crs);
        } else {
            const foldedName = name.replace(/ /g, "");
            if (foldedName === folded) {
                foldedExact.push(crs);
            } else if (foldedName.startsWith(folded)) {
                foldedPrefix.push(crs);
            } else if (foldedName.includes(folded)) {
                foldedIncludes.push(crs);
            } else if (tokens.length > 1 && tokens.every((token) => matchesToken(name, code, token))) {
                tokenMatches.push(crs);
            }
        }
    }
    tokenMatches.sort((left, right) => tokenRank(right.name.toLowerCase(), tokens) - tokenRank(left.name.toLowerCase(), tokens));
    return [
        ...exact,
        ...codePrefix,
        ...namePrefix,
        ...nameIncludes,
        ...foldedExact,
        ...foldedPrefix,
        ...foldedIncludes,
        ...tokenMatches,
    ];
}

function inputUnit(axis: AxisInfo): string {
    if (axis.unit !== catalogue.degreeUnit) {
        return axis.unit;
    }
    const chosen = chosenUnits.get(axis.name);
    if (chosen !== undefined && degreeFormats.some((unit) => unit.srid === chosen)) {
        return chosen;
    }
    return catalogue.degreeUnit;
}

// Parsers and formatters mirror Degree.php. Latitude uses N/S. Longitude uses E/W.
const DEGREE_HELP: Record<string, string> = {
    "urn:ogc:def:uom:EPSG::9116": "Decimal degrees, then N, S, E or W. For example, 40.689167°N.",
    "urn:ogc:def:uom:EPSG::9117": "N, S, E or W, then decimal degrees. For example, N40.689167°.",
    "urn:ogc:def:uom:EPSG::9107": "Degrees, minutes and seconds. A minus sign is south or west. For example, 40°41′21.0012″.",
    "urn:ogc:def:uom:EPSG::9108": "Degrees, minutes and seconds, then N, S, E or W. For example, 74°2′39.9984″W.",
    "urn:ogc:def:uom:EPSG::9120": "N, S, E or W, then degrees, minutes and seconds. For example, W74°2′39.9984″.",
    "urn:ogc:def:uom:EPSG::9110": "Degrees, a point, two minute digits, two second digits, then a fraction of a second. For example, 40.41210012 is 40°41′21.0012″.",
};

type AngleCheck = "ok" | "incomplete" | "bad";
type DmsMode = "signed" | "suffix" | "prefix";

function isDigit(character: string): boolean {
    return character >= "0" && character <= "9";
}

function scanNumber(text: string): AngleCheck {
    const value = text.trim().replace(/−/g, "-");
    if (value === "") {
        return "incomplete";
    }
    if (!/^[+-]?\d*\.?\d*$/.test(value)) {
        return "bad";
    }
    if (/^[+-]?(?:\d+\.?\d*|\.\d+)$/.test(value)) {
        return "ok";
    }
    return "incomplete";
}

function scanDegreeHemisphere(text: string): AngleCheck {
    const value = text.replace(/ /g, "");
    if (value === "") {
        return "incomplete";
    }
    let index = 0;
    if (!isDigit(value[0] ?? "")) {
        return "bad";
    }
    while (isDigit(value[index] ?? "")) {
        index++;
    }
    if (value[index] === ".") {
        index++;
        while (isDigit(value[index] ?? "")) {
            index++;
        }
    }
    if (value[index] === "°" || value[index] === "º") {
        index++;
    }
    if (index === value.length) {
        return "incomplete";
    }
    if (!"NSEW".includes(value[index] ?? "")) {
        return "bad";
    }
    index++;
    return index === value.length ? "ok" : "bad";
}

function scanHemisphereDegree(text: string): AngleCheck {
    const value = text.replace(/ /g, "");
    if (value === "") {
        return "incomplete";
    }
    if (!"NSEW".includes(value[0] ?? "")) {
        return "bad";
    }
    let index = 1;
    if (index === value.length) {
        return "incomplete";
    }
    if (!isDigit(value[index] ?? "")) {
        return "bad";
    }
    while (isDigit(value[index] ?? "")) {
        index++;
    }
    if (value[index] === ".") {
        index++;
        while (isDigit(value[index] ?? "")) {
            index++;
        }
    }
    if (value[index] === "°" || value[index] === "º") {
        index++;
    }
    return index === value.length ? "ok" : "bad";
}

function scanSexagesimal(text: string): AngleCheck {
    const value = text.replace(/ /g, "");
    if (value === "") {
        return "incomplete";
    }
    let index = 0;
    if (value[0] === "-" || value[0] === "−") {
        index = 1;
        if (index === value.length) {
            return "incomplete";
        }
    }
    if (!isDigit(value[index] ?? "")) {
        return "bad";
    }
    while (isDigit(value[index] ?? "")) {
        index++;
    }
    if (index === value.length) {
        return "ok";
    }
    if (value[index] !== ".") {
        return "bad";
    }
    index++;
    while (isDigit(value[index] ?? "")) {
        index++;
    }
    return index === value.length ? "ok" : "bad";
}

function scanDms(text: string, mode: DmsMode): AngleCheck {
    const value = text.replace(/ /g, "");
    if (value === "") {
        return "incomplete";
    }
    let index = 0;
    if (mode === "prefix") {
        if (!"NSEW".includes(value[0] ?? "")) {
            return "bad";
        }
        index = 1;
        if (index === value.length) {
            return "incomplete";
        }
    } else if (mode === "signed" && (value[0] === "-" || value[0] === "−")) {
        index = 1;
        if (index === value.length) {
            return "incomplete";
        }
    }
    if (!isDigit(value[index] ?? "")) {
        return "bad";
    }
    while (isDigit(value[index] ?? "")) {
        index++;
    }
    if (value[index] === "°" || value[index] === "º") {
        index++;
    }
    let numbers = 0;
    while (numbers < 2 && isDigit(value[index] ?? "")) {
        while (isDigit(value[index] ?? "")) {
            index++;
        }
        let decimal = false;
        if (value[index] === ".") {
            decimal = true;
            index++;
            while (isDigit(value[index] ?? "")) {
                index++;
            }
        }
        if (index === value.length) {
            return "incomplete";
        }
        const symbol = value[index] ?? "";
        if ((symbol === "′" || symbol === "'") && !decimal && numbers === 0) {
            index++;
            numbers = 1;
            continue;
        }
        if (symbol === "″" || symbol === '"') {
            index++;
            numbers = 2;
            break;
        }
        return "bad";
    }
    if (mode === "suffix") {
        if (index === value.length) {
            return "incomplete";
        }
        if (!"NSEW".includes(value[index] ?? "")) {
            return "bad";
        }
        index++;
    }
    return index === value.length ? "ok" : "bad";
}

function checkDegree(text: string, unit: string): AngleCheck {
    if (unit === catalogue.degreeUnit) {
        return scanNumber(text);
    }
    if (unit === "urn:ogc:def:uom:EPSG::9110") {
        return scanSexagesimal(text);
    }
    if (unit === "urn:ogc:def:uom:EPSG::9116") {
        return scanDegreeHemisphere(text);
    }
    if (unit === "urn:ogc:def:uom:EPSG::9117") {
        return scanHemisphereDegree(text);
    }
    if (unit === "urn:ogc:def:uom:EPSG::9107") {
        return scanDms(text, "signed");
    }
    if (unit === "urn:ogc:def:uom:EPSG::9108") {
        return scanDms(text, "suffix");
    }
    if (unit === "urn:ogc:def:uom:EPSG::9120") {
        return scanDms(text, "prefix");
    }
    return "bad";
}

function axisProblem(axis: AxisInfo, raw: string, strict: boolean): string | null {
    const text = raw.trim();
    if (text === "") {
        return null;
    }
    const unit = inputUnit(axis);
    const state = axis.unit === catalogue.degreeUnit ? checkDegree(text, unit) : scanNumber(text);
    if (state === "ok" || (state === "incomplete" && !strict)) {
        return null;
    }
    const title = axisTitle(axis.name);
    const help = axis.unit === catalogue.degreeUnit ? DEGREE_HELP[unit] : undefined;
    if (help) {
        return `${title}: ${help}`;
    }
    return `Enter a number for ${title}.`;
}

interface SexagesimalParts {
    negative: boolean;
    degrees: number;
    minutes: number;
    seconds: number;
    fraction: number;
}

function sexagesimalParts(angle: number): SexagesimalParts {
    let negative = angle < 0;
    const scaled = Math.round(Math.abs(angle) * 36000000);
    if (scaled === 0) {
        negative = false;
    }
    const fraction = scaled % 10000;
    const wholeSeconds = Math.floor(scaled / 10000);
    const seconds = wholeSeconds % 60;
    const minutesTotal = Math.floor(wholeSeconds / 60);
    return {
        negative,
        degrees: Math.floor(minutesTotal / 60),
        minutes: minutesTotal % 60,
        seconds,
        fraction,
    };
}

function formatDecimal(value: number): string {
    let text = value.toFixed(8);
    if (text.includes(".")) {
        text = text.replace(/0+$/, "").replace(/\.$/, "");
    }
    return text === "-0" ? "0" : text;
}

function formatDegree(angle: number, unit: string, latitude: boolean): string {
    const decimal = formatDecimal(Math.abs(angle));
    const negativeDecimal = angle < 0 && decimal !== "0";
    const letter = latitude ? (negativeDecimal ? "S" : "N") : (negativeDecimal ? "W" : "E");
    if (unit === catalogue.degreeUnit) {
        return formatDecimal(angle);
    }
    if (unit === "urn:ogc:def:uom:EPSG::9116") {
        return `${decimal}°${letter}`;
    }
    if (unit === "urn:ogc:def:uom:EPSG::9117") {
        return `${letter}${decimal}°`;
    }
    const parts = sexagesimalParts(angle);
    const sign = parts.negative ? "-" : "";
    const dmsLetter = parts.negative ? (latitude ? "S" : "W") : (latitude ? "N" : "E");
    const body = `${parts.degrees}°${parts.minutes}′${parts.seconds}.${String(parts.fraction).padStart(4, "0")}″`;
    if (unit === "urn:ogc:def:uom:EPSG::9107") {
        return `${sign}${body}`;
    }
    if (unit === "urn:ogc:def:uom:EPSG::9108") {
        return `${body}${dmsLetter}`;
    }
    if (unit === "urn:ogc:def:uom:EPSG::9120") {
        return `${dmsLetter}${body}`;
    }
    if (unit === "urn:ogc:def:uom:EPSG::9110") {
        const minutes = String(parts.minutes).padStart(2, "0");
        const seconds = String(parts.seconds).padStart(2, "0");
        const fraction = String(parts.fraction).padStart(4, "0");
        return `${sign}${parts.degrees}.${minutes}${seconds}${fraction}`;
    }
    return formatDecimal(angle);
}

function degreesFromGroups(groups: { [key: string]: string }): number {
    let degrees = Number(groups.degrees ?? "0");
    degrees += Number(groups.arcminutes ?? "0") / 60;
    const fractionMinutes = groups.fractionarcminutes;
    if (fractionMinutes) {
        degrees += Number(fractionMinutes) / 60 / 10 ** fractionMinutes.length;
    }
    degrees += Number(groups.arcseconds ?? "0") / 3600;
    const fractionSeconds = groups.fractionarcseconds;
    if (fractionSeconds) {
        degrees += Number(fractionSeconds) / 3600 / 10 ** fractionSeconds.length;
    }
    const hemisphere = groups.hemisphere ?? "";
    if (groups.negative || hemisphere === "S" || hemisphere === "W") {
        degrees *= -1;
    }
    return degrees;
}

function parseSexagesimal(angle: string): number | null {
    let text = angle.replace(/ /g, "");
    const dot = text.indexOf(".");
    if (dot >= 0) {
        if (text.length < dot + 5) {
            text += "0".repeat(dot + 5 - text.length);
        }
    } else {
        text += ".0000";
    }
    const found = /^(?<negative>[−-])?(?<degrees>\d+)\.(?<arcminutes>\d{2})(?<arcseconds>\d{2})(?<fractionarcseconds>\d+)?$/u.exec(text);
    if (!found?.groups) {
        return null;
    }
    return degreesFromGroups(found.groups);
}

function parseDegree(text: string, unit: string): number | null {
    const compact = text.trim().replace(/ /g, "");
    if (compact === "" || checkDegree(compact, unit) !== "ok") {
        return null;
    }
    if (unit === catalogue.degreeUnit) {
        const value = Number(compact.replace(/−/g, "-"));
        return Number.isFinite(value) ? value : null;
    }
    if (unit === "urn:ogc:def:uom:EPSG::9110") {
        return parseSexagesimal(compact);
    }
    const patterns: Record<string, RegExp> = {
        "urn:ogc:def:uom:EPSG::9116": /^(?<degrees>\d+\.?\d*)[°º]?(?<hemisphere>[NSEW])$/u,
        "urn:ogc:def:uom:EPSG::9117": /^(?<hemisphere>[NSEW])(?<degrees>\d+\.?\d*)[°º]?$/u,
        "urn:ogc:def:uom:EPSG::9107": /^(?<negative>[−-])?(?<degrees>\d+)[°º]?(?:(?<arcminutes>\d+)[′'])?(?:(?<arcseconds>\d+\.?\d*)[″"])?$/u,
        "urn:ogc:def:uom:EPSG::9108": /^(?<degrees>\d+)[°º]?(?:(?<arcminutes>\d+)[′'])?(?:(?<arcseconds>\d+\.?\d*)[″"])?(?<hemisphere>[NSEW])$/u,
        "urn:ogc:def:uom:EPSG::9120": /^(?<hemisphere>[NSEW])(?<degrees>\d+)[°º]?(?:(?<arcminutes>\d+)[′'])?(?:(?<arcseconds>\d+\.?\d*)[″"])?$/u,
    };
    const pattern = patterns[unit];
    const found = pattern?.exec(compact);
    if (!found?.groups) {
        return null;
    }
    return degreesFromGroups(found.groups);
}

function convertDegreeText(text: string, from: string, to: string, latitude: boolean): string | null {
    if (text.trim() === "") {
        return null;
    }
    const parsed = parseDegree(text, from);
    if (parsed === null) {
        return null;
    }
    return formatDegree(parsed, to, latitude);
}

function placeholderFor(axis: AxisInfo): string {
    const sample = axis.sample;
    if (!sample) {
        return "";
    }
    if (axis.unit !== catalogue.degreeUnit) {
        return sample;
    }
    const unit = inputUnit(axis);
    if (unit === catalogue.degreeUnit) {
        return sample;
    }
    const value = Number(sample);
    if (!Number.isFinite(value)) {
        return sample;
    }
    return formatDegree(value, unit, axis.name === "Geodetic latitude");
}

const GRID_LETTERS = "VWXYZQRSTULMNOPFGHJKABCDE";

interface UtmZone {
    zone: number | null;
    hemisphere: "N" | "S";
    prefixed: boolean;
}

type NotationKind = "british" | "irish" | "utm" | "usng";

function utmZoneFromName(name: string): UtmZone | null {
    const zone = /UTM zone (\d{1,2})([NS])\b/i.exec(name) ?? /TMzn(\d{1,2})([NS])\b/.exec(name);
    if (zone?.[1] && zone[2]) {
        return {
            zone: Number(zone[1]),
            hemisphere: zone[2].toUpperCase() === "S" ? "S" : "N",
            prefixed: name.includes("zE"),
        };
    }
    const grid = /UTM grid system \((northern|southern) hemisphere\)/i.exec(name);
    if (grid?.[1]) {
        return {
            zone: null,
            hemisphere: grid[1].toLowerCase() === "southern" ? "S" : "N",
            prefixed: true,
        };
    }
    return null;
}

function notationKind(crs: CrsRecord): NotationKind | null {
    if (crs.srid === "urn:ogc:def:crs:EPSG::27700" || crs.name.includes("British National Grid")) {
        return "british";
    }
    // TM65 / Irish Grid shares the name and does not accept a grid reference.
    if (crs.srid === "urn:ogc:def:crs:EPSG::29903") {
        return "irish";
    }
    if (utmZoneFromName(crs.name)) {
        return "utm";
    }
    // The catalogue flag is the North American datum. Whether a particular
    // latitude and longitude has a US National Grid reference is decided by
    // the library output, not here.
    if (crs.usng) {
        return "usng";
    }
    return null;
}

function scanGridReference(text: string, letters: number): AngleCheck {
    const compact = text.toUpperCase().replace(/ /g, "");
    if (compact === "") {
        return "incomplete";
    }
    let index = 0;
    while (index < compact.length && GRID_LETTERS.includes(compact[index] ?? "")) {
        index++;
    }
    const digits = compact.slice(index);
    if (!/^\d*$/.test(digits) || index > letters || digits.length > 10) {
        return "bad";
    }
    if (index < letters) {
        return digits.length === 0 ? "incomplete" : "bad";
    }
    if (digits.length % 2 === 0) {
        return "ok";
    }
    return digits.length < 10 ? "incomplete" : "bad";
}

function scanUtm(text: string, expected: UtmZone | null): AngleCheck {
    const value = text.trim().toUpperCase().replace(/−/g, "-");
    if (value === "") {
        return "incomplete";
    }
    if (!/^[0-9NS+\-.\s]+$/.test(value) || !expected) {
        return "bad";
    }
    const complete = /^(\d{1,2})\s*([NS])\s+([+-]?(?:\d+\.?\d*|\.\d+))\s+([+-]?(?:\d+\.?\d*|\.\d+))$/.exec(value);
    if (complete?.[1] && complete[2] && complete[3] && complete[4]) {
        const zone = Number(complete[1]);
        if (complete[1].startsWith("0") || zone < 1 || zone > 60) {
            return "bad";
        }
        if (complete[2] !== expected.hemisphere || (expected.zone !== null && zone !== expected.zone)) {
            return "bad";
        }
        return "ok";
    }
    const partial = /^(\d{0,2})\s*([NS])?\s*([+-]?(?:\d*\.?\d*)?)?\s*([+-]?(?:\d*\.?\d*)?)?\s*$/.exec(value);
    const digits = partial?.[1] ?? "";
    if (!partial || digits === "" || digits.startsWith("0")) {
        return "bad";
    }
    if (expected.zone !== null && !String(expected.zone).startsWith(digits)) {
        return "bad";
    }
    if (digits.length === 2 && (Number(digits) < 1 || Number(digits) > 60)) {
        return "bad";
    }
    if (partial[2] && partial[2] !== expected.hemisphere) {
        return "bad";
    }
    return "incomplete";
}

function notationHelp(crs: CrsRecord): string {
    const kind = notationKind(crs);
    if (kind === "british") {
        return "Two letters and an even number of digits, such as TQ 30017 80419. Stays in step with easting and northing.";
    }
    if (kind === "irish") {
        return "One letter and an even number of digits, such as O 15904 34671. Stays in step with easting and northing.";
    }
    if (kind === "usng") {
        return "Zone, band, square and an even number of digits, such as 18S UJ 2348 0647. Stays in step with latitude and longitude.";
    }
    const zone = utmZoneFromName(crs.name);
    const example = zone?.zone === null || zone?.zone === undefined
        ? `33${zone?.hemisphere ?? "N"} 291789 5034599`
        : `${zone.zone}${zone.hemisphere} 291789 5034599`;
    return `Zone, hemisphere, easting and northing, such as ${example}. Stays in step with easting and northing.`;
}

function notationProblem(crs: CrsRecord, raw: string, strict: boolean): string | null {
    const kind = notationKind(crs);
    if (!kind) {
        return null;
    }
    const text = raw.trim();
    if (text === "") {
        return null;
    }
    // A US National Grid reference is checked by the library. The area decision
    // is whether that call returns a reference.
    if (kind === "usng") {
        return null;
    }
    const state = kind === "utm"
        ? scanUtm(text, utmZoneFromName(crs.name))
        : scanGridReference(text, kind === "british" ? 2 : 1);
    if (state === "ok" || (state === "incomplete" && !strict)) {
        return null;
    }
    if (kind === "utm") {
        const zone = utmZoneFromName(crs.name);
        const started = /^(\d{1,2})\s*([NS])/i.exec(text.toUpperCase());
        if (zone && started?.[1] && started[2]) {
            const parsedZone = Number(started[1]);
            const hemisphere = started[2].toUpperCase();
            if ((zone.zone !== null && parsedZone !== zone.zone) || hemisphere !== zone.hemisphere) {
                if (zone.zone === null) {
                    const side = zone.hemisphere === "N" ? "northern" : "southern";
                    return `This CRS is the ${side} hemisphere UTM grid system.`;
                }
                return `This CRS is UTM zone ${zone.zone}${zone.hemisphere}.`;
            }
        }
    }
    return notationHelp(crs);
}

function axisSample(crs: CrsRecord, name: string): number | null {
    const axis = crs.axes.find((item) => item.name === name);
    if (!axis?.sample) {
        return null;
    }
    const value = Number(axis.sample);
    return Number.isFinite(value) ? value : null;
}

function plainNumber(value: number): string {
    const text = String(value);
    if (!/e/i.test(text)) {
        return text;
    }
    return value.toFixed(3).replace(/0+$/, "").replace(/\.$/, "");
}

function gridDigits(value: number, width: number): string | null {
    if (!Number.isFinite(value) || value < 0) {
        return null;
    }
    return String(Math.trunc(value)).padStart(width, "0");
}

function britishReference(easting: number, northing: number): string | null {
    const half = 5;
    const east = gridDigits(easting, half + 1);
    const north = gridDigits(northing, half + 1);
    if (!east || !north || east.length !== half + 1 || north.length !== half + 1) {
        return null;
    }
    const majorIndex = (5 * Math.floor((northing + 500000) / 500000)) + Math.floor((easting + 1000000) / 500000);
    const minorIndex = (5 * (Number(north[0]) % 5)) + (Number(east[0]) % 5);
    const major = GRID_LETTERS[majorIndex];
    const minor = GRID_LETTERS[minorIndex];
    if (!major || !minor) {
        return null;
    }
    return `${major}${minor} ${east.slice(1, 1 + half)} ${north.slice(1, 1 + half)}`;
}

function irishReference(easting: number, northing: number): string | null {
    const half = 5;
    const east = gridDigits(easting, half + 1);
    const north = gridDigits(northing, half + 1);
    if (!east || !north || east.length !== half + 1 || north.length !== half + 1) {
        return null;
    }
    const letter = GRID_LETTERS[(5 * (Number(north[0]) % 5)) + (Number(east[0]) % 5)];
    if (!letter) {
        return null;
    }
    return `${letter} ${east.slice(1, 1 + half)} ${north.slice(1, 1 + half)}`;
}

// Live sync mirrors BritishNationalGridPoint and IrishGridPoint. Grid figures
// are truncated whole metres, the same as the library's (int) cast. The field
// being typed is left as entered.

function lengthAxesInMetres(crs: CrsRecord): boolean {
    const east = crs.axes.find((axis) => axis.name === "Easting");
    const north = crs.axes.find((axis) => axis.name === "Northing");
    return east?.unit === METRE_UNIT && north?.unit === METRE_UNIT;
}

function typedMetres(text: string): string | null {
    if (scanNumber(text) !== "ok") {
        return null;
    }
    const value = text.trim().replace(/−/g, "-");
    return value.startsWith("+") ? value.slice(1) : value;
}

function referenceFromAxes(crs: CrsRecord, eastText: string, northText: string): string | null {
    const east = typedMetres(eastText);
    const north = typedMetres(northText);
    if (east === null || north === null) {
        return null;
    }
    const kind = notationKind(crs);
    if (kind === "british") {
        return britishReference(Number(east), Number(north));
    }
    if (kind === "irish") {
        return irishReference(Number(east), Number(north));
    }
    return utmReferenceFromNumbers(crs, east, north);
}

function gridMetres(text: string, letters: number): { easting: string; northing: string } | null {
    if (scanGridReference(text, letters) !== "ok") {
        return null;
    }
    const compact = text.toUpperCase().replace(/ /g, "");
    const half = (compact.length - letters) / 2;
    const gridSize = 10 ** (5 - half);
    const numeric = compact.slice(letters);
    const eastDigits = Number(numeric.slice(0, half) || "0");
    const northDigits = Number(numeric.slice(half) || "0");
    let easting: number;
    let northing: number;
    if (letters === 2) {
        const major = GRID_LETTERS.indexOf(compact[0] ?? "");
        const minor = GRID_LETTERS.indexOf(compact[1] ?? "");
        if (major < 0 || minor < 0) {
            return null;
        }
        easting = (major % 5) * 500000 - 1000000 + (minor % 5) * 100000 + eastDigits * gridSize;
        northing = Math.floor(major / 5) * 500000 - 500000 + Math.floor(minor / 5) * 100000 + northDigits * gridSize;
    } else {
        const index = GRID_LETTERS.indexOf(compact[0] ?? "");
        if (index < 0) {
            return null;
        }
        easting = (index % 5) * 100000 + eastDigits * gridSize;
        northing = Math.floor(index / 5) * 100000 + northDigits * gridSize;
    }
    if (!Number.isSafeInteger(easting) || !Number.isSafeInteger(northing)) {
        return null;
    }
    return { easting: String(easting), northing: String(northing) };
}

function addZonePrefix(local: string, zone: number): string {
    const text = local.startsWith("+") ? local.slice(1) : local;
    if (/^\d+$/.test(text)) {
        return String(zone * 1000000 + Number(text));
    }
    const decimal = /^(\d+)\.(\d+)$/.exec(text);
    if (decimal?.[1] && decimal[2]) {
        return `${zone * 1000000 + Number(decimal[1])}.${decimal[2]}`;
    }
    if (/^\.\d+$/.test(text)) {
        return `${zone * 1000000}${text}`;
    }
    return plainNumber(zone * 1000000 + Number(text));
}

function stripZonePrefix(typed: string, zoneNumber: number): string | null {
    if (/^\d+$/.test(typed)) {
        const local = Number(typed) - zoneNumber * 1000000;
        return Number.isSafeInteger(local) ? String(local) : null;
    }
    const decimal = /^(\d+)\.(\d+)$/.exec(typed);
    if (decimal?.[1] && decimal[2]) {
        const local = Number(decimal[1]) - zoneNumber * 1000000;
        if (!Number.isSafeInteger(local)) {
            return null;
        }
        return `${local}.${decimal[2]}`;
    }
    const local = Number(typed) - zoneNumber * 1000000;
    return Number.isFinite(local) ? plainNumber(local) : null;
}

function utmReferenceFromNumbers(crs: CrsRecord, east: string, north: string): string | null {
    const zoneInfo = utmZoneFromName(crs.name);
    if (!zoneInfo) {
        return null;
    }
    const easting = Number(east);
    const northing = Number(north);
    if (!Number.isFinite(easting) || !Number.isFinite(northing)) {
        return null;
    }
    let zoneNumber = zoneInfo.zone;
    let local = east;
    if (zoneInfo.prefixed) {
        zoneNumber = Math.floor(easting / 1000000);
        if (!Number.isInteger(zoneNumber)) {
            return null;
        }
        local = stripZonePrefix(east, zoneNumber) ?? "";
        if (local === "") {
            return null;
        }
    }
    if (zoneNumber === null || zoneNumber < 1 || zoneNumber > 60) {
        return null;
    }
    if (zoneInfo.zone !== null && zoneNumber !== zoneInfo.zone) {
        return null;
    }
    return `${zoneNumber}${zoneInfo.hemisphere} ${local} ${north}`;
}

function utmMetres(crs: CrsRecord, text: string): { easting: string; northing: string } | null {
    const zoneInfo = utmZoneFromName(crs.name);
    if (!zoneInfo || scanUtm(text, zoneInfo) !== "ok") {
        return null;
    }
    const match = /^(\d{1,2})\s*([NS])\s+([+-]?(?:\d+\.?\d*|\.\d+))\s+([+-]?(?:\d+\.?\d*|\.\d+))$/.exec(text.trim().toUpperCase().replace(/−/g, "-"));
    if (!match?.[1] || !match[3] || !match[4]) {
        return null;
    }
    const zone = Number(match[1]);
    const easting = zoneInfo.prefixed ? addZonePrefix(match[3], zone) : (match[3].startsWith("+") ? match[3].slice(1) : match[3]);
    const northing = match[4].startsWith("+") ? match[4].slice(1) : match[4];
    return { easting, northing };
}

function metresFromNotation(crs: CrsRecord, text: string): { easting: string; northing: string } | null {
    const kind = notationKind(crs);
    if (kind === "british") {
        return gridMetres(text, 2);
    }
    if (kind === "irish") {
        return gridMetres(text, 1);
    }
    if (kind === "utm") {
        return utmMetres(crs, text);
    }
    return null;
}

function sameQuantity(typed: string, derived: string): boolean {
    const left = typed.trim().replace(/−/g, "-");
    const right = derived.trim();
    if (left === right || (left.startsWith("+") && left.slice(1) === right)) {
        return true;
    }
    return scanNumber(left) === "ok" && Number(left) === Number(right);
}

function notationAgrees(crs: CrsRecord, notation: string, eastRaw: string, northRaw: string): boolean {
    const parsed = metresFromNotation(crs, notation);
    if (!parsed) {
        return false;
    }
    return sameQuantity(eastRaw, parsed.easting) && sameQuantity(northRaw, parsed.northing);
}

function notationPlaceholder(crs: CrsRecord): string {
    const kind = notationKind(crs);
    const east = axisSample(crs, "Easting");
    const north = axisSample(crs, "Northing");
    if (kind === "british") {
        return east === null || north === null ? "TQ 30017 80419" : britishReference(east, north) ?? "TQ 30017 80419";
    }
    if (kind === "irish") {
        return east === null || north === null ? "O 15904 34671" : irishReference(east, north) ?? "O 15904 34671";
    }
    if (kind === "usng") {
        return "18S UJ 2348 0647";
    }
    const zone = utmZoneFromName(crs.name);
    if (!zone) {
        return "33N 291789 5034599";
    }
    if (east !== null && north !== null) {
        let zoneNumber = zone.zone;
        let localEast = east;
        if (zone.prefixed) {
            zoneNumber = Math.trunc(east / 1000000);
            localEast = east - zoneNumber * 1000000;
        }
        if (zoneNumber !== null && zoneNumber >= 1 && zoneNumber <= 60) {
            return `${zoneNumber}${zone.hemisphere} ${plainNumber(localEast)} ${plainNumber(north)}`;
        }
    }
    if (zone.zone !== null) {
        return `${zone.zone}${zone.hemisphere} 500000 5000000`;
    }
    return `33${zone.hemisphere} 500000 5000000`;
}

let notationText = "";
let usngError = "";
let usngTimer = 0;
let usngGeneration = 0;
let usngBlock: HTMLDivElement | null = null;
let usngField: HTMLInputElement | null = null;
let usngIssue: HTMLParagraphElement | null = null;

function notationIsValid(crs: CrsRecord): boolean {
    return notationKind(crs) !== null && notationText.trim() !== "" && notationProblem(crs, notationText, true) === null;
}

interface Picker {
    setCrs: (srid: string) => void;
    getCrs: () => CrsRecord | null;
    clear: () => void;
}

const root = document.querySelector<HTMLElement>("#playground");
if (!root) {
    throw new Error("Demo page is missing #playground");
}

const mountPicker = (labelText: string, onSelect: () => void): Picker => {
    const label = document.createElement("label");
    label.textContent = labelText;
    const field = document.createElement("div");
    field.className = "crs-field";
    const input = document.createElement("input");
    input.type = "text";
    input.autocomplete = "off";
    input.spellcheck = false;
    input.placeholder = "Filter by name or EPSG code";
    input.setAttribute("role", "combobox");
    input.setAttribute("aria-autocomplete", "list");
    input.setAttribute("aria-expanded", "false");
    const listId = `crs-list-${labelText.toLowerCase().replace(/\s+/g, "-")}`;
    input.setAttribute("aria-controls", listId);
    const list = document.createElement("ul");
    list.id = listId;
    list.className = "crs-matches";
    list.hidden = true;
    list.setAttribute("role", "listbox");
    label.append(input);
    field.append(label, list);

    let selected: CrsRecord | null = null;
    let highlighted = -1;
    let matches: CrsRecord[] = [];
    let optionBySrid: Map<string, { item: HTMLLIElement; button: HTMLButtonElement }> | null = null;

    function closeList(): void {
        list.hidden = true;
        input.setAttribute("aria-expanded", "false");
        highlighted = -1;
    }

    function choose(crs: CrsRecord): void {
        selected = crs;
        input.value = crsLabel(crs);
        closeList();
        onSelect();
    }

    function ensureOptions(): Map<string, { item: HTMLLIElement; button: HTMLButtonElement }> {
        if (optionBySrid) {
            return optionBySrid;
        }
        const built = new Map<string, { item: HTMLLIElement; button: HTMLButtonElement }>();
        const fragment = document.createDocumentFragment();
        for (const crs of catalogue.crs) {
            const item = document.createElement("li");
            item.setAttribute("role", "presentation");
            const button = document.createElement("button");
            button.type = "button";
            button.setAttribute("role", "option");
            button.textContent = `${crsLabel(crs)} · ${KIND_LABEL[crs.kind] ?? crs.kind}`;
            button.addEventListener("mousedown", (event) => {
                event.preventDefault();
                choose(crs);
            });
            item.append(button);
            fragment.append(item);
            built.set(crs.srid, { item, button });
        }
        list.append(fragment);
        optionBySrid = built;
        return built;
    }

    function matchesForInput(): CrsRecord[] {
        if (input.value.trim() === "" || (selected !== null && input.value === crsLabel(selected))) {
            return catalogue.crs;
        }
        return searchCrs(input.value);
    }

    function renderMatches(found: CrsRecord[]): void {
        const options = ensureOptions();
        matches = found;
        highlighted = found.length > 0 ? 0 : -1;
        if (found.length === 0) {
            for (const option of options.values()) {
                option.item.hidden = true;
                option.button.setAttribute("aria-selected", "false");
            }
            closeList();
            return;
        }
        const visible = new Set(found.map((crs) => crs.srid));
        const fragment = document.createDocumentFragment();
        found.forEach((crs, index) => {
            const option = options.get(crs.srid);
            if (!option) {
                return;
            }
            option.item.hidden = false;
            option.button.setAttribute("aria-selected", index === highlighted ? "true" : "false");
            fragment.append(option.item);
        });
        for (const [srid, option] of options) {
            if (visible.has(srid)) {
                continue;
            }
            option.item.hidden = true;
            option.button.setAttribute("aria-selected", "false");
            fragment.append(option.item);
        }
        list.append(fragment);
        list.hidden = false;
        list.scrollTop = 0;
        input.setAttribute("aria-expanded", "true");
    }

    function moveHighlight(step: number): void {
        if (matches.length === 0 || !optionBySrid) {
            return;
        }
        const previous = matches[highlighted];
        if (previous) {
            optionBySrid.get(previous.srid)?.button.setAttribute("aria-selected", "false");
        }
        highlighted = (highlighted + step + matches.length) % matches.length;
        const next = matches[highlighted];
        const button = next ? optionBySrid.get(next.srid)?.button : undefined;
        if (button) {
            button.setAttribute("aria-selected", "true");
            button.scrollIntoView({ block: "nearest" });
        }
    }

    input.addEventListener("input", () => {
        if (selected && input.value !== crsLabel(selected)) {
            selected = null;
            onSelect();
        }
        renderMatches(matchesForInput());
    });
    input.addEventListener("focus", () => {
        if (selected && input.value === crsLabel(selected)) {
            input.select();
        }
        renderMatches(matchesForInput());
    });
    input.addEventListener("keydown", (event) => {
        if (event.key === "ArrowDown") {
            event.preventDefault();
            if (list.hidden) {
                renderMatches(matchesForInput());
            } else {
                moveHighlight(1);
            }
        } else if (event.key === "ArrowUp") {
            event.preventDefault();
            moveHighlight(-1);
        } else if (event.key === "Enter" && !list.hidden && highlighted >= 0) {
            event.preventDefault();
            const crs = matches[highlighted];
            if (crs) {
                choose(crs);
            }
        } else if (event.key === "Escape") {
            closeList();
        }
    });
    input.addEventListener("blur", () => {
        closeList();
    });

    root.append(field);

    return {
        setCrs(srid: string) {
            const crs = bySrid.get(srid);
            if (!crs) {
                throw new Error(`Unknown CRS ${srid}`);
            }
            choose(crs);
        },
        getCrs() {
            return selected;
        },
        clear() {
            selected = null;
            input.value = "";
            closeList();
            onSelect();
        },
    };
};

const style = document.createElement("style");
style.textContent = `
#playground .crs-field { position: relative; max-width: 42rem; margin-bottom: 0.8rem; }
#playground label { display: block; font-weight: 700; }
#playground [hidden] { display: none; }
#playground input[type="text"], #playground input[type="date"], #playground select {
  width: 100%; box-sizing: border-box; margin-top: 0.2rem;
}
#playground .crs-matches {
  position: absolute; z-index: 20; left: 0; right: 0; margin: 0; padding: 0;
  list-style: none; background: #fff; border: 1px solid #c6cbd1; max-height: 16rem; overflow: auto;
}
#playground .crs-matches button {
  display: block; width: 100%; text-align: left; background: #fff; border: 0; padding: 0.35rem 0.55rem; font-weight: 400;
}
#playground .crs-matches button[aria-selected="true"] { background: #e6f1f8; }
#playground .axis { margin: 0.7rem 0; max-width: 42rem; }
#playground .axis-row { display: flex; gap: 0.5rem; align-items: end; }
#playground .axis-row input { flex: 1 1 auto; }
#playground .axis-row select { flex: 0 1 16rem; }
#playground .unit-suffix { margin-top: 0.45rem; white-space: nowrap; }
#playground .hint { margin: 0.25rem 0 0; color: #4a4a4a; font-size: 0.9rem; }
#playground .axis .error { margin: 0.25rem 0 0; }
#playground .options { margin: 1rem 0; max-width: 42rem; }
#playground .swap { margin: 0 0 0.8rem; }
#playground .swap button {
  width: 2.4rem; height: 2.4rem; padding: 0.35rem; line-height: 0;
}
#playground .swap svg { width: 100%; height: 100%; display: block; }
#playground .reading { margin: 0.12rem 0; }
#playground .accuracy { margin: 0.8rem 0 0; }
#playground .accuracy p { margin: 0.2rem 0; }
#playground .examples { display: flex; flex-wrap: wrap; gap: 0.5rem; margin: 0 0 1rem; }
#playground .actions { display: flex; gap: 0.6rem; align-items: center; margin: 1rem 0; }
#playground .error { color: #a40000; }
#playground .result dt { font-weight: 700; margin-top: 0.45rem; }
#playground .result dd { margin-left: 0; }
#playground .result-layout { display: flex; flex-wrap: wrap; gap: 0.8rem 1.4rem; align-items: start; }
#playground .result-main { flex: 1 1 16rem; min-width: 0; }
#playground .grid-fallback {
  flex: 1 1 16rem; max-width: 24rem; margin: 0.2rem 0 0; padding: 0.65rem 0.8rem;
  background: #fff6db; border: 1px solid #e0c36a; border-left: 4px solid #8a6d1d;
}
#playground .grid-fallback p { margin: 0.25rem 0; }
#playground .route { padding-left: 1.2rem; }
#playground .route li { margin: 0.35rem 0; }
#playground .datapacks { margin: 1rem 0; max-width: 42rem; border: 1px solid #c6cbd1; padding: 0.6rem 0.9rem 0.8rem; }
#playground .datapacks legend { font-weight: 700; padding: 0 0.3rem; }
#playground .datapack-grid { display: flex; flex-wrap: wrap; gap: 0.35rem 1.1rem; margin-top: 0.35rem; }
#playground .datapack-grid label { display: flex; align-items: center; gap: 0.35rem; font-weight: 400; margin: 0; }
#playground .datapack-grid input { margin: 0; }
`;
root.append(style);

const status = document.createElement("p");
status.className = "hint";
status.textContent = "Loading PHPCoord…";
root.append(status);

const exampleRow = document.createElement("div");
exampleRow.className = "examples";
exampleRow.setAttribute("role", "group");
exampleRow.setAttribute("aria-label", "Examples");
for (const example of EXAMPLES) {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = example.title;
    button.addEventListener("click", () => {
        loadExample(example);
    });
    exampleRow.append(button);
}
root.append(exampleRow);

let previousSource = "";
const sourcePicker = mountPicker("From", () => {
    const next = sourcePicker.getCrs()?.srid ?? "";
    if (next !== previousSource) {
        previousSource = next;
        notationText = "";
        usngError = "";
    }
    renderAxes();
});
const swapRow = document.createElement("div");
swapRow.className = "swap";
const swapButton = document.createElement("button");
swapButton.type = "button";
swapButton.setAttribute("aria-label", "Swap input and output");
swapButton.title = "Swap input and output";
swapButton.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M16 17.01V10h-2v7.01h-3L15 21l4-3.99h-3zM9 3L5 6.99h3V14h2V6.99h3L9 3z"/></svg>';
swapRow.append(swapButton);
root.append(swapRow);
const targetPicker = mountPicker("To", () => presentEpoch());

const axesHost = document.createElement("div");
root.append(axesHost);

const options = document.createElement("div");
options.className = "options";
const epochLabel = document.createElement("label");
const epochLabelText = document.createElement("span");
epochLabelText.textContent = "Coordinate epoch";
const epochInput = document.createElement("input");
epochInput.type = "date";
epochLabel.append(epochLabelText, epochInput);
const targetEpochLabel = document.createElement("label");
targetEpochLabel.textContent = "Target epoch";
const targetEpochInput = document.createElement("input");
targetEpochInput.type = "date";
targetEpochLabel.append(targetEpochInput);
const boundaryLabel = document.createElement("label");
const boundaryInput = document.createElement("input");
boundaryInput.type = "checkbox";
boundaryLabel.append(boundaryInput, " Ignore boundary restrictions");
const optionsHint = document.createElement("p");
optionsHint.className = "hint";
const boundaryHint = "Ignoring boundaries keeps a conversion that sits just outside a CRS extent.";
const inputEpochHint = `The coordinate epoch is the date these coordinates represent. A target epoch asks for the same point on another date. ${boundaryHint}`;
const outputEpochHint = `A projected or static CRS has no epoch of its own. This date is the epoch of the output coordinates. ${boundaryHint}`;
optionsHint.textContent = inputEpochHint;
options.append(epochLabel, targetEpochLabel, boundaryLabel, optionsHint);
root.append(options);

const datapacks = document.createElement("fieldset");
datapacks.className = "datapacks";
const datapackLegend = document.createElement("legend");
datapackLegend.textContent = "Regional datapacks";
const datapackGrid = document.createElement("div");
datapackGrid.className = "datapack-grid";
const storedPacks = new Set(readStoredPacks());
for (const pack of DATAPACKS) {
    const label = document.createElement("label");
    const input = document.createElement("input");
    input.type = "checkbox";
    input.autocomplete = "off";
    input.checked = storedPacks.has(pack.id);
    input.addEventListener("change", () => {
        if (!acceptPackChanges) {
            return;
        }
        rememberPacks();
        startBoot();
    });
    label.append(input, pack.label);
    packInputs.set(pack.id, input);
    datapackGrid.append(label);
}
const datapackHint = document.createElement("p");
datapackHint.className = "hint";
datapackHint.textContent = "When enabled, additional data will be downloaded during conversion which may take a few seconds.";
datapacks.append(datapackLegend, datapackGrid, datapackHint);
root.append(datapacks);

function readStoredPacks(): string[] {
    try {
        const raw = localStorage.getItem(DATAPACK_STORAGE_KEY);
        if (!raw) {
            return [];
        }
        const parsed: unknown = JSON.parse(raw);
        if (!Array.isArray(parsed) || !parsed.every((item) => typeof item === "string")) {
            return [];
        }
        return normalizePacks(parsed);
    } catch {
        return [];
    }
}

function rememberPacks(): void {
    try {
        localStorage.setItem(DATAPACK_STORAGE_KEY, JSON.stringify(selectedPacks()));
    } catch {
        // Private browsing can refuse storage. The selection still applies now.
    }
}

let acceptPackChanges = false;

function applyStoredPacks(allowChanges: boolean): void {
    const stored = new Set(readStoredPacks());
    let changed = false;
    for (const pack of DATAPACKS) {
        const input = packInputs.get(pack.id);
        if (!input) {
            continue;
        }
        const want = stored.has(pack.id);
        if (input.checked !== want) {
            input.checked = want;
            changed = true;
        }
    }
    if (allowChanges) {
        acceptPackChanges = true;
    }
    if (changed && boot !== null) {
        startBoot();
    }
}

// A reload can restore the tick after the saved choice is applied. Put the saved choice back.
window.addEventListener("pageshow", () => applyStoredPacks(true));
requestAnimationFrame(() => applyStoredPacks(true));

function setPacksEnabled(enabled: boolean): void {
    for (const input of packInputs.values()) {
        input.disabled = !enabled;
    }
}

function startBoot(): void {
    const generation = ++bootGeneration;
    boot = null;
    status.classList.remove("error");
    status.textContent = "Loading PHPCoord…";
    void ensureBoot()
        .then(() => {
            if (generation === bootGeneration) {
                status.textContent = "Ready.";
            }
        })
        .catch((error: unknown) => {
            if (generation !== bootGeneration) {
                return;
            }
            status.textContent = error instanceof Error ? error.message : String(error);
            status.classList.add("error");
        });
}

const actions = document.createElement("div");
actions.className = "actions";
const convertButton = document.createElement("button");
convertButton.type = "button";
convertButton.textContent = "Convert";
const resetButton = document.createElement("button");
resetButton.type = "button";
resetButton.textContent = "Reset";
actions.append(convertButton, resetButton);
root.append(actions);

const output = document.createElement("div");
output.setAttribute("aria-live", "polite");
root.append(output);

const entered = new Map<string, string>();
const chosenUnits = new Map<string, string>();
let lastResult: ConvertResult | null = null;

function carriesInputEpoch(crs: CrsRecord): boolean {
    return inputEpoch.has(crs.srid);
}

function epochMode(): "input" | "output" | "none" {
    const source = sourcePicker.getCrs();
    if (!source || carriesInputEpoch(source)) {
        return "input";
    }
    const target = targetPicker.getCrs();
    return target !== null && carriesInputEpoch(target) ? "output" : "none";
}

function presentEpoch(): void {
    const mode = epochMode();
    epochLabel.hidden = mode === "none";
    epochLabelText.textContent = mode === "output" ? "Output epoch" : "Coordinate epoch";
    targetEpochLabel.hidden = mode !== "input";
    optionsHint.textContent = mode === "output" ? outputEpochHint : mode === "none" ? boundaryHint : inputEpochHint;
}

function scheduleUsng(fromNotation: boolean): void {
    const source = sourcePicker.getCrs();
    if (!source || notationKind(source) !== "usng") {
        return;
    }
    window.clearTimeout(usngTimer);
    const request = ++usngGeneration;
    usngTimer = window.setTimeout(() => {
        void runUsng(request, fromNotation);
    }, 300);
}

async function runUsng(request: number, fromNotation: boolean): Promise<void> {
    const source = sourcePicker.getCrs();
    if (!source || notationKind(source) !== "usng") {
        return;
    }
    const latitudeAxis = source.axes.find((axis) => axis.name === "Geodetic latitude");
    const longitudeAxis = source.axes.find((axis) => axis.name === "Geodetic longitude");
    if (!latitudeAxis || !longitudeAxis || !usngBlock || !usngField || !usngIssue) {
        return;
    }
    const notation = notationText.trim();
    if (fromNotation && notation === "") {
        if (request !== usngGeneration) {
            return;
        }
        usngError = "";
        writeUsngAxis(latitudeAxis.name, "");
        writeUsngAxis(longitudeAxis.name, "");
        usngIssue.hidden = true;
        usngIssue.textContent = "";
        usngField.setAttribute("aria-invalid", "false");
        usngBlock.hidden = false;
        return;
    }
    const latitude = (entered.get(latitudeAxis.name) ?? "").trim();
    const longitude = (entered.get(longitudeAxis.name) ?? "").trim();
    if (!fromNotation && (latitude === "" || longitude === "")) {
        usngBlock.hidden = false;
        return;
    }
    if (!fromNotation && (axisProblem(latitudeAxis, latitude, true) || axisProblem(longitudeAxis, longitude, true))) {
        return;
    }
    let reading: { notations?: string[]; latitude?: string | null; longitude?: string | null; error?: string | null };
    try {
        await ensureBoot();
        reading = await askWorker({
            problem: {
                probe: "usng",
                source: source.srid,
                target: source.srid,
                values: fromNotation ? {} : {
                    [latitudeAxis.name]: { value: latitude, unit: inputUnit(latitudeAxis) },
                    [longitudeAxis.name]: { value: longitude, unit: inputUnit(longitudeAxis) },
                },
                notation: fromNotation ? notation : null,
                epoch: epochMode() === "input" && epochInput.value !== "" ? epochInput.value : null,
                targetEpoch: null,
                ignoreBoundaryRestrictions: false,
            },
            packs: selectedPacks(),
            volumeBase: volumeBaseUrl(),
        });
    } catch {
        return;
    }
    if (request !== usngGeneration || !usngField || !usngIssue || !usngBlock) {
        return;
    }
    if (fromNotation) {
        if (reading.error) {
            usngError = reading.error;
            usngIssue.hidden = false;
            usngIssue.textContent = reading.error;
            usngField.setAttribute("aria-invalid", "true");
            usngBlock.hidden = false;
            return;
        }
        if (!reading.latitude || !reading.longitude) {
            return;
        }
        usngError = "";
        usngIssue.hidden = true;
        usngIssue.textContent = "";
        usngField.setAttribute("aria-invalid", "false");
        writeUsngAxis(latitudeAxis.name, formatDegree(Number(reading.latitude), inputUnit(latitudeAxis), true));
        writeUsngAxis(longitudeAxis.name, formatDegree(Number(reading.longitude), inputUnit(longitudeAxis), false));
        usngBlock.hidden = false;
        return;
    }
    if (reading.error) {
        return;
    }
    const notations = reading.notations ?? [];
    if (notations.length === 0) {
        usngError = "";
        notationText = "";
        usngField.value = "";
        usngIssue.hidden = true;
        usngIssue.textContent = "";
        usngField.setAttribute("aria-invalid", "false");
        usngBlock.hidden = true;
        return;
    }
    usngError = "";
    usngBlock.hidden = false;
    const spaced = notations[0] ?? "";
    if (document.activeElement !== usngField && usngField.value !== spaced) {
        notationText = spaced;
        usngField.value = spaced;
    }
}

function writeUsngAxis(name: string, value: string): void {
    entered.set(name, value);
    const field = document.querySelector<HTMLInputElement>(`#axis-${name.replace(/[^a-z0-9]+/gi, "-").toLowerCase()}`);
    if (field) {
        field.value = value;
    }
}

function renderAxes(): void {
    window.clearTimeout(usngTimer);
    usngGeneration += 1;
    usngBlock = null;
    usngField = null;
    usngIssue = null;
    const source = sourcePicker.getCrs();
    presentEpoch();
    axesHost.replaceChildren();
    if (!source) {
        return;
    }
    const crs = source;
    const refreshes: Array<() => void> = [];
    const axisInputs = new Map<string, HTMLInputElement>();
    let notationInput: HTMLInputElement | null = null;
    let refreshNotation = (): void => {};
    if (notationKind(crs) && lengthAxesInMetres(crs) && notationText.trim() === "") {
        const derived = referenceFromAxes(crs, entered.get("Easting") ?? "", entered.get("Northing") ?? "");
        if (derived !== null) {
            notationText = derived;
        }
    }
    function writeAxis(name: string, value: string): void {
        entered.set(name, value);
        const field = axisInputs.get(name);
        if (field && field.value !== value) {
            field.value = value;
        }
    }
    function applyNumbersToNotation(): void {
        if (!notationInput || !lengthAxesInMetres(crs)) {
            return;
        }
        const east = entered.get("Easting") ?? "";
        const north = entered.get("Northing") ?? "";
        const derived = east.trim() === "" || north.trim() === "" ? null : referenceFromAxes(crs, east, north);
        const next = derived ?? "";
        notationText = next;
        if (notationInput.value !== next) {
            notationInput.value = next;
        }
    }
    function applyNotationToNumbers(): void {
        if (!lengthAxesInMetres(crs)) {
            return;
        }
        if (notationText.trim() === "") {
            writeAxis("Easting", "");
            writeAxis("Northing", "");
            return;
        }
        const parsed = metresFromNotation(crs, notationText);
        if (!parsed) {
            return;
        }
        writeAxis("Easting", parsed.easting);
        writeAxis("Northing", parsed.northing);
    }
    for (const axis of source.axes) {
        const block = document.createElement("div");
        block.className = "axis";
        const row = document.createElement("div");
        row.className = "axis-row";
        const label = document.createElement("label");
        label.textContent = `${axisTitle(axis.name)} (${axis.abbreviation})`;
        const input = document.createElement("input");
        input.type = "text";
        input.required = true;
        input.autocomplete = "off";
        input.spellcheck = false;
        input.value = entered.get(axis.name) ?? "";
        input.placeholder = placeholderFor(axis);
        axisInputs.set(axis.name, input);
        const hint = document.createElement("p");
        hint.className = "hint";
        const issue = document.createElement("p");
        issue.className = "error";
        issue.setAttribute("role", "alert");
        function refreshField(): void {
            const covered = notationIsValid(crs) && (axis.name === "Easting" || axis.name === "Northing");
            input.required = !covered;
            const message = covered ? null : axisProblem(axis, input.value, false);
            issue.hidden = message === null;
            issue.textContent = message ?? "";
            const help = axis.unit === catalogue.degreeUnit ? DEGREE_HELP[inputUnit(axis)] : undefined;
            hint.hidden = !help;
            hint.textContent = help ?? "";
            input.placeholder = placeholderFor(axis);
        }
        input.id = `axis-${axis.name.replace(/[^a-z0-9]+/gi, "-").toLowerCase()}`;
        input.addEventListener("input", () => {
            entered.set(axis.name, input.value);
            if (notationInput && (axis.name === "Easting" || axis.name === "Northing")) {
                applyNumbersToNotation();
                refreshNotation();
                return;
            }
            refreshField();
            if (axis.name === "Geodetic latitude" || axis.name === "Geodetic longitude") {
                scheduleUsng(false);
            }
        });
        label.append(input);
        row.append(label);
        if (axis.unit === catalogue.degreeUnit) {
            const select = document.createElement("select");
            select.setAttribute("aria-label", `${axisTitle(axis.name)} format`);
            for (const unit of degreeFormats) {
                const option = document.createElement("option");
                option.value = unit.srid;
                option.textContent = unit.name;
                select.append(option);
            }
            select.value = inputUnit(axis);
            chosenUnits.set(axis.name, select.value);
            select.addEventListener("change", () => {
                const previous = chosenUnits.get(axis.name) ?? catalogue.degreeUnit;
                const next = select.value;
                const converted = convertDegreeText(input.value, previous, next, axis.name === "Geodetic latitude");
                if (converted !== null) {
                    input.value = converted;
                    entered.set(axis.name, converted);
                }
                chosenUnits.set(axis.name, next);
                refreshField();
            });
            row.append(select);
        } else {
            const suffix = document.createElement("span");
            suffix.className = "unit-suffix";
            suffix.textContent = catalogue.units[axis.unit] ?? axis.unit;
            row.append(suffix);
        }
        refreshField();
        refreshes.push(refreshField);
        block.append(row, hint, issue);
        axesHost.append(block);
    }
    const kind = notationKind(source);
    if (kind) {
        const block = document.createElement("div");
        block.className = "axis";
        const label = document.createElement("label");
        label.textContent = kind === "usng" ? "US National Grid" : kind === "utm" ? "UTM reference" : "Grid reference";
        const input = document.createElement("input");
        input.type = "text";
        input.autocomplete = "off";
        input.spellcheck = false;
        input.value = notationText;
        input.placeholder = notationPlaceholder(source);
        const hint = document.createElement("p");
        hint.className = "hint";
        hint.textContent = notationHelp(source);
        const issue = document.createElement("p");
        issue.className = "error";
        issue.setAttribute("role", "alert");
        notationInput = input;
        if (kind === "usng") {
            usngBlock = block;
            usngField = input;
            usngIssue = issue;
        }
        refreshNotation = (): void => {
            const message = notationProblem(crs, notationText, false);
            issue.hidden = message === null;
            issue.textContent = message ?? "";
            for (const refresh of refreshes) {
                refresh();
            }
        };
        input.addEventListener("input", () => {
            notationText = input.value;
            if (kind === "usng") {
                scheduleUsng(true);
                return;
            }
            applyNotationToNumbers();
            refreshNotation();
        });
        label.append(input);
        refreshNotation();
        block.append(label, hint, issue);
        axesHost.append(block);
        if (kind === "usng") {
            scheduleUsng(false);
        }
    }
}

function loadExample(example: Example): void {
    entered.clear();
    chosenUnits.clear();
    notationText = "";
    for (const [name, value] of Object.entries(example.values)) {
        entered.set(name, value);
    }
    epochInput.value = "";
    targetEpochInput.value = "";
    boundaryInput.checked = false;
    sourcePicker.setCrs(example.source);
    targetPicker.setCrs(example.target);
    lastResult = null;
    output.replaceChildren();
}

function resetForm(): void {
    entered.clear();
    chosenUnits.clear();
    notationText = "";
    epochInput.value = "";
    targetEpochInput.value = "";
    boundaryInput.checked = false;
    lastResult = null;
    output.replaceChildren();
    sourcePicker.clear();
    targetPicker.clear();
}

swapButton.addEventListener("click", () => {
    const source = sourcePicker.getCrs();
    const target = targetPicker.getCrs();
    if (!source || !target) {
        return;
    }
    const result = lastResult;
    notationText = "";
    if (result && result.crs.srid === target.srid) {
        entered.clear();
        for (const axis of result.axes) {
            entered.set(axis.name, axis.value);
            chosenUnits.set(axis.name, axis.unit);
        }
    }
    sourcePicker.setCrs(target.srid);
    targetPicker.setCrs(source.srid);
    lastResult = null;
    output.replaceChildren();
});

resetButton.addEventListener("click", () => {
    resetForm();
});

function readProblem(): Problem {
    const source = sourcePicker.getCrs();
    const target = targetPicker.getCrs();
    if (!source || !target) {
        throw new Error("Choose a source CRS and a target CRS");
    }
    if (notationKind(source) === "usng") {
        const notation = notationText.trim();
        if (usngError && notation !== "") {
            throw new Error(usngError);
        }
        const latitude = (entered.get("Geodetic latitude") ?? "").trim();
        const longitude = (entered.get("Geodetic longitude") ?? "").trim();
        if (latitude === "" && longitude === "" && notation !== "") {
            const values: Problem["values"] = {};
            for (const axis of source.axes) {
                if (axis.name === "Geodetic latitude" || axis.name === "Geodetic longitude") {
                    continue;
                }
                const value = (entered.get(axis.name) ?? "").trim();
                if (value === "") {
                    throw new Error(`Enter a value for ${axisTitle(axis.name)}`);
                }
                const problem = axisProblem(axis, value, true);
                if (problem) {
                    throw new Error(problem);
                }
                values[axis.name] = {
                    value,
                    unit: inputUnit(axis),
                };
            }
            return {
                source: source.srid,
                target: target.srid,
                values,
                notation,
                epoch: epochMode() !== "none" && epochInput.value !== "" ? epochInput.value : null,
                targetEpoch: epochMode() === "input" && targetEpochInput.value !== "" ? targetEpochInput.value : null,
                ignoreBoundaryRestrictions: boundaryInput.checked,
            };
        }
    }
    const notation = notationText.trim();
    const hasNotation = notationKind(source) !== null && notation !== "";
    if (hasNotation) {
        const problem = notationProblem(source, notation, true);
        if (problem) {
            throw new Error(problem);
        }
    }
    const eastRaw = entered.get("Easting") ?? "";
    const northRaw = entered.get("Northing") ?? "";
    const bothPresent = eastRaw.trim() !== "" && northRaw.trim() !== "";
    // A truncated grid reference drops fractions of a metre. Send the numbers
    // when they carry a fraction the reference cannot.
    const useNotation = hasNotation && (!bothPresent || notationAgrees(source, notation, eastRaw, northRaw));
    const values: Problem["values"] = {};
    for (const axis of source.axes) {
        const covered = useNotation && (axis.name === "Easting" || axis.name === "Northing");
        if (covered) {
            continue;
        }
        const value = (entered.get(axis.name) ?? "").trim();
        if (value === "") {
            throw new Error(`Enter a value for ${axisTitle(axis.name)}`);
        }
        const problem = axisProblem(axis, value, true);
        if (problem) {
            throw new Error(problem);
        }
        values[axis.name] = {
            value,
            unit: inputUnit(axis),
        };
    }
    return {
        source: source.srid,
        target: target.srid,
        values,
        notation: useNotation ? notation : null,
        // Time-dependent steps read the point's epoch. When only the output CRS is dated,
        // the form's output epoch is that date. A static projection on both sides sends none.
        epoch: epochMode() !== "none" && epochInput.value !== "" ? epochInput.value : null,
        targetEpoch: epochMode() === "input" && targetEpochInput.value !== "" ? targetEpochInput.value : null,
        ignoreBoundaryRestrictions: boundaryInput.checked,
    };
}

function showAccuracy(readings: ConvertResult["accuracy"] | undefined, parent: HTMLElement): void {
    const first = readings?.[0];
    if (!first || !readings) {
        return;
    }
    const block = document.createElement("div");
    block.className = "accuracy";
    if (readings.every((reading) => reading.value === "0")) {
        const line = document.createElement("p");
        line.textContent = "Accuracy: exact";
        block.append(line);
        parent.append(block);
        return;
    }
    const shared = readings.every((reading) => reading.value === first.value && reading.unit === first.unit);
    if (shared) {
        const line = document.createElement("p");
        line.textContent = `Accuracy: ${accuracyQuantity(first)}`;
        block.append(line);
    } else {
        const label = document.createElement("p");
        label.textContent = "Accuracy";
        block.append(label);
        for (const reading of readings) {
            const line = document.createElement("div");
            line.className = "reading";
            line.textContent = `${axisTitle(reading.name)}: ${accuracyQuantity(reading)}`;
            block.append(line);
        }
    }
    parent.append(block);
}

function accuracyQuantity(reading: ConvertResult["accuracy"][number]): string {
    const converted = `${reading.display ?? reading.value} ${reading.unitName}`;
    const metres = reading.metresDisplay ?? reading.metres;
    if (reading.unit === METRE_UNIT || metres === undefined) {
        return converted;
    }

    return `${converted} (${metres}m)`;
}

function routeTitle(name: string): string {
    return name.replace(/ \(\d+\)$/, "");
}

function gridFallbackNote(fallbacks: NonNullable<ConvertResult["gridFallback"]>): HTMLElement {
    const note = document.createElement("aside");
    note.className = "grid-fallback";
    const lead = document.createElement("p");
    lead.textContent = fallbacks.length === 1
        ? "A preferred route needs a grid file from a datapack that is not enabled. This result is a fallback."
        : "Preferred routes need a grid file from a datapack that is not enabled. This result is a fallback.";
    note.append(lead);
    for (const fallback of fallbacks) {
        const line = document.createElement("p");
        line.className = "hint";
        line.textContent = `${routeTitle(fallback.name)} · EPSG:${fallback.code}`;
        note.append(line);
    }
    return note;
}

function showResult(result: ConvertResult): void {
    output.replaceChildren();
    lastResult = result.error ? null : result;
    if (result.error) {
        const error = document.createElement("p");
        error.className = "error";
        error.textContent = result.error;
        output.append(error);
        return;
    }
    const layout = document.createElement("div");
    layout.className = "result-layout";
    const main = document.createElement("div");
    main.className = "result-main";
    const heading = document.createElement("h2");
    heading.textContent = "Result";
    const list = document.createElement("dl");
    list.className = "result";
    for (const axis of result.axes) {
        const term = document.createElement("dt");
        term.textContent = `${axisTitle(axis.name)} (${axis.abbreviation})`;
        const description = document.createElement("dd");
        const readings = [{ value: axis.display ?? axis.value, unitName: axis.unitName }, ...axis.formats];
        for (const reading of readings) {
            const line = document.createElement("div");
            line.className = "reading";
            line.textContent = `${reading.value} ${reading.unitName}`;
            description.append(line);
        }
        list.append(term, description);
    }
    const notations = result.notations ?? [];
    if (notations.length > 0) {
        const term = document.createElement("dt");
        const targetCrs = targetPicker.getCrs();
        term.textContent = targetCrs?.usng
            ? "US National Grid"
            : /^\d{1,2}[NS] \d/.test(notations[0] ?? "")
                ? "UTM reference"
                : "Grid reference";
        const description = document.createElement("dd");
        for (const notation of notations) {
            const line = document.createElement("div");
            line.className = "reading";
            line.textContent = notation;
            description.append(line);
        }
        list.append(term, description);
    }
    main.append(heading, list);
    showAccuracy(result.accuracy, main);
    layout.append(main);
    const fallbacks = result.gridFallback ?? [];
    if (fallbacks.length > 0) {
        layout.append(gridFallbackNote(fallbacks));
    }
    output.append(layout);
    if (result.unchanged) {
        const note = document.createElement("p");
        note.textContent = "This coordinate is already in that CRS.";
        output.append(note);
        return;
    }
    if (result.route.length === 0) {
        return;
    }
    const routeHeading = document.createElement("h2");
    routeHeading.textContent = "Route";
    output.append(routeHeading);
    result.route.forEach((group, groupIndex) => {
        if (result.route.length > 1) {
            const part = document.createElement("h3");
            part.textContent = `Path ${groupIndex + 1}`;
            output.append(part);
        }
        const items = document.createElement("ol");
        items.className = "route";
        for (const step of group) {
            const item = document.createElement("li");
            const title = document.createElement("div");
            title.textContent = routeTitle(step.name);
            const meta = document.createElement("div");
            meta.className = "hint";
            const bits = [`EPSG:${step.code}`];
            if (step.reverse) {
                bits.push("reverse");
            }
            bits.push(`${step.accuracy} m`);
            if (step.extent) {
                bits.push(step.extent);
            }
            if (step.slideBefore !== null) {
                bits.push(`slide to ${String(step.slideBefore)} before this step`);
            }
            if (step.slideAfter !== null) {
                bits.push(`slide to ${String(step.slideAfter)} after this step`);
            }
            meta.textContent = bits.join(" · ");
            item.append(title, meta);
            items.append(item);
        }
        output.append(items);
    });
}

convertButton.addEventListener("click", () => {
    let problem: Problem;
    try {
        problem = readProblem();
    } catch (error) {
        showResult({
            crs: { srid: "", name: "", code: "" },
            axes: [],
            accuracy: [],
            route: [],
            unchanged: false,
            error: error instanceof Error ? error.message : String(error),
        });
        return;
    }
    const packs = selectedPacks();
    const volumeBase = volumeBaseUrl();
    const generation = bootGeneration;
    convertButton.disabled = true;
    setPacksEnabled(false);
    status.classList.remove("error");
    status.textContent = "Converting…";
    void ensureBoot()
        .then(() => askWorker({ problem, packs, volumeBase }))
        .then((result) => {
            if (generation === bootGeneration) {
                status.textContent = "Ready.";
            }
            showResult(result);
        })
        .catch((error: unknown) => {
            if (generation === bootGeneration) {
                status.textContent = "Ready.";
            }
            showResult({
                crs: { srid: "", name: "", code: "" },
                axes: [],
                accuracy: [],
                route: [],
                unchanged: false,
                error: error instanceof Error ? error.message : String(error),
            });
        })
        .finally(() => {
            convertButton.disabled = false;
            setPacksEnabled(true);
        });
});

applyStoredPacks(false);
startBoot();
