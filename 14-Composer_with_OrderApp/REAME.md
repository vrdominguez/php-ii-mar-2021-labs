# LAB 14: Composer with OrderApp.

## composer.json

```json
{
  "name":"order/app",
  "description":"A simple order application",
  "type": "project",
  "keywords": [
    "Order App"
  ],
  "require": {
    "php": ">=7.4",
    "monolog/monolog": "^2.2",
    "guzzlehttp/guzzle": "^7.2"
  },
  "autoload": {
    "psr-4": {
      "OrderApp\\": "src/OrderApp"
    }
  }
}
```

## Changed public/index.php

```php
<?php
/**
 * Application Entry
 */

require '../vendor/autoload.php';

// // "use" the front controller and services
use OrderApp\Controller\IndexController;
use OrderApp\Core\Service\Services;


//Setup the services instance
Services::getInstance();

//Get a new index controller and startup
$controller = new IndexController();
$controller->index();
```

## composer output

```bash
vagrant@php-training:~/Zend/workspaces/DefaultWorkspace/orderapp$ composer install
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Warning: The lock file is not up to date with the latest changes in composer.json. You may be getting outdated dependencies. It is recommended that you run `composer update` or `composer update <package name>`.
Nothing to install, update or remove
Generating autoload files
2 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
vagrant@php-training:~/Zend/workspaces/DefaultWorkspace/orderapp$ composer update
Loading composer repositories with package information
Updating dependencies
Lock file operations: 0 installs, 1 update, 0 removals
  - Upgrading guzzlehttp/promises (1.4.0 => 1.4.1)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 0 installs, 1 update, 0 removals
  - Downloading guzzlehttp/promises (1.4.1)
  - Upgrading guzzlehttp/promises (1.4.0 => 1.4.1): Extracting archive
Generating autoload files
2 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
vagrant@php-training:~/Zend/workspaces/DefaultWorkspace/orderapp$ 
vagrant@php-training:~/Zend/workspaces/DefaultWorkspace/orderapp$ composer dump-autoload
Generating autoload files
Generated autoload files
vagrant@php-training:~/Zend/workspaces/DefaultWorkspace/orderapp$ 
```