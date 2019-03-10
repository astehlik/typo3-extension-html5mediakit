#!/usr/bin/env bash

set -e

THIS_SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"
cd "$THIS_SCRIPT_DIR" || exit 1

cd ../..

version="$1"
release=${version%.*}

if [[ -z "$version" ]]; then
    echo "No version number provided!"
    exit 1
fi

echo "Preparing release for version $version"

echo "Replacing version number in ext_emconf.php..."

sed -i -E "s/'version' => '.+'/'version' => '$version'/" ext_emconf.php

echo "Replacing version numbers documentation settings..."

sed -i -E "s/version     = .+/version     = $version/" Documentation/Settings.cfg
sed -i -E "s/release     = .+/release     = $release/" Documentation/Settings.cfg

echo "Adding changed files to git..."

git add ext_emconf.php Documentation/Settings.cfg

git commit -m "[TASK] Release version $version"

git flow release start ${version}

git flow release finish ${version}

echo "Check if everything is OK, then push..."
