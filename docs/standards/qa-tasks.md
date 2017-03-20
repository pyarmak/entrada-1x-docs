# QA Tasks

This wiki documents a standard set of tests you may run for ensuring that deployed software has High enough Quality. In contrast with
[our QA Standards](standards/qa), it is not a all-encompassing set of guidelines that we can use to cover as much QA needs as possible,
but rather a quick list of tasks that will get you 80% of the way there with regard to that document.

Before pushing OR deploying any code to Entrada or UBC repositories, it is critical to ensure the following QA Tasks pass successfully.

## Syntax correctness

For PHP, we can check syntactic validity of our code by running php lint on each file:
```
php -l www-root/core/modules/public/weeks/index.inc.php
```

We can also use composer to check ALL files for PHP syntax correctness:
```
php composer.phar lint
```

## Unit test validity

Ensure all PHP unit tests pass. Type the following:
```
developers/unit-tests/phpunit.sh
```

Currently there are NO JavaScript tests!

### Unit test coverage

Ensure your newly added PHP code is sufficiently covered by unit tests. Type:
```
developers/unit-tests/coverage.sh
```

## Functional testing

Most functional testing is currently done manually. Go to Entrada and check essential functionality:
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

## Smoke testing

In the future, it would be ideal to have jMeter smoke tests that must be run every time a deployment is done to ensure essential functionality works correctly.

## Load testing.

jMeter load tests are present in the `developers/load-testing/`. See [Load Testing](jmeter load testing procedure) for the Jmeter load testing procedures.
