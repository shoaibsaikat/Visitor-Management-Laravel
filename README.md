# Laravel-Visitor-Management
A Visitor Management System made with Laravel

# Setup
1. run command "npm install"
2. run command "composer global require laravel/installer"
3. run command "composer install"
4. import visitor-management.sql file to mysql database. as ubuntu or mint does not give phpmyadmin user the right to create database from phpmyadmin portal, you've to create the database and give permission from terminal. to do that follow the below instructions,
    1. run "sudo mysql -u root"
    2. run "CREATE DATABASE visitor-management;". you can check if it's created succesfully by running "SHOW DATABASES;"
    3. now grant the permission to phpmyadmin user by running "GRANT ALL PRIVILEGES ON `visitor-management`.* TO 'phpmyadmin'@'localhost';"
5. create a .env file and edit your database name, username and password. typically you'll only need to edit below lines for example,
    1. DB_DATABASE=visitor-management
    2. DB_USERNAME=phpmyadmin
    3. DB_PASSWORD=Password123

# Run
1. run command "npm run dev"
2. run command "php artisan serve"
3. http://127.0.0.1:8000 (for first time browser may ask you to create encryption key)

# Note
1. pattern used for passowrd is for example for user, "<user>@dev.com" is "<user>@2023". users are availble in users table
2. for laravel installation for the first time you can follow, "https://laravel.com/docs/7.x/installation"

