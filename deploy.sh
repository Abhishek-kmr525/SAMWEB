#!/usr/bin/env bash
set -Eeuo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
CONFIG_FILE="${SAM_DEPLOY_CONFIG:-$SCRIPT_DIR/.deploy.env}"

if [[ -f "$CONFIG_FILE" ]]; then
  set -a
  # shellcheck disable=SC1090
  source "$CONFIG_FILE"
  set +a
fi

: "${SAM_REPO_URL:?Set SAM_REPO_URL in .deploy.env}"
: "${SAM_REPO_DIR:?Set SAM_REPO_DIR in .deploy.env}"
: "${SAM_PUBLIC_DIR:?Set SAM_PUBLIC_DIR in .deploy.env}"

SAM_BRANCH="${SAM_BRANCH:-main}"
LOCK_DIR="${SAM_DEPLOY_LOCK_DIR:-/tmp/samrecover-deploy.lock}"

case "$SAM_REPO_DIR" in
  /home/*/repositories/*) ;;
  *) echo "SAM_REPO_DIR must be inside /home/.../repositories/." >&2; exit 1 ;;
esac

case "$SAM_PUBLIC_DIR" in
  /home/*/public_html|/home/*/public_html/*) ;;
  *) echo "SAM_PUBLIC_DIR must be public_html or one of its subdirectories." >&2; exit 1 ;;
esac

if [[ "$SAM_REPO_DIR" == "$SAM_PUBLIC_DIR" ]]; then
  echo "Repository and public directory must be different." >&2
  exit 1
fi

if ! mkdir "$LOCK_DIR" 2>/dev/null; then
  echo "Another deployment is already running." >&2
  exit 1
fi
trap 'rmdir "$LOCK_DIR" 2>/dev/null || true' EXIT

echo "[$(date '+%Y-%m-%d %H:%M:%S')] Starting SAM deployment"

if [[ ! -d "$SAM_REPO_DIR/.git" ]]; then
  mkdir -p "$(dirname "$SAM_REPO_DIR")"
  git clone --branch "$SAM_BRANCH" --single-branch "$SAM_REPO_URL" "$SAM_REPO_DIR"
else
  git -C "$SAM_REPO_DIR" remote set-url origin "$SAM_REPO_URL"
  git -C "$SAM_REPO_DIR" fetch --prune origin "$SAM_BRANCH"
  git -C "$SAM_REPO_DIR" checkout "$SAM_BRANCH"
  git -C "$SAM_REPO_DIR" pull --ff-only origin "$SAM_BRANCH"
fi

mkdir -p "$SAM_PUBLIC_DIR"

rsync -a \
  --exclude='.git/' \
  --exclude='.gitignore' \
  --exclude='.deploy.env' \
  --exclude='.deploy.env.example' \
  --exclude='deploy.sh' \
  --exclude='DEPLOYMENT.md' \
  --exclude='deploy_ftp.py' \
  --exclude='includes/app-config.php' \
  --exclude='storage/' \
  --exclude='tmp/' \
  --exclude='backups/' \
  --exclude='adminpanel-local/' \
  --exclude='samrecover.com/' \
  --exclude='server-latest/' \
  --exclude='Archive.zip' \
  --exclude='README-local.md' \
  --exclude='router.php' \
  --exclude='run-local.sh' \
  --exclude='compress_images.py' \
  --exclude='compress_videos.sh' \
  --exclude='parse_report.py' \
  --exclude='XAU_MultiStrategy_Master_EA_V2_TEST.mq5' \
  "$SAM_REPO_DIR/" "$SAM_PUBLIC_DIR/"

if [[ -n "${SAM_HEALTHCHECK_URL:-}" ]]; then
  curl --fail --silent --show-error --location --max-time 30 \
    --output /dev/null "$SAM_HEALTHCHECK_URL"
fi

DEPLOYED_COMMIT="$(git -C "$SAM_REPO_DIR" rev-parse --short HEAD)"
echo "[$(date '+%Y-%m-%d %H:%M:%S')] Deployment complete: $DEPLOYED_COMMIT"
