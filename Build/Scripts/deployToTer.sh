# Cleanup before we upload
git reset --hard HEAD && git clean -fx

TAG_MESSAGE=`git tag -n10 -l $TRAVIS_TAG | sed 's/^[0-9.]*[ ]*//g'`
echo "Uploading release ${TRAVIS_TAG} to TER"

# .Build/bin/upload . "$TYPO3_ORG_USERNAME" "$TYPO3_ORG_PASSWORD" "$TAG_MESSAGE"
