Skyii (Starter Kit for Yii2)
============================
Skyii is a pre-configured Yii2 Advanced Template with a lot of features out of the box.

Skyii was developed to minimize the additional efforts in setting up Yii2. 
It includes all the necessary configurations out of the box.

If you have any suggestions or complaints, feel free to open an issue.

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

Why Skyii?
----------
1. Pretty URLs enabled for Frontend, Backend, API and Modules.
2. Backend can be accessed by /admin.
3. Gii is enabled for frontend and backend in 'dev' environment.
4. Debug bar is enabled for frontend and backend in 'dev' environment.
5. Custom Gii templates will generate more and better code than default generator.
6. RESTful API structure and API versioning is configured.
7. JSON formatter for API response is enabled out of the box.
8. User module with ready to use RBAC (Role Based Access Control).
9. Configurations managed according to 'dev' and 'prod' environment.

Please see [this](docs/features.md) for more detailed feature list.

Installation
------------

## Requirements

The minimum requirement by Skyii is that your web server supports PHP 5.4.0.

Note: We assume that you have basic understanding of Yii2, composer and setting up your development environment either in homestead or in xampp/wamp/lamp/mamp etc.

## Installing using Git Clone

You can install this template with below command in your terminal:

    git clone https://github.com/antick/skyii.git


## Install from an Archive File

Extract the archive file downloaded from this repository to your Web root.

## Preparing application

After you have downloaded or ran git clone, you have to follow below steps to initialize the installed application.

1. Update your composer.
   ```
   composer global require "fxp/composer-asset-plugin:^1.3.0"
   
   composer update
   ```

2. Execute the `init` command and select `dev` as environment.

   ```
   php init
   ```

   For production, execute `init` in non-interactive mode.

   ```
   php init --env=Production --overwrite=All
   ```

3. Execute `skyii/install` command to setup your database name in application. Make sure the database already exists.

   ```
   php yii skyii/install
   ```

   It will also run `migrate` command with your confirmation as well as setup proper folder paths in htaccess. But just in case 
   if it does not run the migrations on its own then you will have to run `php yii migrate` in console.

4. Navigate to the admin panel and wait for few seconds while all the caches are being generated.

5. Sign up now to login into the application

Help
----
For Server configurations please see [server_configuration.md](docs/server_configurations.md)

For the list of used plugins in Skyii, please see [list of plugins](docs/plugins.md)

Comparison
----------

| Feature  |  Basic  |  Advanced | Skyii |
|---|:---:|:---:|:---:|
| Project structure | ✓ | ✓ | ✓ |
| Site controller | ✓ | ✓ | ✓ |
| User login/logout | ✓ | ✓ | ✓ |
| Forms  | ✓ | ✓ | ✓ |
| DB connection  | ✓ | ✓ | ✓ |
| Console command  | ✓ | ✓ | ✓ |
| Asset bundle  | ✓ | ✓ | ✓ |
| Codeception tests  | ✓ | ✓ | ✓ |
| Twitter Bootstrap  | ✓ | ✓ | ✓ |
| Front-end and back-end apps  |    | ✓ | ✓ |
| Ready to use User model |    | ✓ | ✓ |
| User signup and password restore  |     | ✓ | ✓ |
| Pretty Url |     |     | ✓ |
| REST API |     |     | ✓ |
| API versioning ready |     |     | ✓ |
| XML or JSON response formatting |     |     | ✓ |
| Custom error handling |     |     | ✓ |
| User module with RBAC |     |     | ✓ |
| Admin LTE integration in Backend and Gii |     |     | ✓ |
| Custom Gii Templates |     |     | ✓ |


Contributors
------------

[Pankaj Sanam](https://github.com/pankajsanam)

[Rajat Jain](https://github.com/rajatjain4061)
