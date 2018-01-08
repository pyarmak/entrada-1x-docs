# Docker

## Introduction

From: https://www.docker.com/what-docker#/developers

Docker automates the repetitive tasks of setting up and configuring development environments so that developers can focus on what matters: building great software.

Developers using Docker don’t have to install and configure complex databases nor worry about switching between incompatible language toolchain versions. When an app is dockerized, that complexity is pushed into containers that are easily built, shared and run. Onboarding a co-worker to a new codebase no longer means hours spent installing software and explaining setup procedures. Code that ships with Dockerfiles is simpler to work on: Dependencies are pulled as neatly packaged Docker images and anyone with Docker and an editor installed can build and debug the app in minutes.

## Prerequisites

1. You must have Docker for Mac or Docker for Windows installed on your local development machine. The simplest way to install everything is to use Docker Community Edition. You should also install Kitematic (GUI):

    https://www.docker.com/community-edition
2. You must have the Entrada ME Git repository cloned to `~/Sites/entrada-1x-me.localhost`.
3. You must edit your local `hosts` file and add each hostname you would like to use. For example:
    ```
    127.0.0.1   entrada-1x-me.localhost
    ```
    
## Usage

### macOS

1. Launch Terminal.app and run the following commands:
    ```
    cd ~/Documents
    git clone git@github.com:EntradaProject/entrada-1x-docs.git
    cd ~/Documents/entrada-1x-docs/resources/docker
    docker-compose up -d
    ```

### Windows 10

1. Launch the **Git Bash** application and run the following commands:
    ```
    cd ~/Documents
    git clone git@github.com:EntradaProject/entrada-1x-docs.git
    cd ~/Documents/entrada-1x-docs/resources/docker
    docker-compose up -d
    ```

## Connecting

You can connect to the terminal of your new container by typing the following in Terminal or Git Bash:

```
docker exec -it entrada-developer bash
```
