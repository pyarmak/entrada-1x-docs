# Scrubber v1.0.0

## Executing

In order to execute this script we recommend running it in CRON or at will.

### Cron

Add the follow to cronjob:

    0 1 * * * sh /root/scrub/scrub.sh > /dev/null 2>&1

### At Will

Run the following:

    /root/scrub/scrub.sh