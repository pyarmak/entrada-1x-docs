#!/bin/bash

# Scrubber Executor v1.0.0
# ==============================================================
#
# CHANGELOG:
# 20170309: Initial commit of this script.
#

# Scrub Script Directory Path
SCRUB_DIRECTORY="/root/scrub"

# MySQL path
MYSQL_PATH="/usr/bin"

# PHP path
PHP_PATH="/usr/bin"

# Database server connection information.
export DATABASE_HOSTNAME="127.0.0.1"
export DATABASE_USERNAME="admin"
export DATABASE_PASSWORD="password"

# Databases that will be dumped.
PRODUCTION_ENTRADA="entrada"
PRODUCTION_ENTRADA_AUTH="entrada_auth"
PRODUCTION_ENTRADA_CLERKSHIP="entrada_clerkship"

# Databases that will be used.
export STAGING_ENTRADA="stg_entrada"
export STAGING_ENTRADA_AUTH="stg_entrada_auth"
export STAGING_ENTRADA_CLERKSHIP="stg_entrada_clerkship"

# Drop and recreate the staging databases.
${MYSQL_PATH}/mysql -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} -e "DROP DATABASE $STAGING_ENTRADA; DROP DATABASE $STAGING_ENTRADA_AUTH; DROP DATABASE $STAGING_ENTRADA_CLERKSHIP;"
${MYSQL_PATH}/mysql -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} -e "CREATE DATABASE $STAGING_ENTRADA; CREATE DATABASE $STAGING_ENTRADA_AUTH; CREATE DATABASE $STAGING_ENTRADA_CLERKSHIP;"

# Dump production data and restore to the staging databases.
${MYSQL_PATH}/mysqldump -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} --single-transaction ${PRODUCTION_ENTRADA} | ${MYSQL_PATH}/mysql -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} ${STAGING_ENTRADA}
${MYSQL_PATH}/mysqldump -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} --single-transaction ${PRODUCTION_ENTRADA_AUTH} | ${MYSQL_PATH}/mysql -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} ${STAGING_ENTRADA_AUTH}
${MYSQL_PATH}/mysqldump -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} --single-transaction ${PRODUCTION_ENTRADA_CLERKSHIP} | ${MYSQL_PATH}/mysql -h${DATABASE_HOSTNAME} -u${DATABASE_USERNAME} -p${DATABASE_PASSWORD} ${STAGING_ENTRADA_CLERKSHIP}

# Scrub various user data elements.
${PHP_PATH}/php ${SCRUB_DIRECTORY}/scrub.php
