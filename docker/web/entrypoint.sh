#!/bin/sh
set -e

chown -R www-data:www-data /srv/sqlite3

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- apache2-foreground "$@"
fi

exec "$@"
