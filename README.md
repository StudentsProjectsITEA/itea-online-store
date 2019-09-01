<p align="center">
    <img src="https://image.flaticon.com/icons/svg/138/138251.svg" height="100px">
    <h1 align="center">Online Store Project | ITEA</h1>
    <br>
</p>

Requirements to development
-------------------
- PHP version 7.3
- Nginx
- Composer
- Git
- Software: PhpStorm, ValentinaDB
- OS: Linux, Mac OS

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
./makelogfiles
```
9. For development, you can create test data for working with the project:
```
php yii test-data/add - to add test data
php yii test-data/delete - to delete test data
```
After insertion test data, you can sign in to app using the following data:
```
For frontend:
⋅ username: store-user
⋅ password: itea1234

For backend:
⋅ username: store-admin
⋅ password: itea1234
```

Contacts: [pro100rost](https://github.com/pro100rost), [for-web-an](https://github.com/for-web-an)

Enjoy :)
