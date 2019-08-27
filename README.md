<p align="center">
    <img src="https://image.flaticon.com/icons/svg/138/138251.svg" height="100px">
    <h1 align="center">Online Store Project | ITEA</h1>
    <br>
</p>

Documentation of Yii 2 Advanced Project Template is at [README.md](https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

Requirements to development
-------------------
- PHP version 7.3
- PhpStorm, ValentinaDB
- Linux
- Nginx
- Composer
- Git

Directory structure
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```


Preparing project
-------------------

The first steps after pulling the project to the local machine:

1. Open a console terminal and install all Composer requirements:
```
composer install
```
2. Execute the `init` command:
```
php init --env=Development --overwrite=All
```
3. Run the command in terminal one by one to create database:
```
sudo -u postgres psql postgres
# CREATE USER "store-admin" WITH PASSWORD 'itea1234';
# CREATE DATABASE store_db WITH OWNER "store-admin";
# GRANT ALL PRIVILEGES ON DATABASE store_db to "store-admin";
# \quit
sudo systemctl restart postgresql
```
4. Adjust the `components['db']` configuration in file `/common/config/main-local.php` like a:
```
'db' => [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;dbname=store_db',
    'username' => 'store-admin',
    'password' => 'itea1234',
    'charset' => 'utf8',
],
```
5. Open a console terminal, apply migrations with command:
```
php yii migrate
```
6. Configure the virtual host for Nginx and create empty log files like a `access_log` and `error_log` sections:
```
server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## listen for ipv4
    #listen [::]:80 default_server ipv6only=on; ## listen for ipv6

    server_name online-store.site;
    root        /home/username/projects/online-store/frontend/web/;
    index       index.php;

    access_log  /home/username/projects/online-store/frontend/runtime/logs/frontend-access.log;
    error_log   /home/username/projects/online-store/frontend/runtime/logs/frontend-error.log;

    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # uncomment to avoid processing of calls to non-existing static files by Yii
    location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
        try_files $uri =404;
    }
    error_page 404 /404.html;

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fastcgi_pass 127.0.0.1:9000;
        fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }
}
```

Thereafter your web server domens are:
``` 
http://online-store.site/ - for frontend
http://online-store.site/admin/ - for backend
```
7. Change the hosts file to point the domain to your server.
Path to hosts file in Linux: `/etc/hosts` and add the following lines:
```
127.0.0.1   online-store.site
```
8. If the system does not automatically create log files, run the command in terminal to create them:
```
./makefile
```
9. For development, you can create test data for working with the project:
```
php yii test-data/add - to add test data
php yii test-data/delete - to delete test data
```
To login into the project, you need to first sign up, with any of your email address, username and password. Then, you can login into the application with same email address and password at any time. Enjoy :)
