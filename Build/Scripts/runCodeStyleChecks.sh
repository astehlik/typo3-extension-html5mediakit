#!/usr/bin/env bash

set -e

THIS_SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"
cd "$THIS_SCRIPT_DIR" || exit 1

cd ../..

php .Build/bin/phpcs --config-set installed_paths ${PWD}/.Build/vendor/de-swebhosting/php-codestyle/PhpCodeSniffer/,${PWD}/Tests/CodeSniffer

php .Build/bin/phpcs --standard=PSRHtml5mediakit Classes Configuration/TCA Tests ext_*.php
