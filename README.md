# Urbanstalls Website

This repository is a Wordpress site that is for the Urbanstalls website.  The following directions reference how to pull the code and run the site locally.  There is a VagrantFile included in this repository that will allow you to clone this repository and create a local development environment.

## Prerequisites

+ Git
+ Vagrant
+ VirtualBox

## What's Installed

+ Ubuntu Precise (12.04)
+ Wordpress (4.0)
+ Beachwebsite
+ Mysql
+ Php
+ Phpmyadmin

## Getting Started

This is a fairly simple project to get up and running.  
The procedure for starting up a working WordPress is as follows:

1. Fork the project.  (There’s only master branch.)
2. Clone the project to your local machine
3. Run the command `vagrant up`
4. Run the command 'vagrant provision' (this may happen on vagrant up as well, but won't hurt to run it again.)
5. Open your browser to `http://localhost:8080`

### Common Issues
+ Often times you may have a local instance of mysql running.  You will need to shut that down before running `vagrant up`

## Working with the WordPress Environment

To log in to the local Wordpress installation:

`http://localhost:8080/wp-admin/` the username is `admin`, the password is `smurfmurph`.

You can access mySQL with the following settings:

+ Host: `127.0.0.1`
+ Username: `wordpress`
+ Password: `smurfmurph`
+ Database: `urban`
+ Port: `3306`

## Getting Help

Feel free to file an issue and/or create a pull request.
