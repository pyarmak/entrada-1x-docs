#!/usr/bin/env bash

if [ ! -f /var/lib/mysql/ibdata1 ]; then

	/usr/bin/mysql_install_db

	/usr/bin/mysqld_safe &
	sleep 5s

	/usr/bin/mysqladmin -u root password password

	/usr/bin/mysql -uroot -ppassword < /tmp/entrada.sql

	killall mysqld
	sleep 5s
fi

/usr/bin/mysqld_safe
