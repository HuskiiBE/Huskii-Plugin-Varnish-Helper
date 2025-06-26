#!/bin/bash
# bin/tag-release
# Usage: ./bin/tag-release 2.5.6

set -e

VERSION=$1

if [ -z "$VERSION" ]; then
  echo "❌ Please provide a version number. Example:"
  echo "./bin/tag-release 2.5.6"
  exit 1
fi

TAG="v$VERSION"

echo "🔄 Committing version $VERSION..."
git add .
git commit -m "Release version $VERSION"

echo "🏷 Tagging $TAG..."
git tag "$TAG"

echo "🚀 Pushing to origin..."
git push origin main
git push origin "$TAG"

echo "✅ Version $VERSION tagged and pushed."
