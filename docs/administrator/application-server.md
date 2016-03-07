# Application Server

This documentation can be used as a reference to create both your **Production Application Server** and **Staging Application Server** on a single **Red Hat Enterprise** or **CentOS 7.2** virtual machine. This is achieved by using SNI within Apache 2. A word of caution, this setup will cause Internet Explorer on Windows XP to produce SSL certificate warnings.

The hostnames that will be referenced throughout this document will be `entrada.med.university.edu` and `staging.med.university.edu`. These hostnames should be replaced by your actual DNS hostnames.

1. SSH into server and `sudo` to root:
```bash
ssh service@entrada.med.university.edu
sudo -s
```

2. Change the SELINUX variable in `/etc/selinux/config` to permissive to prevent unforeseen and difficult to diagnose issues:
```bash
SELINUX=permissive
```

3. Add the following lines to `/etc/hosts` file:
```bash
127.0.0.1   entrada.med.university.edu
127.0.0.1   staging.med.university.edu
```

4. Edit the hostname of the virtual machine in the `/etc/hostname` file:
```bash
entrada.med.university.edu
```

5. Install `screen`, update RHEL, and reboot:
```bash
yum install screen
screen
yum update
reboot
```

6. SSH back into server, and install Extra Packages for Enterprise Linux (EPEL):
```
ssh service@entrada.med.university.edu
sudo -s
screen
yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
```

7. Install Apache, OpenSSL, PHP, Git, HTMLDoc, wkhtmltopdf, mariadb (client), and ClamAV packages:
```bash
yum install openssl httpd mod_ssl php-mysql php php-gd php-imap php-ldap php-mbstring php-mcrypt php-pdo php-pspell php-soap php-xml php-xmlrpc htmldoc wkhtmltopdf git php-pecl-zendopcache mariadb clamav
```

8. Start Apache, and set to start on system startup:
```bash
systemctl enable httpd.service
systemctl start httpd.service
```

9. Find and change the following directives in the `/etc/php.ini` file:
```bash
error_reporting = E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT
upload_max_filesize = 250M
post_max_size = 250M
```

10. Create an Entrada system user called `production`, which is used for production deployments:
```bash
useradd -m production
passwd production
```

11. Create and permission the SSH `authorized_keys` file for the `production` user.
```bash
cd /home/production
mkdir /home/production/.ssh
touch /home/production/.ssh/authorized_keys
chown -R production:production /home/production/.ssh
chmod 700 /home/production/.ssh
chmod 644 /home/production/.ssh/authorized_keys
```

12. Add all developers' SSH public keys (i.e. `cat ~/.ssh/id_rsa.pub`) that are allowed to deploy Entrada to your production environment to the new `authorized_keys` file.
```bash
vi /home/production/.ssh/authorized_keys
```

13. Create an Entrada system user called `staging`, which is used for staging deployments:
```bash
useradd -m staging
passwd staging
```

14. Create and permission the SSH `authorized_keys` file for the `staging` user.
```bash
cd /home/staging
mkdir /home/staging/.ssh
touch /home/staging/.ssh/authorized_keys
chown -R staging:staging /home/staging/.ssh
chmod 700 /home/staging/.ssh
chmod 644 /home/staging/.ssh/authorized_keys
```

15. Add all developers' SSH public keys (i.e. `cat ~/.ssh/id_rsa.pub`) that are allowed to deploy Entrada to your staging environment to the new `authorized_keys` file.
```bash
vi /home/staging/.ssh/authorized_keys
```

16. Create and appropriately permission the Apache document root and Entrada storage directories for production.
```bash
mkdir -p /var/www/vhosts/entrada.med.university.edu/storage/
chown -R production:production /var/www/vhosts/entrada.med.university.edu
mkdir /var/www/vhosts/entrada.med.university.edu/storage/annualreports
mkdir /var/www/vhosts/entrada.med.university.edu/storage/cache
mkdir /var/www/vhosts/entrada.med.university.edu/storage/community-galleries
mkdir /var/www/vhosts/entrada.med.university.edu/storage/community-shares
mkdir /var/www/vhosts/entrada.med.university.edu/storage/eportfolio
mkdir /var/www/vhosts/entrada.med.university.edu/storage/event-files
mkdir /var/www/vhosts/entrada.med.university.edu/storage/logs
mkdir /var/www/vhosts/entrada.med.university.edu/storage/lor
mkdir /var/www/vhosts/entrada.med.university.edu/storage/user-photos
chmod 755 /var/www/vhosts/entrada.med.university.edu/storage/*
chown apache:apache /var/www/vhosts/entrada.med.university.edu/storage/*
```

17. Create and appropriately permission the Apache document root and Entrada storage directories for staging.
```bash
mkdir -p /var/www/vhosts/staging.med.university.edu/storage/
chown -R staging:staging /var/www/vhosts/staging.med.university.edu
mkdir /var/www/vhosts/staging.med.university.edu/storage/annualreports
mkdir /var/www/vhosts/staging.med.university.edu/storage/cache
mkdir /var/www/vhosts/staging.med.university.edu/storage/community-galleries
mkdir /var/www/vhosts/staging.med.university.edu/storage/community-shares
mkdir /var/www/vhosts/staging.med.university.edu/storage/eportfolio
mkdir /var/www/vhosts/staging.med.university.edu/storage/event-files
mkdir /var/www/vhosts/staging.med.university.edu/storage/logs
mkdir /var/www/vhosts/staging.med.university.edu/storage/lor
mkdir /var/www/vhosts/staging.med.university.edu/storage/user-photos
chmod 755 /var/www/vhosts/staging.med.university.edu/storage/*
chown apache:apache /var/www/vhosts/staging.med.university.edu/storage/*
```

18. Generate the SSL private keys required for each of your hostnames:
```bash
mkdir -p /root/certificates/2016
cd /root/certificates/2016
openssl genrsa -out entrada.med.university.edu.key 2048
openssl genrsa -out staging.med.university.edu.key 2048
```

19. Generate the SSL certificate signing requests (CSRs) for your certificate authority for each of your hostnames:
```bash
openssl req -new -key entrada.med.university.edu.key -out entrada.med.university.edu.csr
openssl req -new -key staging.med.university.edu.key -out staging.med.university.edu.csr
```
You will be asked a number of questions, answer accordingly, but **do not** answer enter anything for "Email Address", "A challenge password", or "An optional company name":
```bash
You are about to be asked to enter information that will be incorporated
into your certificate request.
What you are about to enter is what is called a Distinguished Name or a DN.
There are quite a few fields but you can leave some blank
For some fields there will be a default value,
If you enter '.', the field will be left blank.
-----
Country Name (2 letter code) [XX]:CA
State or Province Name (full name) []:Ontario
Locality Name (eg, city) [Default City]:Kingston
Organization Name (eg, company) [Default Company Ltd]:Queen's University
Organizational Unit Name (eg, section) []:Health Sciences Education Technology Unit
Common Name (eg, your name or your server's hostname) []:entrada.med.university.edu
Email Address []:
Please enter the following 'extra' attributes
to be sent with your certificate request
A challenge password []:
An optional company name []:
```

20. If you have a valid Certificate Authority certificate, you should create a .crt file foreach hostname and paste in the certificate text:
```bash
vi /root/certificates/2016/entrada.med.university.edu.crt
vi /root/certificates/2016/staging.med.university.edu.crt
```
You will also likely have a certificate authority root chain certificate. Also paste this into a file called `ca-certificate.crt`.

21. If you are only creating self-signed certificates, you should do this for each hostname:
```bash
openssl x509 -req -days 365 -in entrada.med.university.edu.csr -signkey entrada.med.university.edu.key -out entrada.med.university.edu.crt
openssl x509 -req -days 365 -in staging.med.university.edu.csr -signkey staging.med.university.edu.key -out staging.med.university.edu.crt
```

22. Install the certificates in the Apache virtual host directory:
```bash
mkdir /var/www/vhosts/entrada.med.university.edu/cert/
cp /root/certificates/2016/entrada.med.university.edu.crt /var/www/vhosts/entrada.med.university.edu/cert/
cp /root/certificates/2016/entrada.med.university.edu.key /var/www/vhosts/entrada.med.university.edu/cert/
mkdir /var/www/vhosts/staging.med.university.edu/cert/
cp /root/certificates/2016/staging.med.university.edu.crt /var/www/vhosts/staging.med.university.edu/cert/
cp /root/certificates/2016/staging.med.university.edu.key /var/www/vhosts/staging.med.university.edu/cert/
```

23. Create the Apache VirtualHosts by creating a file named `entrada.conf` and placing it `/etc/httpd/conf.d/`. This file should contain the following:
```bash
<VirtualHost *:80>
    ServerName entrada.med.university.edu
    ServerAdmin sysadmin@med.university.edu
    DocumentRoot /var/www/vhosts/entrada.med.university.edu/current/www-root
    <Directory "/var/www/vhosts/entrada.med.university.edu/current/www-root">
        Options FollowSymLinks
        Order allow,deny
        Allow from all
        AllowOverride all
    </Directory>
</VirtualHost>
<VirtualHost *:443>
    ServerName entrada.med.university.edu:443
    ServerAdmin sysadmin@med.university.edu
    SSLEngine on
    SSLProtocol ALL -SSLv2 -SSLv3
    SSLHonorCipherOrder On
    SSLCipherSuite ECDH+AESGCM:DH+AESGCM:ECDH+AES256:DH+AES256:ECDH+AES128:DH+AES:ECDH+3DES:DH+3DES:RSA+AESGCM:RSA+AES:RSA+3DES:!aNULL:!MD5:!DSS
    SSLCertificateFile /var/www/vhosts/entrada.med.university.edu/cert/entrada.med.university.edu.crt
    SSLCertificateKeyFile /var/www/vhosts/entrada.med.university.edu/cert/entrada.med.university.edu.key
    #SSLCACertificateFile /var/www/vhosts/entrada.med.university.edu/cert/ca-certificate.crt
    SetEnvIf User-Agent ".*MSIE.*" \
     nokeepalive ssl-unclean-shutdown \
     downgrade-1.0 force-response-1.0
    DocumentRoot /var/www/vhosts/entrada.med.university.edu/current/www-root
    <Directory "/var/www/vhosts/entrada.med.university.edu/current/www-root">
        Options FollowSymLinks
        Order allow,deny
        Allow from all
        AllowOverride all
    </Directory>
</VirtualHost>
<VirtualHost *:80>
    ServerName staging.med.university.edu
    ServerAdmin sysadmin@med.university.edu
    DocumentRoot /var/www/vhosts/staging.med.university.edu/current/www-root
    <Directory "/var/www/vhosts/staging.med.university.edu/current/www-root">
        Options FollowSymLinks
        Order allow,deny
        Allow from all
        AllowOverride all
    </Directory>
</VirtualHost>
<VirtualHost *:443>
    ServerName staging.med.university.edu:443
    ServerAdmin sysadmin@med.university.edu
    SSLEngine on
    SSLProtocol ALL -SSLv2 -SSLv3
    SSLHonorCipherOrder On
    SSLCipherSuite ECDH+AESGCM:DH+AESGCM:ECDH+AES256:DH+AES256:ECDH+AES128:DH+AES:ECDH+3DES:DH+3DES:RSA+AESGCM:RSA+AES:RSA+3DES:!aNULL:!MD5:!DSS
    SSLCertificateFile /var/www/vhosts/staging.med.university.edu/cert/staging.med.university.edu.crt
    SSLCertificateKeyFile /var/www/vhosts/staging.med.university.edu/cert/staging.med.university.edu.key
    #SSLCACertificateFile /var/www/vhosts/staging.med.university.edu/cert/ca-certificate.crt
    SetEnvIf User-Agent ".*MSIE.*" \
     nokeepalive ssl-unclean-shutdown \
     downgrade-1.0 force-response-1.0
    DocumentRoot /var/www/vhosts/staging.med.university.edu/current/www-root
    <Directory "/var/www/vhosts/staging.med.university.edu/current/www-root">
        Options FollowSymLinks
        Order allow,deny
        Allow from all
        AllowOverride all
    </Directory>
</VirtualHost>
```

25. Test your new Apache configuration, and restart Apache.
```bash
apachectl configtest
systemctl restart httpd.service
```
