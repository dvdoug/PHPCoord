// The CRS catalogue and the browser manifest are generated from this checkout.
// Composer is not run here. Locally, vendor/ is already installed. Read the
// Docs runs composer install --no-dev before npm run build.

import { spawnSync } from "node:child_process";
import path from "node:path";
import { fileURLToPath } from "node:url";

const playgroundDir = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "..");
const repoRoot = path.resolve(playgroundDir, "..");

run("php", [path.join(playgroundDir, "php", "export-crs-index.php")], repoRoot);
run("node", [path.join(playgroundDir, "scripts", "bundle-library.mjs")], repoRoot);

function run(command, args, cwd) {
    // Windows only resolves php.bat and node.cmd through a shell. Passing the
    // argument list separately makes Node warn and skip quoting.
    const result = process.platform === "win32"
        ? spawnSync([command, ...args.map(quoteWindowsArg)].join(" "), {
            cwd,
            stdio: "inherit",
            shell: true,
        })
        : spawnSync(command, args, { cwd, stdio: "inherit" });
    if (result.status !== 0) {
        throw new Error(`${command} ${args.join(" ")} exited ${result.status ?? "with no status"}`);
    }
}

function quoteWindowsArg(arg) {
    if (!/[\s"]/.test(arg)) {
        return arg;
    }
    return `"${arg.replaceAll('"', '\\"')}"`;
}
