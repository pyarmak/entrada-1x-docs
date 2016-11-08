# Getting Started

## System Requirements

Entrada does not have heavy system requirements and will run on most web-hosting stacks without issue. Entrada is considered platform independent and will run on most operating systems including Mac OS, Linux, and Unix.

### Overall Requirements

* **Apache 2.2+** including ability to use .htaccess and mod_rewrite
* **PHP 5.3+** must be running as an Apache module 
* **MySQL 5.1+** or variant including MariaDB

Our recommended operating system is Red Hat Enterprise / CentOS Linux. Entrada is largely operating system independent, but unfortunately will not run on Windows at this time.

## Becoming a Contributor

To contribute any changes to Entrada you must first complete and submit a [Contributors License Agreement](http://www.entrada-project.org/wp-content/uploads/Entrada-CLA.pdf), which provides legal protection for the rest of the Entrada community. You must also register an account at [GitHub](https://github.com) that we can give access to the EntradaProject GitHub organization.

Please submit your CLA and GitHub username via e-mail to [cla@entrada-project.org](mailto:cla@entrada-project.org) for approval. Once your contributor request has been approved, you will be sent a confirmation.

Once you have permission to contribute to the Entrada repository, you can commit new features or fixes to a local  `feature` or `hotfix` Git branch, and then push the branch that to the our `entrada-1x-me` repository on GitHub when you are ready to share. Once your completed feature branch is in the `entrada-1x-me` repository create a Pull Request to our `develop` branch, and we will initiate a code review.

## Workstation Setup

There is no specific setup required for developing Entrada, but there are a number of tools that work well for Entrada consortium members and can be used as a starting point to finding your preferred way of working. Platform availabiity is noted for each of the packages.

Recommended tools:

- [Apple Xcode](https://developer.apple.com/xcode) + command line tools (Mac)
- [Araxis Merge Professional Edition](http://www.araxis.com/merge/) for comparing git repo's (Mac, PC)
- [Atlassian SourceTree](http://www.sourcetreeapp.com/) to visually manage local Git repositories (Mac, PC)
- [PhpStorm](http://www.jetbrains.com/phpstorm/) is the Entrada Consortium recommended IDE (Mac, PC, Linux)
- [Zend Server Developer Edition](http://www.zend.com/en/products/server/downloads) PHP/Apache/MySql stack (MAC, PC, Linux)

Zend server configuration:

- Request an OSS license for Zend Server from the [developer editions](http://www.zend.com/en/products/server/developer-editions-comparison) page.
- Once you have installed Zend Server, visit http://localhost:10081 to set your password and access the administrative interface.
    * Click Administration > License and enter the license detail
    * Click PHP > Extensions, then search for and change the following PHP settings:
```
error_reporting | E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED
upload_max_filesize | 250M
post_max_size | 250M
expose_php | off
```
- Open up Terminal and edit the Apache configuration file:
```
sudo vi /usr/local/zend/apache2/conf/httpd.conf

# Near the top of the file change the Apache Listen port from 10088 to 80:
Listen 80

# Near the bottom of the file change the NameVirtualHost and VirtualHost from 10088 to 80:

NameVirtualHost *:80
<VirtualHost *:80>

# Restart Apache in Terminal by typing:
sudo /usr/local/zend/bin/zendctl.sh restart-apache
```
- After cloning the Entrada source code, set up a virtual host in the Administration > Applications > Virtual Hosts section, so that Zend Server will host the Entrada website.

## Installing Entrada

The Entrada (ME and CPD) source code should be obtained via Git source control management, currently hosted on GitHub. In order to obtain **write access** to our repositories, you **must** have a signed Contributor License Agreement on file with us. For more information on contributing to Entrada see the above **Becoming a Contributor** section.

### Prerequisites 

* Please ensure that before you begin you have the **System Requirements** fully addressed.
* Create 3 databases on your MySQL server `entrada`, `entrada_auth`, and `entrada_clerkship`. Also create a new MySQL user account with privileges to access these 3 databases.
```
CREATE DATABASE `entrada` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE `entrada_auth` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE `entrada_clerkship` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER 'entrada'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON entrada.* TO 'entrada'@'localhost';
GRANT ALL ON entrada_auth.* TO 'entrada'@'localhost';
GRANT ALL ON entrada_clerkship.* TO 'entrada'@'localhost';
```

### Installing from Git

To begin, clone the Entrada ME repository into a web-accessible directory or new virtual host on your computer:
```
cd ~/Sites
git clone git@github.com:EntradaProject/entrada-1x-me.git
```

### Setting Up for Development

Ensure that you have the develop branch checked out, and install Composer as well as our dependencies:
```
cd entrada-1x-me
git checkout develop
curl -sS https://getcomposer.org/installer | php
php composer.phar update
```

Now visit your Entrada installation in your web-browser to proceed: http://entrada-me.dev

### Deployment with Capistrano

If you are deploying Entrada to a production or staging server, capistrano can provide a reliable methodology that lets you push new releases and roll-back from the command line

#### Prerequisites
- Mac OS S 10.6+
- Ruby 1.8 or higher
```
ruby -v
```
- Ruby Gems 1.3 or higher
```
gem -v
```

#### Installation & Recipe Setup
Before deploying applications, install the Capistrano and GNM-Caplock gems:
```
sudo gem install capistrano -v 2.15.9
sudo gem install colorize
sudo gem install sshkit
sudo gem install gnm-caplock
```
You must install the last release of version 2 of Capistrano (as indicated in the code block above) in order to run the recipes.
The deployment recipe exists in your ~/Sites/entrada-1x-me/deployment directory.

Edit the config/deploy.rb to put in the hostnames of the production and staging servers, and the associated git repository information for each.

#### Deployment
To deploy a release, use the terminal and navigate to the deployment directory
```
cd ~/Sites/entrada-1x-me/deployment
# deploy to staging
cap staging deploy
# deploy to production
cap production deploy
# rollback to the previous release
cap production deploy:rollback
```