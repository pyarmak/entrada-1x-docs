# Database Servers

This documentation can be used as a reference to create your **Primary Database Server** and optional **Slave Database Server** on **Red Hat Enterprise** or **CentOS 7.2** virtual machines.

The hostnames that will be referenced throughout this document will be `db01.med.university.edu` and `db02.med.university.edu`. These hostnames should be replaced by your actual DNS hostnames.

## Prerequisites

If your server infrastructure is configured such that you require the use of a proxy server for the server to access the external Internet, then please configure this before starting.

1. Set the /etc/environment variables:
        vim /etc/environment
        
        # Route all connectivity through the provided proxy server.
        http_proxy=http://your.proxy.university.edu:3128
        https_proxy=https://your.proxy.university.edu:3128
        
2. Configure Yum to use the proxy server:
        vim /etc/yum.conf
        
        # Add the following to [main]
        proxy=https://your.proxy.university.edu:3128

## Primary Database Server

1. SSH into server and `sudo` to root:

        ssh service@db01.med.university.edu
        sudo -s

2. Add the following lines to `/etc/hosts` file:

        127.0.0.1   db01.med.university.edu

3. Edit the hostname of the virtual machine in the `/etc/hostname` file:

        db01.med.university.edu
        
4. Install `screen`, update RHEL, and reboot:

        yum install screen
        screen
        yum update
        reboot

5. SSH back into server:

        ssh service@db01.med.university.edu
        sudo -s
        screen
        yum install https://centos7.iuscommunity.org/ius-release.rpm

6. Install MariaDB Client, Server, and NTP:

        yum install mariadb101u mariadb101u-server ntp

7. Create a new file `/etc/my.cnf.d/entrada.cnf` and the following in. But **do not forget** to enter a unique 8 digit number (i.e. 12359380) in the `server-id` variable.

        [mysqld]
        # MyISAM
        ft_min_word_len = 3
        
        # Innodb 
        innodb_buffer_pool_size = 2G       # main memory buffer of Innodb, very imporant
        innodb_log_file_size = 256M        # transactional journal size 
        innodb_flush_method = O_DIRECT       # avoid double buffering with the OS
        innodb_flush_log_at_trx_commit = 2 # writes to OS, fsynced once per second
        innodb_buffer_pool_load_at_startup = on
        innodb_buffer_pool_dump_at_shutdown = on
        innodb_ft_min_token_size = 3
        
        # Basic Settings 
        thread_cache_size = 8
        table_open_cache = 4000
        table_definition_cache = 1500
        query_cache_size = 32M
        query_cache_type = 1
        max_allowed_packet = 8388608
        
        # Replication
        server_id = UNIQUE-8-DIGIT-NUMBER # the ip address of the server is a good idea without dots.
        log_bin = /var/lib/mysql/mysql-bin
        expire_logs_days = 14
        sync_binlog = 4 # 1: with every transaction 4 or 5: every 4th or 5th transaction.
        
        # Slow Query Logging / Tuning
        slow_query_log = on
        slow_query_log_file = /var/log/mysqld-slow-queries.log
        log_slow_verbosity = 'innodb,query_plan'
        long_query_time = 7
        performance_schema = on        

8. Start MariaDB, and set to start on system startup:

        systemctl enable mariadb.service
        systemctl start mariadb.service

9. Run the `mysql_secure_installation` script included with MariaDB to further lock down your database server.

        /usr/bin/mysql_secure_installation

    Here is an example of a `mysql_secure_installation` hardening:

        [root@db01]# /usr/bin/mysql_secure_installation
        /usr/bin/mysql_secure_installation: line 379: find_mysql_client: command not found
        
        NOTE: RUNNING ALL PARTS OF THIS SCRIPT IS RECOMMENDED FOR ALL MariaDB
              SERVERS IN PRODUCTION USE!  PLEASE READ EACH STEP CAREFULLY!
        
        In order to log into MariaDB to secure it, we'll need the current
        password for the root user.  If you've just installed MariaDB, and
        you haven't set the root password yet, the password will be blank,
        so you should just press enter here.
        
        Enter current password for root (enter for none): 
        OK, successfully used password, moving on...
        
        Setting the root password ensures that nobody can log into the MariaDB
        root user without the proper authorisation.
        
        Set root password? [Y/n] Y
        New password: 
        Re-enter new password: 
        Password updated successfully!
        Reloading privilege tables..
         ... Success!
        
        
        By default, a MariaDB installation has an anonymous user, allowing anyone
        to log into MariaDB without having to have a user account created for
        them.  This is intended only for testing, and to make the installation
        go a bit smoother.  You should remove them before moving into a
        production environment.
        
        Remove anonymous users? [Y/n] Y
         ... Success!
        
        Normally, root should only be allowed to connect from 'localhost'.  This
        ensures that someone cannot guess at the root password from the network.
        
        Disallow root login remotely? [Y/n] Y
         ... Success!
        
        By default, MariaDB comes with a database named 'test' that anyone can
        access.  This is also intended only for testing, and should be removed
        before moving into a production environment.
        
        Remove test database and access to it? [Y/n] Y
         - Dropping test database...
         ... Success!
         - Removing privileges on test database...
         ... Success!
        
        Reloading the privilege tables will ensure that all changes made so far
        will take effect immediately.
        
        Reload privilege tables now? [Y/n] Y
         ... Success!
        
        Cleaning up...
        
        All done!  If you've completed all of the above steps, your MariaDB
        installation should now be secure.
        
        Thanks for using MariaDB!

10. Connect to MariaDB as the root user:

        mysql -uroot -p

11. Create the required `entrada`, `entrada_auth`, and `entrada_clerkship` databases as well as an `entrada` user that can connect to these databases. **DO NOT FORGET** that you need to enter a password on the CREATE USER line.  

        CREATE DATABASE `entrada`;
        CREATE DATABASE `entrada_auth`;
        CREATE DATABASE `entrada_clerkship`;
         -- DO NOT FORGET to change the password in the following line.
        CREATE USER 'entrada'@'%' IDENTIFIED BY 'your-password-needs-to-go-here';
        UPDATE mysql.user SET max_questions = 0, max_updates = 0, max_connections = 0 WHERE User = 'entrada' AND Host = '%';
        REVOKE CREATE ROUTINE, CREATE VIEW, CREATE USER, ALTER, SHOW VIEW, CREATE, ALTER ROUTINE, EVENT, SUPER, INSERT, RELOAD, SELECT, DELETE, FILE, SHOW DATABASES, TRIGGER, SHUTDOWN, REPLICATION CLIENT, GRANT OPTION, PROCESS, REFERENCES, UPDATE, DROP, REPLICATION SLAVE, EXECUTE, LOCK TABLES, CREATE TEMPORARY TABLES, INDEX ON *.* FROM 'entrada'@'%';
        SELECT USER, HOST FROM mysql.db WHERE USER = 'entrada' AND HOST = '%' AND DB = 'entrada\_auth';
        GRANT CREATE ROUTINE, CREATE VIEW, ALTER, SHOW VIEW, CREATE, ALTER ROUTINE, EVENT, INSERT, SELECT, DELETE, TRIGGER, REFERENCES, UPDATE, DROP, EXECUTE, LOCK TABLES, CREATE TEMPORARY TABLES, INDEX ON `entrada\_auth`.* TO 'entrada'@'%';
        REVOKE GRANT OPTION ON `entrada\_auth`.* FROM 'entrada'@'%';
        SELECT USER, HOST FROM mysql.db WHERE USER = 'entrada' AND HOST = '%' AND DB = 'entrada\_clerkship';
        GRANT CREATE ROUTINE, CREATE VIEW, ALTER, SHOW VIEW, CREATE, ALTER ROUTINE, EVENT, INSERT, SELECT, DELETE, TRIGGER, REFERENCES, UPDATE, DROP, EXECUTE, LOCK TABLES, CREATE TEMPORARY TABLES, INDEX ON `entrada\_clerkship`.* TO 'entrada'@'%';
        REVOKE GRANT OPTION ON `entrada\_clerkship`.* FROM 'entrada'@'%';
        SELECT USER, HOST FROM mysql.db WHERE USER = 'entrada' AND HOST = '%' AND DB = 'entrada';
        GRANT CREATE ROUTINE, CREATE VIEW, ALTER, SHOW VIEW, CREATE, ALTER ROUTINE, EVENT, INSERT, SELECT, DELETE, TRIGGER, REFERENCES, UPDATE, DROP, EXECUTE, LOCK TABLES, CREATE TEMPORARY TABLES, INDEX ON `entrada`.* TO 'entrada'@'%';
        REVOKE GRANT OPTION ON `entrada`.* FROM 'entrada'@'%';
        FLUSH PRIVILEGES;

12. If you plan to setup the Slave Database Server, then you should create and a `repl` database user that can connect from the `db02` server. **DO NOT FORGET** that you need to enter a password on the GRANT REPLICATION SLAVE line.

        GRANT REPLICATION SLAVE ON *.* TO 'repl'@'db02.med.university.edu' IDENTIFIED BY 'your-password-needs-to-go-here';

13. Make note of the master log file (i.e. `mysql-bin.000002`) as you will need it when configuring the slave.

        SHOW MASTER STATUS \G

## Slave Database Server

1. SSH into server and `sudo` to root:

        ssh service@db02.med.university.edu
        sudo -s

2. Add the following lines to `/etc/hosts` file:

        127.0.0.1   db02.med.university.edu

3. Edit the hostname of the virtual machine in the `/etc/hostname` file:

        db02.med.university.edu

4. Install `screen`, update RHEL, and reboot:

        yum install screen
        screen
        yum update
        reboot

5. SSH back into server:

        ssh service@db02.med.university.edu
        sudo -s
        screen

6. Install MariaDB Client and Server:

        yum install mariadb mariadb-server

7. Add the following to the `mysqld` section of `/etc/my.cnf`, but **don't forget** to enter a unique 8 digit number (i.e. 12359380) in the `server-id` variable.

        slow-query-log = 1
        long_query_time = 7
        expire_logs_days = 14
        slow_query_log_file = /var/log/mysqld-slow-queries.log
        server-id = RANDOM-UNIQUE-8-DIGIT-NUMBER
        log_bin = /var/lib/mysql/mysql-bin
        sync_binlog = 1
        query_cache_size = 32M
        ft_min_word_len = 3
        max_allowed_packet = 8388608

8. Start MariaDB, and set to start on system startup:

        systemctl enable mariadb.service
        systemctl start mariadb.service

9. Run the `mysql_secure_installation` script included with MariaDB to further lock down your database server.

        /usr/bin/mysql_secure_installation

    Here is an example of a `mysql_secure_installation` hardening:

        [root@db02]# /usr/bin/mysql_secure_installation
        /usr/bin/mysql_secure_installation: line 379: find_mysql_client: command not found
        
        NOTE: RUNNING ALL PARTS OF THIS SCRIPT IS RECOMMENDED FOR ALL MariaDB
              SERVERS IN PRODUCTION USE!  PLEASE READ EACH STEP CAREFULLY!
        
        In order to log into MariaDB to secure it, we'll need the current
        password for the root user.  If you've just installed MariaDB, and
        you haven't set the root password yet, the password will be blank,
        so you should just press enter here.
        
        Enter current password for root (enter for none): 
        OK, successfully used password, moving on...
        
        Setting the root password ensures that nobody can log into the MariaDB
        root user without the proper authorisation.
        
        Set root password? [Y/n] Y
        New password: 
        Re-enter new password: 
        Password updated successfully!
        Reloading privilege tables..
         ... Success!
        
        
        By default, a MariaDB installation has an anonymous user, allowing anyone
        to log into MariaDB without having to have a user account created for
        them.  This is intended only for testing, and to make the installation
        go a bit smoother.  You should remove them before moving into a
        production environment.
        
        Remove anonymous users? [Y/n] Y
         ... Success!
        
        Normally, root should only be allowed to connect from 'localhost'.  This
        ensures that someone cannot guess at the root password from the network.
        
        Disallow root login remotely? [Y/n] Y
         ... Success!
        
        By default, MariaDB comes with a database named 'test' that anyone can
        access.  This is also intended only for testing, and should be removed
        before moving into a production environment.
        
        Remove test database and access to it? [Y/n] Y
         - Dropping test database...
         ... Success!
         - Removing privileges on test database...
         ... Success!
        
        Reloading the privilege tables will ensure that all changes made so far
        will take effect immediately.
        
        Reload privilege tables now? [Y/n] Y
         ... Success!
        
        Cleaning up...
        
        All done!  If you've completed all of the above steps, your MariaDB
        installation should now be secure.
        
        Thanks for using MariaDB!

10. Connect to MariaDB as the root user:

        mysql -uroot -p

11. Tell the slave server to replicate from your `db01` master, then start the slave. **DO NOT FORGET** that you need to enter the password on the `CHANGE MASTER` line.

        CHANGE MASTER TO MASTER_HOST='db01.med.university.edu', MASTER_USER='repl', MASTER_PASSWORD='your-password-needs-to-go-here', MASTER_LOG_FILE='mysql-bin.000002';
        START SLAVE;
