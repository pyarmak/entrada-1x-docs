# Getting Started

## System Requirements

Entrada does not have heavy system requirements and will run on most web-hosting stacks without issue. Entrada is considered platform independent and will run on most operating systems including Mac OS, Linux, and Unix.

### Overall Requirements

* **Apache 2.2+** including ability to use .htaccess and mod_rewrite
* **PHP 5.6.4+** must be running as an Apache module 
* **MariaDB 5.1+** or variant including MySQL.

Our recommended operating system is Red Hat Enterprise / CentOS Linux. Entrada is largely operating system independent, but unfortunately will not run on Windows at this time.

## Becoming a Contributor

To contribute anything to Entrada you must first complete and submit a [Contributors License Agreement](https://entrada.org/wp-content/uploads/Entrada-CLA.pdf), which provides legal protection for the Entrada community. You must also register an account at [GitHub](https://github.com) that we can give access to the EntradaProject GitHub organization.

Please submit your CLA and GitHub username via e-mail to [cla@entrada.org](mailto:cla@entrada.org) for approval. Once your contributor request has been approved, you will be sent a confirmation.

Once you have permission to contribute to the Entrada repository, you can commit new features or fixes to a local `feature` or `hotfix` Git branch, and then push the branch that to the our `entrada-1x-me` repository on GitHub when you are ready to share. Once your completed feature branch is in the `entrada-1x-me` repository create a Pull Request to our `develop` branch, and we will initiate a code review.

## Workstation Setup

While there is no specific workstation tooling / configuration required for development within the Entrada Platform (beyond a LAMP stack), there are a number of technologies used by Entrada Consortium developers that dramatically increase productivity and reliability. The vast majority of these applications are available for Mac, Windows, and Linux workstations.

### Virtualization Layer

| Operating System        | Technology                                                  | Notes                                                                                                           |
| ----------------------- | ----------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------- | 
| macOS 10.10.3+          | [Docker for Mac](https://www.docker.com/docker-mac)         | [Setup documentation](https://github.com/EntradaProject/entrada-1x-docs/tree/master/resources/docker).   | 
| Windows 10+             | [Docker for Windows](https://www.docker.com/docker-windows) | [Setup documentation](https://github.com/EntradaProject/entrada-1x-docs/tree/master/resources/docker).   | 
| Older macOS / Windows 7 | [Vagrant](https://www.vagrantup.com) + [VirtualBox](https://www.virtualbox.org) | [Setup documentation](https://github.com/EntradaProject/entrada-1x-docs/tree/master/resources/vagrant). | 

### Highly Recommended Software Stack

| Category         | Software                                                    | macOS | Windows | Linux |
| ---------------- | ----------------------------------------------------------- | ----- | ------- | ----- |
| SCM              | [Git for Windows](https://git-scm.com/downloads)            |       | X       |       |
| Git Client       | [SourceTree](https://www.sourcetreeapp.com)                 | X     | X       |       |  
| Git Client       | [GitKracken](https://www.gitkraken.com)                     |       |         | X     |
| MariaDB GUI      | [Sequel Pro](https://sequelpro.com)                         | X     |         |       |
| MariaDB GUI      | [MySQL Workbench](https://www.mysql.com/products/workbench) | X     | X       | X     |
| IDE              | [PhpStorm](https://www.jetbrains.com/phpstorm)              | X     | X       | X     |

*Please Note: You only need to have one per category.*

### Additional Recommended Software

| Category         | Software                                                    | macOS | Windows | Linux |
| ---------------- | ----------------------------------------------------------- | ----- | ------- | ----- |
| API Client       | [Postman](https://www.getpostman.com)                       | X     | X       | X     |
| Visual Diff      | [Araxis Merge](https://www.araxis.com/merge)                | X     | X       |       |  
| Visual Diff      | [Meld Merge](http://meldmerge.org)                          | X     | X       |       |  
| Visual Diff      | [Beyond Compare](https://www.scootersoftware.com)           | X     | X       | X     |
| Text Editor      | [Atom](https://atom.io)                                     | X     | X       |       |
| Text Editor      | [Sublime Text](https://www.sublimetext.com)                 | X     | X       | X     |
| Diagram Designer | [DbSchema](https://www.dbschema.com)                        | X     | X       | X     |

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
git clone git@github.com:EntradaProject/entrada-1x-me.git entrada-1x-me.dev
```

### Setting Up for Development

Ensure that you have the develop branch checked out, and install Composer as well as our dependencies:
```
cd entrada-1x-me.dev
git checkout develop
curl -sS https://getcomposer.org/installer | php
php composer.phar update
```

Now visit your Entrada installation in your web-browser to proceed: http://entrada-1x-me.dev

## Deploying Entrada

Capistrano provides a consistent and reliable methodology that lets you deploy and roll-back new releases to your staging and production servers from your command line.

#### Prerequisites
- Ruby 1.8 or higher
- Ruby Gems 1.3 or higher
- Capistrano 2.15

#### Installation
Install the Capistrano and a few associated Ruby Gems:
```
sudo gem install capistrano -v 2.15.9
sudo gem install colorize
sudo gem install sshkit
sudo gem install gnm-caplock
```

**Please Note:** You must install Capistrano 2 (as indicated in the code block above) in order to run the standard Entrada deployment recipes.

#### Deployment

This example assumes that your deployment directory is located at `~/Sites/entrada-1x-me.dev/deployment`. Your deployment recipe exists within the `config/deploy.rb` directory. Please make sure that this file accurately reflects your hostnames and Git repository location.

To deploy a release, use the terminal and navigate to the deployment directory
```
cd ~/Sites/entrada-1x-me.dev/deployment
# deploy to staging
cap staging deploy
# deploy to production
cap production deploy
# rollback to the previous release
cap production deploy:rollback
```
