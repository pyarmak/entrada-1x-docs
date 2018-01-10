FROM centos:centos7

LABEL maintainer="Matt Simpson <simpson@queensu.ca>"

# You can connect to a bash shell on entrada-developer by typing:
# docker exec -it entrada-developer bash

# Set your specific Timezone
ENV TZ="America/Toronto"

# Sets Timezone in container.
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime

# Sets Networking in container.
RUN echo "NETWORKING=yes" > /etc/sysconfig/network

# Sets CentOS root password.
RUN echo root:password | chpasswd && yum install -y passwd

# Install Inline with Upstream Stable (IUS), which also enables EPEL.
RUN yum -y install https://centos7.iuscommunity.org/ius-release.rpm

# Install Python and Supervisor.
RUN yum -y install python-setuptools
RUN mkdir -p /var/log/supervisor
RUN easy_install supervisor

# Install Entrada Developer dependancies.
RUN yum -y install git \
                htmldoc \
                curl \
                wget \
                unzip \
                vim \
                nano \
                iproute \
                python-setuptools \
                hostname \
                inotify-tools \
                yum-utils \
                which \
                ruby \
                rubygems \
                exim \
                openssl \
                httpd \
                mod_ssl \
                mod_php71u \
                php71u-cli \
                php71u-mcrypt \
                php71u-gd \
                php71u-devel \
                php71u-mysqlnd \
                php71u-intl \
                php71u-mbstring \
                php71u-pecl-xdebug \
                php71u-bcmath \
                php71u-ldap \
                php71u-imap \
                php71u-pspell \
                php71u-soap \
                php71u-xmlrpc \
                php71u-tidy \
                php71u-opcache \
                php71u-json \
                mariadb101u \
                mariadb101u-server

# Install wkhtmltopdf from the binary package because the yum package provided by EPEL is broken.
RUN curl -SL https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.4/wkhtmltox-0.12.4_linux-generic-amd64.tar.xz | tar -xJC /root && cp /root/wkhtmltox/bin/* /usr/bin

# Update PHP's configuration
RUN sed -i 's@;date.timezone =@date.timezone = '"$TZ"'@g' /etc/php.ini
RUN sed -i 's@display_errors = Off@display_errors = On@g' /etc/php.ini
RUN sed -i 's@error_reporting = E_ALL \& ~E_DEPRECATED \& ~E_STRICT@error_reporting = E_ALL \& ~E_NOTICE \& ~E_STRICT \& ~E_DEPRECATED@g' /etc/php.ini
RUN sed -i 's@upload_max_filesize = 2M@upload_max_filesize = 512M@g' /etc/php.ini
RUN sed -i 's@post_max_size = 8M@post_max_size = 512M@g' /etc/php.ini
RUN sed -i 's@memory_limit = 128M@memory_limit = 512M@g' /etc/php.ini

# Set the container volumes.
VOLUME /var/lib/mysql
VOLUME /var/www/vhosts
VOLUME /etc/httpd/vhosts.d

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Tell Apache to include all of the virtual hosts
RUN echo "IncludeOptional vhosts.d/*.conf" >> /etc/httpd/conf/httpd.conf

# Install PHPMyAdmin
RUN yum -y install phpmyadmin
COPY apache/phpmyadmin.conf /etc/httpd/conf.d/phpmyadmin.conf

# Install Capistrano for deployment recipes.
RUN gem install capistrano -v 2.15.9
RUN gem install colorize
RUN gem install sshkit
RUN gem install gnm-caplock

EXPOSE 80
EXPOSE 443
EXPOSE 3306
EXPOSE 4444

# Copy Supervisor configuration.
COPY supervisor/supervisord.conf /etc/supervisord.conf

# Create the MariaDB entrada user account and default databases.
COPY mariadb/entrada.cnf /etc/my.cnf.d
COPY mariadb/entrada.sql /tmp
COPY mariadb/mariadb-start.sh /usr/bin
RUN chmod +x /usr/bin/mariadb-start.sh

# Add github.com to your known_hosts file.
RUN mkdir -p /root/.ssh && chmod 0700 /root/.ssh && ssh-keyscan github.com > /root/.ssh/known_hosts

# At this time there is no good way of automatically getting your SSH private key
# into the container. Most say it's a bad idea anyways, but most aren't using Docker
# the way that we are (i.e. entrada-developer) for a local development environment.
# Once this is running type this.
# docker exec -it entrada-developer bash
# cp /run/secrets/ssh_private_key /root/.ssh/id_rsa
# chmod 600 /root/.ssh/id_rsa

CMD ["/usr/bin/supervisord"]
