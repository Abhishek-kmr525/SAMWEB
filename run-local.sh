#!/usr/bin/env bash
set -euo pipefail
DIR="$(cd "$(dirname "$0")" && pwd)"
php -S 127.0.0.1:8090 "$DIR/router.php"
