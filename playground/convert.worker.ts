import { PHP, loadPHPRuntime } from "@php-wasm/universal";
import * as phpLoaderModule from "phpcoord-php-loader";
import manifest from "./php/library-manifest.json";
import { datapackLabel, installedPhpFor, normalizePacks } from "./datapacks.ts";
import { installVolume, readVolumeIndex, volumeFilesFromContents, volumeFilesFromIndex } from "./volume.ts";

// volume.ts treats importScripts as proof it is inside a worker. This worker
// is an ES module, so importScripts is absent, but synchronous XHR still works
// here and that is what a lazy file uses.
const workerGlobal = (globalThis as { WorkerGlobalScope?: abstract new () => unknown }).WorkerGlobalScope;
if (
    typeof (globalThis as { importScripts?: unknown }).importScripts !== "function"
    && workerGlobal
    && globalThis instanceof workerGlobal
) {
    (globalThis as { importScripts: () => void }).importScripts = () => {
        throw new Error("This module worker does not use importScripts");
    };
}

export interface AxisValue {
    value: string;
    unit: string;
}

export interface Problem {
    source: string;
    target: string;
    values: Record<string, AxisValue>;
    notation: string | null;
    epoch: string | null;
    targetEpoch: string | null;
    ignoreBoundaryRestrictions: boolean;
}

export interface AxisFormat {
    value: string;
    unit: string;
    unitName: string;
}

export interface AxisResult {
    name: string;
    abbreviation: string;
    value: string;
    display?: string;
    unit: string;
    unitName: string;
    formats: AxisFormat[];
}

export interface AccuracyReading {
    name: string;
    value: string;
    display?: string;
    unit: string;
    unitName: string;
    metres?: string;
    metresDisplay?: string;
}

export interface RouteStep {
    name: string;
    operation: string;
    code: string;
    reverse: boolean;
    accuracy: number;
    extent: string;
    slideBefore: number | null;
    slideAfter: number | null;
}

export interface GridFallback {
    name: string;
    code: string;
    operation: string;
}

export interface ConvertResult {
    crs: { srid: string; name: string; code: string };
    axes: AxisResult[];
    notations?: string[];
    accuracy: AccuracyReading[];
    route: RouteStep[][];
    gridFallback?: GridFallback[];
    unchanged: boolean;
    error: string | null;
}

interface WorkerRequest {
    id: number;
    warmup?: boolean;
    problem?: Problem;
    packs?: string[];
    volumeBase?: string;
}

interface WorkerResponse {
    id: number;
    ok: boolean;
    warmed?: boolean;
    inputEpochSrids?: string[];
    result?: ConvertResult;
    error?: string;
}

const files = manifest as Record<string, string>;
const scriptPath = "/phpcoord/playground/convert.php";
const inputEpochPath = "/phpcoord/playground/input-epoch.php";
const problemPath = "/phpcoord/problem.json";
const installedPath = "/phpcoord/vendor/composer/installed.php";

let phpPromise: Promise<PHP> | null = null;
let bootedKey = "";
let inputEpochSrids: string[] | null = null;

function packKey(packs: readonly string[]): string {
    return [...packs].sort().join(",");
}

function disposePhp(php: PHP): void {
    const dispose = (Symbol as unknown as { dispose?: symbol }).dispose;
    if (dispose) {
        (php as unknown as Record<symbol, () => void>)[dispose]?.();
    }
}

async function disposeRuntime(): Promise<void> {
    const current = phpPromise;
    phpPromise = null;
    bootedKey = "";
    if (!current) {
        return;
    }
    try {
        disposePhp(await current);
    } catch {
        // The boot already disposed the runtime, or it never finished.
    }
}

async function mountPack(php: PHP, id: string, volumeBase: string): Promise<void> {
    let indexUrl: string;
    try {
        indexUrl = new URL(`${id}/volume-index.json`, volumeBase).href;
    } catch {
        throw new Error(`The ${datapackLabel(id)} datapack is not on this server`);
    }
    const response = await fetch(indexUrl);
    if (!response.ok) {
        throw new Error(`The ${datapackLabel(id)} datapack is not on this server`);
    }
    const index = readVolumeIndex(await response.json());
    await installVolume(php, volumeFilesFromIndex(index, indexUrl));
}

async function boot(packs: readonly string[], volumeBase: string): Promise<PHP> {
    const runtimeId = await loadPHPRuntime(
        phpLoaderModule as unknown as Parameters<typeof loadPHPRuntime>[0],
    );
    const php = new PHP(runtimeId);
    try {
        // Preloaded: the core library and its Composer packages. Datapack
        // grids and polygons are planted below, and fetched the first time
        // PHP opens that path.
        await installVolume(php, volumeFilesFromContents(files));
        const installedSource = files[installedPath];
        if (typeof installedSource !== "string") {
            throw new Error("installed.php was not preloaded");
        }
        php.writeFile(installedPath, installedPhpFor(installedSource, packs));
        for (const id of packs) {
            await mountPack(php, id, volumeBase);
        }
        return php;
    } catch (error) {
        disposePhp(php);
        throw error;
    }
}

async function usePacks(packs: readonly string[], volumeBase: string): Promise<PHP> {
    const key = packKey(packs);
    if (phpPromise && bootedKey === key) {
        return phpPromise;
    }
    await disposeRuntime();
    bootedKey = key;
    phpPromise = boot(packs, volumeBase).catch((error: unknown) => {
        phpPromise = null;
        bootedKey = "";
        throw error;
    });
    return phpPromise;
}

async function runOnce(php: PHP, problem: Problem): Promise<ConvertResult> {
    php.writeFile(problemPath, JSON.stringify(problem));
    const response = await php.run({ scriptPath });
    const text = response.text.trim();
    if (text === "") {
        throw new Error(response.errors || "PHP produced no output");
    }
    try {
        return JSON.parse(text) as ConvertResult;
    } catch {
        const detail = `${response.errors}\n${text}`
            .replace(/<[^>]+>/g, " ")
            .replace(/\s+/g, " ")
            .trim();
        throw new Error(detail.slice(0, 800) || "PHP produced output that was not JSON");
    }
}

async function loadInputEpochSrids(php: PHP): Promise<string[]> {
    if (inputEpochSrids !== null) {
        return inputEpochSrids;
    }
    const response = await php.run({ scriptPath: inputEpochPath });
    const text = response.text.trim();
    if (text === "") {
        throw new Error(response.errors || "PHP produced no coordinate epoch list");
    }
    let decoded: unknown;
    try {
        decoded = JSON.parse(text);
    } catch {
        const detail = `${response.errors}\n${text}`
            .replace(/<[^>]+>/g, " ")
            .replace(/\s+/g, " ")
            .trim();
        throw new Error(detail.slice(0, 800) || "Coordinate epoch list was not JSON");
    }
    if (!Array.isArray(decoded) || decoded.some((srid) => typeof srid !== "string")) {
        throw new Error("Coordinate epoch list was not a list of SRIDs");
    }
    inputEpochSrids = decoded;
    return decoded;
}

async function convert(problem: Problem, packs: readonly string[], volumeBase: string): Promise<ConvertResult> {
    let result = await runOnce(await usePacks(packs, volumeBase), problem);
    if (result.error?.includes("Cannot redeclare")) {
        await disposeRuntime();
        result = await runOnce(await usePacks(packs, volumeBase), problem);
    }
    return result;
}

function packsFrom(message: WorkerRequest): string[] {
    const raw = Array.isArray(message.packs) ? message.packs : [];
    return normalizePacks(raw.filter((id): id is string => typeof id === "string"));
}

const scope = self as unknown as {
    onmessage: (event: MessageEvent<WorkerRequest>) => void;
    postMessage: (message: WorkerResponse) => void;
};

let queue: Promise<void> = Promise.resolve();

async function handle(message: WorkerRequest): Promise<void> {
    const packs = packsFrom(message);
    const volumeBase = typeof message.volumeBase === "string" ? message.volumeBase : "";
    try {
        if (packs.length > 0 && volumeBase === "") {
            throw new Error("Datapack volumes have no address");
        }
        if (message.warmup) {
            const php = await usePacks(packs, volumeBase);
            scope.postMessage({
                id: message.id,
                ok: true,
                warmed: true,
                inputEpochSrids: await loadInputEpochSrids(php),
            });
            return;
        }
        if (!message.problem) {
            throw new Error("No coordinate was provided");
        }
        scope.postMessage({
            id: message.id,
            ok: true,
            result: await convert(message.problem, packs, volumeBase),
        });
    } catch (error) {
        await disposeRuntime();
        scope.postMessage({
            id: message.id,
            ok: false,
            error: error instanceof Error ? error.message : String(error),
        });
    }
}

scope.onmessage = (event) => {
    const message = event.data;
    queue = queue.then(() => handle(message)).catch(() => undefined);
};
