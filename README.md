# codeigniter-cli
Command line tool (CLI) for CodeIgniter 3.0


Aim of developing this package is to provides a Cli tool for [CodeIgniter](https://github.com/bcit-ci/CodeIgniter) 3.0.

This package includes some basic commands and will supported for HMVC in near future.

For creating this package i used [Symfony 2 Console Component] https://github.com/symfony/console

## Available Commands

~~~
codeigniter:clear:cache        Clear all cache
codeigniter:clear:logs         Clear all logs
codeigniter:create:controller  Create a new controller
codeigniter:list:controllers   List all controllers
codeigniter:list:helpers       List all models
codeigniter:list:libraries     List all libraries
codeigniter:list:models        List all models             


(Under Development)
hmvc:module:create             Create a new module
hmvc:module:list               List all modules

~~~

## Directory Structure

```
codeigniter/
├── application/
├── console.php     ... script to run the console tool
├── commnds         ... command file
├── config/         ... config folder
└── vendor/
```

## Requirements

* PHP 5.4.0 or later
* `composer` command
* Git
