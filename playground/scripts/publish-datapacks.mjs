// Copy each regional datapack's src and resources into the built HTML tree.
// The worker fetches {id}/volume-index.json and plants those paths as lazy
// files. This does not preload the bytes into library-manifest.json.
//
// One destination per run. Locally, docs/_build/_static/volumes. On Read the
// Docs, READTHEDOCS_OUTPUT/html/_static/volumes. This script creates that
// directory. The grids stay out of docs/_static, so Sphinx does not copy them
// again from the source tree.

import { access, stat } from "node:fs/promises";
import { spawn } from "node:child_process";
import path from "node:path";
import { fileURLToPath } from "node:url";
import { datapackIds } from "./datapack-ids.mjs";

const playgroundDir = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "..");
const repoRoot = path.resolve(playgroundDir, "..");
const publishScript = path.join(playgroundDir, "scripts", "publish-volume.mjs");
const outputRoot = process.env.READTHEDOCS_OUTPUT
    ? path.join(process.env.READTHEDOCS_OUTPUT, "html", "_static", "volumes")
    : path.join(repoRoot, "docs", "_build", "_static", "volumes");

for (const id of datapackIds) {
    const packageDir = path.join(repoRoot, "vendor", "php-coord", `datapack-${id}`);
    const dest = path.join(outputRoot, id);
    const prefix = `/phpcoord/vendor/php-coord/datapack-${id}`;
    const args = [
        publishScript,
        "--dest",
        dest,
        "--index",
        "volume-index.json",
        "--map",
        `${prefix}/src=${path.join(packageDir, "src")}`,
    ];
    const resources = path.join(packageDir, "resources");
    if (await isDirectory(resources)) {
        args.push("--map", `${prefix}/resources=${resources}`);
    }
    await runNode(args);
}

async function isDirectory(dir) {
    try {
        await access(dir);
    } catch (error) {
        if (error && error.code === "ENOENT") {
            return false;
        }
        throw error;
    }
    return (await stat(dir)).isDirectory();
}

function runNode(args) {
    return new Promise((resolve, reject) => {
        const child = spawn(process.execPath, args, { stdio: "inherit" });
        child.on("error", reject);
        child.on("exit", (code) => {
            if (code === 0) {
                resolve();
                return;
            }
            reject(new Error(`publish-volume exited ${code ?? "with no status"}`));
        });
    });
}
