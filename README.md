# codeigniter-cli
Command line tool (CLI) for CodeIgniter 3.0


Aim of developing this package is to provides a Cli tool for [CodeIgniter](https://github.com/bcit-ci/CodeIgniter) 3.0.

This package includes some basic commands and will supported for HMVC in near future.

For creating this package i used [Symfony 2 Console Component] https://github.com/symfony/console

## Included Commands

~~~
generate migration ... Generates migration file skeleton.
migrate            ... Run migrations.
migrate status     ... List all migration files and versions.
seed               ... Seed the database.
run                ... Run controller.
~~~

## Folder Structure

```
codeigniter/
├── application/
├── ci_instance.php ... script to generate CodeIgniter instance
├── cli             ... command file
├── config/         ... config folder
└── vendor/
```

## Requirements

* PHP 5.4.0 or later
* `composer` command
* Git

## Installation
