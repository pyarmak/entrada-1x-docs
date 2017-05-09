# GitLab CI configuration

Some institutions may use GitLab to locally host their code. If so, they can
use GitLab CI to run their test suite(s), including phpunit and selenium. This
can help catch bugs before entering their production environment.

Here's an example GitLab CI file for running syntax checks and phpunit:

`entrada/.gitlab-ci.yml`:

```
image: php:5.6

before_script:
    - curl --silent --show-error https://getcomposer.org/installer | php
    - php composer.phar install

# Unfortunately it also caches the build output so
# cleaning removes reminants of any cached builds.
# The assemble task actually builds the project.
# If it fails here, the tests can't run.
build:
  stage: build
  script:
    - php composer.phar validate
    - php composer.phar lint
  allow_failure: false

# Use the generated build output to run the tests.
test:
  stage: test
  script:
    - developers/unit-tests/phpunit.sh
  allow_failure: false
```
