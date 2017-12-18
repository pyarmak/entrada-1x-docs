# Overview

## Git Repositories

The Entrada Platform is broken up into three applications: Entrada Admissions, Entrada ME, and Entrada CPD. We have a separate Git repository for each application.

### Open Edition
1. [Entrada ME](https://github.com/EntradaProject/entrada-1x) is referred to as `entrada-1x`.

### Consortium Edition
1. [Entrada Admissions](https://github.com/EntradaProject/entrada-1x-admissions) is referred to as `entrada-1x-admissions`.
2. [Entrada ME](https://github.com/EntradaProject/entrada-1x-me) is referred to as `entrada-1x-me`.
3. [Entrada CPD](https://github.com/EntradaProject/entrada-1x-cpd) is referred to as `entrada-1x-cpd`.

The Entrada Platform follows the "git flow" branching model based on [this successful Git branching model](http://nvie.com/posts/a-successful-git-branching-model/). Our branch structure in each repository looks like this:

### Master Branch

The `master` branch is the latest stable production release of Entrada. Developers will never commit to this branch as it is managed by the Entrada Consortium team.

### Develop Branch

The `develop` branch is the latest "stable" development release of the next planned release. This includes all of the approved feature branches that are going into our next release. The branch cannot officially be assumed stable, as instability will arise from time to time due to the constant approving and merging of Pull Requests.

### Release Branches

The `release/*` branches are a series of branches that contain previous major releases. For example, there are `release/1.9`, `release/1.10`, and `release/1.11` branches. These branches will also contain the next minor release of that particular point release. For example: 1.9.4, 1.10.3, 1.11.2, etc. 

### Feature Branches

The `feature/*` branches are a series of branches that contain new features that are being developed or maintained within our upstream repository. When the development in a feature branch is complete, the developers will create a "Pull Request" from the `feature` branch to the `develop` branch. Each completed Pull Request that is ready to be merged should be tagged with the `ready-for-code-review` label in GitHub, which indicates to the Entrada Consortium team that the code should undergo a code review and be merged into `develop`.

### Hotfix Branches

The `hotfix/*` branches are a series of branches that provide fixes for bugs within Entrada. When a bug in Entrada is discovered the discoverer should create an Issue in GitHub to identify the bug. If he/she is able to resolve the bug, a branch named something like `hotfix/bug-fix-name-1542` should be created to resolve that bug. Like feature branches, once the bug is resolved a Pull Request should be created and tagged with `ready-for-code-review` so that the Entrada Consortium team can review and merge in the fix.

## Directory Structure

Entrada ME is a large PHP application that includes many different folders, files, and libraries. This will provide developers with a brief introduction to the structure Entrada's codebase.

    LICENSE
    README.md
    composer.json
    developers
        acceptance-tests
        documentation
        functional-tests
        load-tests
        tools
        phpcs.xml
        unit-tests
    entrada
    www-root
        admin.php
        api
        authentication
        community
        core
        cron
        css
        default-pages
        index.php
        javascript
        setup
        templates

### Root Directory

In the root level Entrada directory there are two directories:

* `developers` contains Entrada documentation, automated testing, raw structural SQL and legacy upgrade files, and command line PHP scripts, useful for things like seed data to populate a demo install, import tools, and data export.
* `www-root` contains the web facing PHP code which drives the application.

### Web Root

`www-root` is where the vast majority of development is done. Most requests into Entrada are handled by controller file in the `www-root` directory. This controller is passed a request by Apache's `mod_rewrite` and then includes the appropriate files to deal with the request.

* `index.php` The main controller file for the application. All public requests are routed through this file by `mod_rewrite`. This file sets up the Entrada PHP environment by including the settings files, database libraries and connection files, and authentication and access control libraries. This file is also responsible for login and logout.
* `admin.php` The auxiliary administration controller. All requests made to the administration side of Entrada (`/admin` in the URL) are routed through this controller. Like index.php, it sets up the Entrada environment, and includes the appropriate files to handle the request. Each of these controllers is responsible for including files to deal with requests. These files are found in the core folder.
* `core` Contains the PHP code for the Entrada modules, configuration, and library for 3rd party libraries like Zend Framework and ADODB.
    * `config` Contains `config.inc.php` which defines the host environment, and `settings.inc.php`, which defines settings affecting Entrada's behaviour.
    * `includes` Contains high level PHP support code for the access control `(acl.inc.php)`, cache `(cache.inc.php)`, database connection, `(dbconnection.inc.php)`, site wide functions `(functions.inc.php)`, and initialization code `(init.inc.php)`.
    * `library` Contains code libraries used across the site. Libraries written for or included in Entrada reside in `Entrada`.
    * `modules` Contains most Entrada modules (controllers and views) for the public and admin sections of Entrada. Each module has its own controller, and folder which contains code for specific actions inside that module.
    * `storage` Used by Entrada during everyday operation to store temporary files, logs, and uploads.

Other files/folders in `www-root`:

* `api` Contains single execution API style PHP files. This directory is being phased out and should not be used for new API files.
* `authentication` Contains Entrada's authentication server.
* `community` Contains Entrada's self-contained community system.
* `cron` Contains the command line PHP scripts needed for execution by cron for correct operation of Entrada.
* `setup` Contains the PHP installer for Entrada.
* `templates` Contains all of the different templates within for Entrada.

## User Permissions

This brief introduction to the user permissions in Entrada will give you an overview of what groups and roles come with Entrada by default and what broad functionality these group and role combinations are allowed to access.

The access control level system in Entrada is very flexible, so you can modify and extend these permissions in many different ways. All permissions are defined the `entrada_auth.acl_permissions` table and detailed documentation can be found in the [Entrada ACL](entrada-acl/) section.

### Students

  * Student : 20XX
    
    Students have basic read permissions to most public modules. They can also edit and in some cases remove information that they add themselves (e.g. discussion forum comments).
    
    It is important to note that students cannot be granted access to any administrative module within Entrada. There is a hard-coded exit in case  all other security restrictions fail and they access /admin/*.

### Faculty

  * Faculty : Faculty - Basic read-only access as faculty members.
  * Faculty : Lecturer - Teaching faculty can edit the content of any learning event that they are scheduled to teach.
  * Faculty : Director - Course Directors can edit the content of any course pages / website or learning event that they are designated as a "Course Director" for on the Admin > Manage Courses page.

### Staff

  * Staff : Staff - Staff members have basic read-only access.
  * Staff : PCoordinator - Program Coordinators can add, edit, or delete learning events and manage any content within any of the courses they are designated as a "Program Coordinator" for on the Admin > Manage Courses page.
  * Staff : Admin - Organizational administrators can pretty much do anything in the system within their designated organisation.

### System Administrators

  * Medtech : Admin - System administrators can pretty much do anything in the system regardless of any organizational restrictions.

