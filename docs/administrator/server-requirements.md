# Software Requirements

Software requirements for Entrada are relatively straight forward. Entrada can run on anything from a Raspberry Pi to a load balanced scalable cloud computing environment. In the simplest form it requires a Linux, Apache, MySQL, and PHP (LAMP) software stack.

| Requirement | Minimum | Recommended | Notes |
| ----------- | ------- | ----------- | ----- |
| Linux | RHEL 6 | RHEL 7 | Red Hat Enterprise Linux or CentOS would be our recommended distribution at this time; however, since Entrada will run on almost any distribution, your best bet would be to utilize the distribution most widely adopted and supported by your infrastructure group. |
| Apache | 2.2+ | 2.4+ | | 
| MariaDB | 5.1 | 5.5+ | MySQL and other commercial flavors are also fully supported. |
| PHP | 5.6.4+ | 5.6.31+ | PHP7+ is fully supported as of Entrada ME 1.9+ | 


## Virtual Servers

### Minimum Instances

At a minimum we would recommend at least two separate virtual server instances to run Entrada:

1. Production Application Server (`app01`)
2. Primary Database Server (`db01`)

These instances could be combined into a single server instance if Entrada use is limited or is for administrative purposes only. We generally recommend separating application server and database server duties for performance purposes under moderate to heavy use.

### Recommended Instances

If you are allowing students, faculty, and staff to log into your Entrada environment, measures should be taken to ensure a quality experience for your users. Part of a quality user experience is not only the implementation of a proper Software Development Life-Cycle, but also a robust and reliable server environment. 

1. Production Application Server (`app01`)
2. Staging Application Server (`staging`)
3. Primary Database Server (`db01`)
4. Slave Database Server (`db02`)
5. Project Server (`projects`)

## Containers

Containerization through ecosystems such as Docker are increasingly becoming an industry standard. The Entrada development community utilizes a Docker-based development and testing environment called `entrada-developer`, but few consortium members are using containerization for production environments at this time. We look forward to watching as this technology matures, and will update our documentation accordingly as member institutions adopt and adapt their stacks.

For more information on Docker, please [see our Docker resources](https://github.com/EntradaProject/entrada-1x-docs/tree/master/resources/docker).

## Server Requirements

### Production Application Server (`app01`)

The production application server will store and serve the latest deployed version of your branded Entrada application.

Naming Suggestions:

* entrada.med.university.edu
* your-own-brand.med.university.edu

Recommended Specs:

* 4 or 8 vCPU
* 12GB+ Memory
* 750GB of disk space

Network:

The production application server should have a publicly accessible IP address. Entrada APIs are utilized by mobile devices, calendar / RSS applications, and more. Firewall rules should be in place to only allow `TCP` traffic over ports `80` and `443` from the Internet.

### Staging Application Server

The staging application server will provide your developers and QA technicians a place to test pending software changes in an environment that very closely matches the production application server.

Naming Suggestions:

* staging.med.university.edu
* uat-entrada.med.university.edu

Recommended Specs:

* 2 or 4 vCPU
* 4GB+ Memory
* 75GB of disk space

Network:

The staging application server does not necessarily require publicly accessible IP address. Firewall rules should be in place to only allow `TCP` traffic over ports `80` and `443` from local user networks or the Internet if desired.


### Primary Database Server

The primary database server stores almost all of your Entrada installation's data, with the exception of uploaded files, which are stored directly on the filesystem of the production application server.

Naming Suggestions:

* db01.med.university.edu

Recommended Specs:

* 4 or 8 vCPU
* 12GB+ Memory
* 75GB of disk space

Network:

The primary database server does not need a public IP address. It only needs to be accessible by the Production Application Server, and possibly the Staging Application Server, over `TCP` port 3306. Ideally your database servers would reside on an isolated network vLAN.

### Slave Database Server

By configuring a slave database server you are helping to ensure data integrity in the event of a hardware or server failure. MySQL very easily supports a master + slave database server configuration.

Naming Suggestions:

* db02.med.university.edu

Recommended Specs:

* 2 or 4 vCPU
* 4GB+ Memory
* 75GB of disk space

Network:

The slave database server does not need a public IP address. It only needs to be accessible by the Production Application Server, and possibly the Staging Application Server, over `TCP` port 3306. Ideally your database servers would reside on an isolated network vLAN.


### Project Server

The Entrada Project uses GitHub private repositories to support our collaborative development mission. Your institutional Entrada installation should have it's own project server to call home. Required features of a project server include the ability to host multiple projects, create and permission associated Git repositories, track Issues, and store documentation.

Software Suggestions:

* GitLab
* Atlassian Jira + Stash
* GitHub Enterprise

Naming Suggestions:

* projects.med.university.edu
* source.med.university.edu

Recommended Specs:

* 2 or 4 vCPU
* 4GB+ Memory
* 75GB of disk space

Network:

Your project server stores a lot of important information including your source code, software configuration, and potentially credentials such as database connection information. It is not recommended that your project server be accessible outside of your local network.
