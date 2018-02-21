#!/bin/bash

# Scrubber Executor v1.1
# ==============================================================
#
# CHANGELOG:
# 20170530: - Included option to connect to different database servers.
#           - Included option whether or not to run the scrub.php script.
#           - Included option whether or not to drop the destination databases first.
#
# 20170309: - Initial commit of this script.
#

# Scrub Script Directory Path
SCRUB_DIRECTORY='/root/scrub'

# Directory path where MariaDB (mysql, mysqldump) binaries resides.
MYSQL_PATH='/usr/bin'

# Directory path where PHP (php) binary resides.
PHP_PATH='/usr/bin'

# Run the Scrub.php script?
RUN_SCRUB_SCRIPT=1

# Drop and recreate destination databases?
RUN_DROP_DATABASES=0

# Source database server connection information.
SOURCE_DATABASE_HOSTNAME='127.0.0.1'
SOURCE_DATABASE_USERNAME='root'
SOURCE_DATABASE_PASSWORD='password'

# Source databases that will be dumped.
SOURCE_ENTRADA='entrada'
SOURCE_ENTRADA_AUTH='entrada_auth'
SOURCE_ENTRADA_CLERKSHIP='entrada_clerkship'

# Destination database server connection information.
export DESTINATION_DATABASE_HOSTNAME='127.0.0.1'
export DESTINATION_DATABASE_USERNAME='root'
export DESTINATION_DATABASE_PASSWORD='password'

# Destination databases that will be used.
export DESTINATION_ENTRADA='stg_entrada'
export DESTINATION_ENTRADA_AUTH='stg_entrada_auth'
export DESTINATION_ENTRADA_CLERKSHIP='stg_entrada_clerkship'

# Drop and recreate the destination databases.
if [ ${RUN_DROP_DATABASES} == 1 ]; then
    ${MYSQL_PATH}/mysql -h${DESTINATION_DATABASE_HOSTNAME} -u${DESTINATION_DATABASE_USERNAME} -p${DESTINATION_DATABASE_PASSWORD} -e "DROP DATABASE $DESTINATION_ENTRADA; DROP DATABASE $DESTINATION_ENTRADA_AUTH; DROP DATABASE $DESTINATION_ENTRADA_CLERKSHIP;"
    ${MYSQL_PATH}/mysql -h${DESTINATION_DATABASE_HOSTNAME} -u${DESTINATION_DATABASE_USERNAME} -p${DESTINATION_DATABASE_PASSWORD} -e "CREATE DATABASE $DESTINATION_ENTRADA; CREATE DATABASE $DESTINATION_ENTRADA_AUTH; CREATE DATABASE $DESTINATION_ENTRADA_CLERKSHIP;"
fi

# Dump source data and restore to the destination databases.
${MYSQL_PATH}/mysqldump -h${SOURCE_DATABASE_HOSTNAME} -u${SOURCE_DATABASE_USERNAME} -p${SOURCE_DATABASE_PASSWORD} --add-drop-table ${SOURCE_ENTRADA} | ${MYSQL_PATH}/mysql -h${DESTINATION_DATABASE_HOSTNAME} -u${DESTINATION_DATABASE_USERNAME} -p${DESTINATION_DATABASE_PASSWORD} ${DESTINATION_ENTRADA}
${MYSQL_PATH}/mysqldump -h${SOURCE_DATABASE_HOSTNAME} -u${SOURCE_DATABASE_USERNAME} -p${SOURCE_DATABASE_PASSWORD} --add-drop-table ${SOURCE_ENTRADA_AUTH} | ${MYSQL_PATH}/mysql -h${DESTINATION_DATABASE_HOSTNAME} -u${DESTINATION_DATABASE_USERNAME} -p${DESTINATION_DATABASE_PASSWORD} ${DESTINATION_ENTRADA_AUTH}
${MYSQL_PATH}/mysqldump -h${SOURCE_DATABASE_HOSTNAME} -u${SOURCE_DATABASE_USERNAME} -p${SOURCE_DATABASE_PASSWORD} --add-drop-table ${SOURCE_ENTRADA_CLERKSHIP} | ${MYSQL_PATH}/mysql -h${DESTINATION_DATABASE_HOSTNAME} -u${DESTINATION_DATABASE_USERNAME} -p${DESTINATION_DATABASE_PASSWORD} ${DESTINATION_ENTRADA_CLERKSHIP}

if [ ${RUN_SCRUB_SCRIPT} == 1 ]; then
    # Scrub various user data elements.
    ${PHP_PATH}/php ${SCRUB_DIRECTORY}/scrub.php
fi
