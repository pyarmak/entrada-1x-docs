# Overview

## Entrada Git Repository

The Entrada Git repository follows "GitFlow" based on [this successful Git branching model](http://nvie.com/posts/a-successful-git-branching-model/). For more information on working with the Entrada Git repository please see the [Managing Entrada Source Code](http://www.entrada-project.org/managing-source-code) section of our website.

A simple summary is as follows:
 1. No changes are ever committed to the master branch.
 2. All development work in the develop branch, or a feature branch branched off develop and merged back in.
 3. All releases are given a feature-frozen release-x.y.z tag.

## Directory Structure

Entrada is a large PHP application that includes many different folders, files, libraries, and classes. This page will provide a brief introduction to the structure Entrada's codebase.

### Root Directory

In the root level Entrada directory there are two directories:

* `developers` Contains Entrada documentation, automated testing, raw structural SQL and legacy upgrade files, and command line PHP scripts, useful for things like seed data to populate a demo install, import tools, and data export.
* `www-root` Contains the web facing PHP code which drives the application.

### Web Root

`www-root` is where the vast majority of development is done. Entrada adheres to an MVC architecture.

Most requests to Entrada are dealt with by controller file in the `www-root` directory. This controller is passed a request by Apache's `mod_rewrite`, and then includes the appropriate files to deal with the request.

* `index.php` The main controller file for the application. All public requests are routed through this file by `mod_rewrite`. This file sets up the Entrada PHP environment by including the settings files, database libraries and connection files, and authentication and access control libraries. This file is also responsible for login and logout.
* `admin.php` The auxiliary administration controller. All requests made to the administration side of Entrada (`/admin` in the URL) are routed through this controller. Like index.php, it sets up the Entrada environment, and includes the appropriate files to handle the request. Each of these controllers is responsible for including files to deal with requests. These files are found in the core folder.
* `core` Contains the PHP code for the Entrada modules, configuration, and library for 3rd party libraries like Zend Framework and ADODB.
    * `config` Contains `config.inc.php` which defines the host environment, and `settings.inc.php`, which defines settings affecting Entrada's behaviour.
    * `includes` Contains high level PHP support code for the access control `(acl.inc.php)`, cache `(cache.inc.php)`, database connection, `(dbconnection.inc.php)`, site wide functions `(functions.inc.php)`, and initialization code `(init.inc.php)`.
    * `library` Contains code libraries used across the site. Small libraries written for or included in Entrada reside in `Entrada`, while Zend Framework stable resides in `Zend`.
    * `modules` Contains most Entrada modules (controllers and views) for the public and admin sections of Entrada. Each module has it's own controller, and folder which contains code for specific actions inside that module.
    * `storage` Used by Entrada during everyday operation to store temporary files, logs, and uploads.

Other files/folders in `www-root`:

* `api` Contains single execution *API* style PHP files which are executed outside the context of the MVC setup.
* `authentication` Contains Entrada's custom multi application authentication server.
* `community` Contains Entrada's self-contained community system. See Communities System Code Overview for more information.
* `cron` Contains the command line PHP scripts needed for execution by cron for correct operation of Entrada.
* `setup` Contains the PHP installer for Entrada. Should be deleted after successful installation of Entrada.
* `templates` Contains specialized (different than the default) templates for production instances of Entrada.

## User Permissions
