First Create a copy **.env.example** and save as **.env** file
Create a database names **database-name**

Adjust the database credentials in .env file according to your mysql configuration

**DB_CONNECTION=mysql**

**DB_HOST=127.0.0.1**

**DB_PORT=3306**

**DB_DATABASE=database-name**

**DB_USERNAME=root**

**DB_PASSWORD=**

Then run the following commands

 - composer install
 - php artisan key:generate
 - php artisan migrate
 - php artisan db:seed 
 - php artisan storage:link 
 - php artisan serve 
 

Credentials for Admin is
 - Email: admin@admin.com
 - Password: 123456


 **Also This Project runs on php 8.1+** 

 **If any problem with composer arises delete composer.lock file and vendor folder from project directory then run composer install again** 


