# Automatically uses the current folder's name to create a unique external venv folder
$projectName = Split-Path -Leaf $PSScriptRoot
$env:UV_PROJECT_ENVIRONMENT = "$HOME\.uv-envs\$projectName"

uv lock --upgrade
uv run python -m sphinx . _build -E -a
