FROM centos:centos7

LABEL maintainer "Matt Simpson <simpson@queensu.ca>"

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
                wkhtmltopdf \
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
                php56u \
                php56u-mcrypt \
                php56u-gd \
                php56u-devel \
                php56u-mysql \
                php56u-intl \
                php56u-mbstring \
                php56u-pecl-xdebug \
                php56u-bcmath \
                php56u-ldap \
                php56u-imap \
                php56u-pspell \
                php56u-soap \
                php56u-xmlrpc \
                php56u-tidy \
                mariadb-client \
                mariadb-server

# Update PHP's configuration
RUN sed -i 's@;date.timezone =@date.timezone = '"$TZ"'@g' /etc/php.ini
RUN sed -i 's@display_errors = Off@display_errors = On@g' /etc/php.ini
RUN sed -i 's@error_reporting = E_ALL \& ~E_DEPRECATED \& ~E_STRICT@error_reporting = E_ALL \& ~E_NOTICE \& ~E_STRICT \& ~E_DEPRECATED@g' /etc/php.ini
RUN sed -i 's@upload_max_filesize = 2M@upload_max_filesize = 512M@g' /etc/php.ini
RUN sed -i 's@post_max_size = 8M@post_max_size = 512M@g' /etc/php.ini
RUN sed -i 's@memory_limit = 128M@memory_limit = 512M@g' /etc/php.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install default Apache configuration.
COPY apache/entrada-1x-me.dev.conf /etc/httpd/conf.d/entrada-1x-me.dev.conf

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

# Copy Supervisor configuration.
COPY supervisor/supervisord.conf /etc/supervisord.conf

# Create the MariaDB entrada user account and default databases.
COPY mariadb/entrada.sql /tmp
COPY mariadb/mariadb-start.sh /usr/bin
RUN chmod +x /usr/bin/mariadb-start.sh

CMD ["/usr/bin/supervisord"]
