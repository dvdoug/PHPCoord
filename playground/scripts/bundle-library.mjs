// Stamp src/ and the runtime packages into one manifest the WASM worker writes
// onto the virtual filesystem before PHP starts. Those packages come from
// vendor/, installed by Composer. Read the Docs runs composer install
// --no-dev, then composer require of the eight datapacks. A local build uses
// the vendor directory that is already there. Datapack trees are not copied
// here; scripts/publish-datapacks.mjs serves them as lazy volumes. The
// autoload looks in each datapack src after the core src, and loads a file
// only when that path is present.

import { access, mkdir, readdir, readFile, writeFile } from "node:fs/promises";
import path from "node:path";
import { fileURLToPath } from "node:url";
import { datapackIds } from "./datapack-ids.mjs";

const playgroundDir = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "..");
const repoRoot = path.resolve(playgroundDir, "..");
const vendorRoot = path.join(repoRoot, "vendor");

const required = [
    "composer/installed.php",
    "composer/InstalledVersions.php",
    "composer/pcre/src",
    "opis/json-schema/src",
    "opis/string/src",
    "opis/uri/src",
    "psr/log/src",
];
for (const relative of required) {
    try {
        await access(path.join(vendorRoot, relative));
    } catch (error) {
        if (error && error.code === "ENOENT") {
            throw new Error(`${path.posix.join("vendor", relative)} is missing. Run composer install before building the playground.`);
        }
        throw error;
    }
}

const files = {};

await copyTree(path.join(repoRoot, "src"), "/phpcoord/src");
await copyTree(path.join(vendorRoot, "composer/pcre"), "/phpcoord/vendor/composer/pcre");
await copyTree(path.join(vendorRoot, "opis"), "/phpcoord/vendor/opis");
await copyTree(path.join(vendorRoot, "psr/log"), "/phpcoord/vendor/psr/log");
files["/phpcoord/vendor/composer/installed.php"] = await readFile(path.join(vendorRoot, "composer/installed.php"), "utf8");
files["/phpcoord/vendor/composer/InstalledVersions.php"] = await readFile(path.join(vendorRoot, "composer/InstalledVersions.php"), "utf8");

if (!files["/phpcoord/vendor/composer/installed.php"].includes("__DIR__ . '/../../'")) {
    throw new Error("installed.php does not use a __DIR__-relative root path.");
}

for (const name of ["convert.php", "PlaygroundLogger.php", "input-epoch.php"]) {
    const file = path.join(playgroundDir, "php", name);
    files[`/phpcoord/playground/${name}`] = await readFile(file, "utf8");
}

const datapackSrc = datapackIds
    .map((id) => `            __DIR__ . '/vendor/php-coord/datapack-${id}/src/',`)
    .join("\n");

files["/phpcoord/autoload.php"] = `<?php
declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    if ($class === 'Composer\\\\InstalledVersions') {
        require __DIR__ . '/vendor/composer/InstalledVersions.php';

        return;
    }

    if (str_starts_with($class, 'PHPCoord\\\\')) {
        $relative = str_replace('\\\\', '/', substr($class, strlen('PHPCoord\\\\'))) . '.php';
        $dirs = [
            __DIR__ . '/src/',
${datapackSrc}
        ];
        foreach ($dirs as $dir) {
            $path = $dir . $relative;
            if (is_file($path)) {
                require $path;

                return;
            }
        }

        return;
    }

    $prefixes = [
        'Composer\\\\Pcre\\\\' => __DIR__ . '/vendor/composer/pcre/src/',
        'Opis\\\\JsonSchema\\\\' => __DIR__ . '/vendor/opis/json-schema/src/',
        'Opis\\\\String\\\\' => __DIR__ . '/vendor/opis/string/src/',
        'Opis\\\\Uri\\\\' => __DIR__ . '/vendor/opis/uri/src/',
        'Psr\\\\Log\\\\' => __DIR__ . '/vendor/psr/log/src/',
    ];
    foreach ($prefixes as $prefix => $dir) {
        if (str_starts_with($class, $prefix)) {
            $path = $dir . str_replace('\\\\', '/', substr($class, strlen($prefix))) . '.php';
            if (is_file($path)) {
                require $path;
            }

            return;
        }
    }
});

require __DIR__ . '/src/bc_namespace.php';
`;

const destination = path.join(playgroundDir, "php", "library-manifest.json");
await mkdir(path.dirname(destination), { recursive: true });
await writeFile(destination, JSON.stringify(files));
console.log(`Wrote ${Object.keys(files).length} files to ${destination}`);

async function copyTree(hostRoot, vfsRoot) {
    let found = false;
    for (const file of await filesIn(hostRoot)) {
        found = true;
        const relative = path.relative(hostRoot, file).split(path.sep).join("/");
        if (relative === "" || relative.startsWith("../") || path.isAbsolute(relative)) {
            throw new Error(`File escaped ${hostRoot}: ${file}`);
        }
        const bytes = await readFile(file);
        if (bytes.includes(0)) {
            throw new Error(`Refusing to preload a binary file: ${file}`);
        }
        files[`${vfsRoot}/${relative}`] = bytes.toString("utf8");
    }
    if (!found) {
        throw new Error(`${hostRoot} is empty.`);
    }
}

async function filesIn(dir) {
    const entries = await readdir(dir, { withFileTypes: true });
    const files = [];
    for (const entry of entries) {
        const full = path.join(dir, entry.name);
        if (entry.isDirectory()) {
            files.push(...(await filesIn(full)));
        } else if (entry.isFile()) {
            files.push(full);
        }
    }
    return files;
}
