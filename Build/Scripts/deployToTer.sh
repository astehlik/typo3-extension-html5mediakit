#!/usr/bin/env bash

echo "Cleanup Git repository..."
git reset --hard HEAD && git clean -fx

TAG_MESSAGE=`git tag -n10 -l $TRAVIS_TAG | sed 's/^v[0-9.]*[ ]*//g'`
echo "Extracted tag message: $TAG_MESSAGE"

echo "Renaming repository folder to match extension key..."
cd ..
mv typo3-extension-html5mediakit html5mediakit
cd html5mediakit

echo "Uploading release ${TRAVIS_TAG} to TER"
./.Build/bin/upload . "$TYPO3_ORG_USERNAME" "$TYPO3_ORG_PASSWORD" "$TAG_MESSAGE"
