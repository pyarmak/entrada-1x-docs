# Contributions

The Entrada Consortium community consists of a vibrant and capable group of technical professionals, faculty members, and administrators from institutions all over the world. The success and size of the Entrada Platform is largely attributed to the valuable contributions by many of our Consortium member institutions. 

This documentation is intended to describe the process that Consortium member institutions should follow to have features or changes they have created considered for contribution to the core Entrada Platform. If these procedures are followed, there stands a much better chance of the feature/change being merged into an upcoming release of the software and will also help to avoid unnecessary development efforts by your institution.

## Communication

Before you begin detailed planning or development of a new feature or change within the Entrada Platform, it is critical to communicate that change requirement to the rest of the Consortium community. This communication step is of key importance because you or your team may gain valuable insight, knowledge, or feedback from an existing contributor. Here are a few potential outcomes of first communicating the feature/change you are planning to make:

1. It may already be possible to achieve in the application or may exist within a feature branch.
2. There may be an existing GitHub Issue that explains this feature, or you may be able to contribute your requirements to an existing Issue.
3. It may have been previously discussed in the community, and a workaround or alternative approach might have been accepted.
4. It may be entirely out-of-scope for the project.
5. You may be onto something new and exciting! Wahoo!

### Communication Methods

This list is intentionally not ordered given that different features or changes may require different approaches. Please use your best judgment. 

* Post a message in the #help channel within the Entrada Consortium Slack team for a quick sanity check. If you do not receive an acceptable response, then send an email explaining the feature or change to the developer-l@entrada.org mailing list.
* At one of the bi-weekly Consortium Community web-conferences, you could mention the required features or changes during the "Community Contributions" segment.
* You could discuss your feature or change requirements at one of our weekly School + Entrada Core check-in meetings.

## Planning 

Please feel free to consult the Entrada Core team during the feature/change planning process. We may be able to provide valuable feedback or advice on items such as feature location, UI workflow, database design, permissions configuration, and more. The Entrada Core team is here to support you during your development process.

## GitHub Issue

It is essential that when you are creating a new feature or change within Entrada that you create a corresponding Issue within our private GitHub project. This Issue number:

1. will act as a reference when you are speaking with other Consortium Members.
2. is required to create a new database migration using `php entrada migrate --create`.
3. will be used as a suffix in your feature branch within our Git repository.

Entrada ME Project: [https://github.com/EntradaProject/entrada-1x-me](https://github.com/EntradaProject/entrada-1x-me)

## Development

### Institutional Fork

It is considered best practice to create an institutional fork of the `EntradaProject/entrada-1x-me` repository for your local team to work from. This fork will give your team a place to perform active development of features without requiring write access to the main project repository. Please pay special attention to ensuring that your institutional fork is kept up-to-date with the upstream `EntradaProject/entrada-1x-me` repository. GitHub, unfortunately, does not automatically maintain upstream commits in downstream forks.

### Branching

Before development begins, you should create a new **feature** branch based on the **develop** branch. Your feature branch should be labeled something like `feature/student-report-2254`, which can be broken down into three parts:
    
1. A prefix indicating this is a feature branch. See [Overview / Git Repositories](/developer/overview/#git-repositories) for clarification.
2. A short descriptive label for your feature, concatenated with dashes.
3. The corresponding GitHub Issue number.

`[Feature] / [Short Descriptive Label] - [GitHub Issue Number]`

All branch names should be in lower case and should follow the "git flow" convention.

### Coding

A few notes regarding development activity for the Entrada Platform:

1. Updates to the existing Entrada ME codebase that are submitted for consideration should be in-line with the [Entrada Coding Standards](/developer/standards). Doing so will significantly expedite the code review process. 
2. New modules created for Entrada ME should be built using the Service Oriented Architecture pattern introduced in Entrada ME 1.10. This pattern consists of a RESTful Entrada API end-point created within a separate `EntradaProject/entrada-1x-api` repository, and a front-end created using EntradaJS (an implementation of VueJS). For more information on how this can be achieved, please refer to the [Quickstart Guide](/developer/quickstart) or contact the Entrada Core team.

### Submitting Contributions

Once the development of your feature/change is complete and you are ready to submit your work for consideration in the core code base, you must create a pull request on GitHub to our `develop` branch. The only exception to this rule is if you're submitting a bug fix for a previous version of Entrada. In that case, you would base your work off the specific release branch (i.e. `release/1.10`), and create a pull request back into that branch.

A pull request (shown below) should in most cases have a **base** of `develop` and **compare** to your `feature/student-report-2254` branch. A few other very important notes about your pull request:

1. It must have an accurate and descriptive Title.
2. It must contain a relatively informative description that includes a reference to the corresponding GitHub Issue number (i.e #2254).
3. It must be tagged with labels (i.e. `enhancement` or `bug`, as well as `ready-for-code-review`).
4. You can optionally tag a preferred Milestone that this feature is included with.

![New Pull Request](/img/contributions-new-pull-request.png)

Once your pull request has been submitted you must inform the Entrada Core team and advocate for your feature. It is important to note that pull requests are not always reviewed quickly. It may take many months for a pull request to be reviewed depending on its' size, priority, and backlog of requests. During this period it is your responsibility to keep the pull request relevant and up-to-date. We recommend that you routinely merge the develop branch into your feature branch to keep it up-to-date. A stale pull request containing many merge conflicts may not be reviewed.

### Code Review

During the code review process, our Entrada Core team is assessing a number criteria including:

* Security
* Design
* Functionality
* Applicability
* Flexibility
* Coding Standards
* Documentation

If we find minor issues, we will certainly fix them. If we find major issues, we may mark the pull request as `requires-attention` and provide feedback as to what is needed to proceed. We are here to help and happy to work with you, please do not hesitate to reach out for assistance.





