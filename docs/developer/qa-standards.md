# Entrada Consortium QA and Testing Standards

## Abstract

This wiki documents the standard Testing process for ensuring that all deployed, released, and contributed software has High enough Quality at UBC. This includes both local customization as well as our contributions to the consortium version(s). It includes all aspects of validation and verification from syntax correctness, code style, to automated unit testing and system testing. It advocates a compromise between avoiding costly over-testing and covering as many of the use cases of the system as possible using both automated and manual testing. It's **not** meant to dictate the process but rather provide guidelines as to what we think is the best strategy to ensure our system gets tested sufficiently. The document is specifically written for UBC, and it is hoped it can be "merged" upstream and applied at any university. Bear in mind, however, it is **designed** to be implemented in the institution's development environment.

At this point in time, this document is in draft for review.

## DISCLAIMER

This document is provided **AS-IS**. This document **MUST** **NOT** be used to obstruct the Quality, Security, Health, Safety, Prosperity of any Entrada Environment or other Application Environment. Doing so is not the intention of this document (the opposite, to promote the Quality, Security, etc. of all Entrada environments where possible), and all responsibility for doing so is placed solely on the developers of their own respective work.

The above disclaimer **MUST** **NOT** be removed. This line **MUST** **NOT** be removed.

## Contents

1. [Upstream QA](#1-upstream-qa)
  1. [Existing automation](#11-existing-automation)
  2. [Recommended automation](#12-recommended-automation)
  3. [Benefits of unit testing](#13-benefits-of-unit-testing)
  4. [Benefits of code style checking](#14-benefits-of-code-style-checking)
2. [Downstream QA](#2-downstream-qa)
  1. [Downstream QA Responsibility](#21-downstream-qa-responsibility)
  2. [Recommended automation](#22-recommended-automation)
3. [Syntax Correctness Checks](#3-syntax-correctness-checks)
  1. [JavaScript correctness](#31-javascript-correctness)
  2. [PHP correctness](#32-php-correctness)
4. [Code Style Checks](#4-code-style-checks)
  0. [Justification for Code Style Checks](#40-justification-for-code-style-checks)
  1. [PHP code style](#41-php-code-style)
  2. [JavaScript code style](#42-javascript-code-style)
5. [Automated Unit Testing](#5-automated-unit-testing)
  0. [Justification for Automated Unit Testing](#50-justification-for-automated-unit-testing)
  1. [PHP unit testing](#51-php-unit-testing)
  2. [PHP code coverage](#52-php-code-coverage)
  3. [JavaScript unit testing](#53-javascript-unit-testing)
  4. [JavaScript code coverage](#54-javascript-code-coverage)
6. [Automated Functional Testing](#6-automated-functional-testing)
  1. [PHP database testing](#61-php-database-testing)
7. [Automated System Testing](#7-automated-system-testing)
  1. [Back end API testing](#71-back-end-api-testing)
8. [Automated Smoke Testing](#8-automated-smoke-testing)
9. [Manual Functional Testing](#9-manual-functional-testing)
  1. [Feature testing](#91-feature-testing)
  2. [Release testing](#92-release-testing)
  3. [Manual testing code coverage](#93-manual-testing-code-coverage)
10. [Automated Performance Testing](#10-automated-performance-testing)
  1. [jMeter load testing](#101-jmeter-load-testing)
11. [User Acceptance Testing (UAT)](#11-user-acceptance-testing-uat)

## 1. Upstream QA

### 1.1 Existing automation

Currently, Travis CI does the following:

* Validate Composer JSON
* Validate PHP syntax corrrectness
* Validate unit tests

### 1.2 Recommended automation

* Validate Composer JSON
* Validate PHP syntax corrrectness
* Validate code style checks
* Validate unit tests
* Validate functional tests
* Validate code coverage
* Validate system tests

If any of these things are impacted, committer should be notified ASAP.

## 2. Downstream QA

### 2.1 Downstream QA Responsibility

When you release a version of Entrada to your organisation, you're not just releasing the changes you made, but all changes present in the base consortium version of Entrada. As such, it's up to you to ensure those changes have been adequately QA'd. The following risky scenarios may occur:
* Extraneous change code syntax is invalid
* Extraneous change code produces runtime errors
* Extraneous change code does behaves in contradiction with your requirements
* Extraneous change code introduces undesired new features

What this essentially means is that you have to _own_ any upstream changes that you release to your organisation as part of a merge or upgrade process. You must have QA as part of your plan to upgrade from your current stable upstream version to the next stable upstream version. This will include everything from unit testing to manual testing.

### 2.2 Recommended automation

* Validate Composer JSON
* Validate PHP syntax corrrectness
* Validate code style checks
* Validate unit tests
* Validate functional tests
* Validate code coverage
* Validate system tests

### YOU SHOULD HAVE CI SET UP IN YOUR INSTITUTION ENVIRONMENT SO THAT YOU GET NOTIFIED IF ANYTHING BREAKS.

* **TODO**: Add running automated validation to Capistrano script.

## 3. Syntax Correctness Checks

### 3.1 JavaScript correctness

* **Status**: JavaScript correctness checks are **NOT** present in Travis CI nor downstream CI.
* **ALL** JavaScript **MUST** be syntactically correct according to minimum supported version of EcmaScript.
* **TODO**: Determine minimum supported version of JavaScript, and set up syntax correctness checks (e.g. using Grunt).

### 3.2 PHP correctness

* **Status**: At the moment PHP correctness checks are present in Travis CI and downstream CI (UBC).
* **ALL** PHP **MUST** be syntactically correct according to supported version(s) of PHP.

Before pushing PHP code, we can check syntactic validity of our code by running php lint on each file:
```
php -l www-root/core/modules/public/weeks/index.inc.php
```

CI (upstream and downstream) **MUST** use composer to check ALL files for PHP syntax correctness:
```
php composer.phar validate
php composer.phar lint
```

## 4. Code Style Checks

### 4.0 Justification for Code Style Checks

As PSR-2 is going to be adopted by the Consortium as the de facto standard for all new version Entrada code, all new classes and projects MUST attempt to adhere to this coding standard. Failure to do so will result in "merge hell" as differences in style will lead to unnecessary change and difficulty to read. A clean and consistent code base is in everyone's interest.

### 4.1 PHP code style

* **Status**: PHP code style checks are **NOT** present in Travis CI nor downstream CI
* **ALL** new and refactored code **MUST** be PSR-2 compliant.
* **TODO**: Add PHPCS to Travis CI and downstream CI
* **TODO**: Add CI task to send warning to developers if code is non-compliant, but don't fail the build.

**ALL** Developers **MUST** read the following documents:
0. [Coding Standards - Entrada Documentation](http://docs.entrada-project.org/developer/standards/)
1. [PSR-1: Basic Coding Standard](http://www.php-fig.org/psr/psr-1/)
2. [PSR-2: Coding Style Guide](http://www.php-fig.org/psr/psr-2/)

### 4.2 JavaScript code style

* **Status**: JavaScript code style checks **NOT** present in Travis CI nor downstream CI
* **ALL** new and refactored code **MUST** adhere to decided-upon JavaScript standard.
* **TODO**: Decide on JavaScript coding style standards.
* **TODO**: Add CI task to send warning to developers if code is non-compliant, but don't fail the build.

## 5. Automated Unit Testing

### 5.0 Justification for Automated Unit Testing

One of the main benefits of having automated tests upstream to run continuously as part of a Countinuous Integration (CI) environment is that there is a wide array of developers that can affect any number of parts of the system, by unit testing your code against expectations, other developers would be notified by the CI if they break your code. This is a Health Environment. Doctors test our blood before jumping to conclusions about a diagnosis. When we do a scheduled release and suddenly the system is not usable, we will get a big WTF.

Think about it like insurance. Unit testing adds extra work and therefore **COST** to development time. However, it buys you protection from unexpected changes because if anyone else breaks your code, the unit tests will "yell" at them. They are not a substitute for manual functional testing, but rather provide documentation and an early warning system for scenarios that you designed your code to handle.

**Code Coverage Percentage (%) Note**: Code coverage percentage (%) refers to the number of lines tested. Another measure is branch coverage, for example multiple combinations of if statements in complex functions. This is ultimately up to the discretion of the programmer but this needs to be mentioned. Semantic coverage can be difficult to quantify as you can test all lines of code within a function, but not test all possible cases (e.g. if a parameter to your function is an integer, you should test all probably inputs and test that the function behaves as expected. Be mindful of any assumptions you make (just like driving).

### 5.1 PHP unit testing

* **Status**: PHP unit test task is run as part of Travis CI and downstream CI
* **ALL** unit tests **MUST** pass before any upstream and/or downstream merge and/or release.

CI (both upstream **AND** downstream) **MUST** ensure all PHP unit tests pass. This can be done using the following script:
```
developers/unit-tests/phpunit.sh 
```

#### Mocking the database in all unit tests

* **Status**: `BaseTestCase` class is present in upstream `developers/unit-tests` to always mock `$db` object.
* **ALL** unit tests (not functional tests) **MUST** mock the database object.

Mock the database object (`ADOConnection $db`) globally in a base test case class (extending `PHPUnit_Framework_TestCase`) as at the moment all Entrada code calls the database object as a `global` variable (`$db`). This can be done by mocking it using Phake in a base test case class:

```
abstract class BaseTestCase extends PHPUnit_Framework_TestCase {

    public static function setUpBeforeClass() {
        require_once("config/settings_test.inc.php");
        require_once("functions.inc.php");
    }

    public function setUp() {
        parent::setUp();
        global $db;
        $db = Phake::mock('ADOConnection');
        Phake::when($db)->qstr(Phake::anyParameters())->thenReturnCallback(function ($value) { return "'".$value."'"; });
    }
```

Test cases that run directly against the database need to extend a different class in order to run against a **separate** test database.

**TODO**: Provide examples of mocked unit testing to ensure that developers have what they need to produce effective tests.

### 5.2 PHP code coverage

* **ALL** new and/or refactored **model** classes and/or functions **MUST** have 100% code coverage.

* **ALL** new and/or refactored **controller** classes and/or functions **MUST** have 100% code coverage.

* Your institution **MAY** decide whether **ALL** new and/or refactored **view** classes and/or functions **MUST** have 100% code coverage.

* Code **MAY** have **less than** 100% code coverage in cases where the **cost** is not worth it.

* **TODO**: Add CI task to send warning to developers if code changed does not have 100% code coverage or other decided-upon threshold,
for example 70%.

To check unit test code coverage:
```
developers/unit-tests/coverage.sh
```

Ideally, CI will let developers know what is the percentage of code covered for each of their changes. It can do this by:

1. Parsing the code coverage text output
```
cd developers/unit-tests/
../../www-root/core/library/vendor/bin/phpunit --coverage-text --colors=never -c phpunit.xml
```
and parse the output for `^\s*Lines:\s*\d+.\d+\%`.

2. Sending a notification to the committer of what the percentage code covered for the files they changed.

3. Displaying a code coverage percentage (%) status on the main Entrada README.md (visible when the user visits the repository in Github as well as other products (e.g. GitLab)).

### 5.3 JavaScript unit testing

* **Status**: There are NO JavaScript unit tests!
* **ALL** JavaScript tests (none at the moment) **MUST** pass before upstream and/or downstream merge and/or release.

### 5.4 JavaScript code coverage

* **Status**: There are NO JavaScript unit tests!
* **ALL** new and refactored JavaScript **models** **MUST** have 100% coverage.
* **ALL** new and refactored JavaScript **controllers** **MUST** have 100% coverage.
* JavaScript **MAY** have **less than** 100% code coverage in cases where the **cost** is not worth it.

## 6. Automated Functional Testing

### 6.1 PHP database testing

* **Status**: Functional tests (unit tests that run against the database without mocking the $db object) in entrada-1x-me in `developers/functional-tests` are currently disabled as they were writing to a database that may be the same as the main entrada database running on the machine. Anyhow the existing tests are very limited

* **ALL** functional tests **MUST** pass before merging your change into the main development branch.

* **ALL** functional tests **MUST** **NOT** use the same default Entrada database.

* **ALL** functional tests **MUST** destroy **ALL** data before running a test case. You may decide to destroy all data before each test function, and annotating the function with the appropriate dataset.

* **ALL** functional tests **MUST** check whether the database it's running against is the correct one (i.e. by checking the $db for the connection database name (e.g. `entrada_test`) to make sure it's the same as the one in the test settings file) using some fault tolerant code.

* **TODO**: Create a base functional test case class with a `setUp()` function that destroys the database and then loads all initial test data.

* **TODO**: Set up a test database in both upstream and downstream CI environments.

* **TODO**: Move `coverage.sh` to `developers/` instead of `developers/unit-tests` so that it runs both unit tests and functional tests.

## 7. Automated System Testing

### 7.1 Back end API testing

* **ALL** automated system tests **MUST** pass before merge/release.

* **TODO** Currently there are NO automated system tests!

## 8. Automated Smoke Testing

* **ALL** automated smoke tests **MUST** pass before release.

* Run the smoke tests **after release** as well, to ensure everything is okay.

* **TODO** Currently there are NO automated smoke tests! Recommend jMeter.

## 9. Manual Functional Testing

### 9.1 Feature testing

Testing a new feature must take the following into consideration:
* Use by wider consortium
* Client needs
* Edge cases

### 9.2 Release testing

Before each release (in your Staging environment) and after each release (in your Production environment), you MUST go to Entrada and check essential functionality:
* Calendar
* Learning Events > Event Tags
  * Ensure Activity Objectives expand out to Exit Competencies
* Curriculum > Event Search
  * Search for basic health concepts such as "heart" or"lung"
* Curriculum > Reports > Minutes Report

Test functionality as multiple relevant users as well, where appropriate.
* Students (incl. different cohorts/groups)
* Faculty
* Staff
* Medtech Admin

### 9.3 Manual testing code coverage

In order to increase code coverage by tests, you may use any manual functional testing to compensate for a lower unit test coverage percentage (%). If you do this, you **MUST** document Test Plans containing Test Steps to adequately cover the code change(s).

You may also create automated system tests to compensate for any ommitted manual testing.

## 10. Automated Performance Testing

### 10.1 jMeter load testing

jMeter load tests are present in the `developers/load-testing/`.

## 11. User Acceptance Testing (UAT)

It is up to each institution how it does its own UAT testing. 
