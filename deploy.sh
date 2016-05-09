#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

# Working directory is set to "$DEPLOY_DIR"
# Available variables
# "$GL_USER" username of user doing this deploy (same as pubkey name)
# "$REV_OLD" full id of revision before deploy
# "$REV_NEW" full id of revision after deploy
# "$REF_NAME" full name of reference deployed to (eg. ref/heads/master)
# "$PROJECT_DIR" absolute path to project directory
# "$DEPLOY_DIR" absolute path to extracted stage

function symlink-shared {
	if [[ ! -d "$PROJECT_DIR/$1" ]]; then
		mkdir -p "$PROJECT_DIR/$1"
		chmod ug+rwX,o= "$PROJECT_DIR/$1"
	fi
	rm -rf "${DEPLOY_DIR:?}/$1" && ln -s "$PROJECT_DIR/$1" "$DEPLOY_DIR/$1"
}


step "decrypting files"
/opt/blackbox/bin/blackbox_postdeploy


step "creating local config"
cp "app/config/local.prod.neon" "app/config/local.neon"


step "symlinking directories to persist between deploys"
symlink-shared "log"


step "installing composer dependencies"
composer install


step "running database migrations"
php public/index.php migrations:continue


step "swapping symlinks"
stage-live "$DEPLOY_DIR" "$PROJECT_DIR"


step "reloading php-fpm"
# reliably clears opcache
sudo /usr/bin/systemctl reload php70-php-fpm
