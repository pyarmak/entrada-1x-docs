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

@TODO

## Obtaining Entrada

The Entrada (ME and CPD) source code should be obtained via Git source control management, currently hosted on GitHub. In order to obtain **write access** to our repositories, you **must** have a signed Contributor License Agreement on file with us. For more information on contributing to Entrada see the above **Becoming a Contributor** section.

To begin, clone the Entrada repository. This example illustrates Entrada ME:
```
git clone git@github.com:EntradaProject/entrada-1x-me.git
```

### Setting Up for Development

Ensure that you have the develop branch checked out; install Composer:

```
cd entrada-1x-me
git checkout develop
curl -sS https://getcomposer.org/installer | php
php composer.phar update
```

## Installing Entrada

### Prerequisites 

* Please ensure that before you begin you have the **System Requirements** fully addressed.
* Create 3 databases on your MySQL server `entrada`, `entrada_auth`, and `entrada_clerkship`. Also create a new MySQL user account with privileges to access these 3 databases.

### Installing from Git

To begin, clone the Entrada ME repository into a web-accessible directory or new virtual host on your computer:
```
cd ~/Sites
git clone git@github.com:EntradaProject/entrada-1x-me.git
```

Ensure that you have the develop branch checked out, and install Composer as well as our dependencies:
```
cd entrada-1x-me
git checkout develop
curl -sS https://getcomposer.org/installer | php
php composer.phar update
```

Now visit your Entrada installation in your web-browser to proceed: http://entrada-me.dev

