# Vagrant

## Introduction
If you presently use VirtualBox to manage your development environment then you may be interested in this Vagrantfile.

## Prerequisites

1. You must have Vagrant installed, which can be downloaded from http://www.vagrantup.com

## Usage

### macOS

```
mkdir ~/Vagrant
cd ~/Documents
git clone git@github.com:EntradaProject/entrada-1x-docs.git
cp ~/Documents/entrada-1x-docs/resources/vagrant ~/Vagrant/Entrada
cd ~/Vagrant/Entrada
vagrant plugin install vagrant-vbguest
vagrant plugin install vagrant-reload
vagrant up
```
