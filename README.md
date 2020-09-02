# PHP test LAWSON BELA

## Installation

  - Run ```composer update```
  - Adapt env.example file with :
  
    ```
    DB_CONNECTION=mysql
    DB_HOST=192.168.10.10
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
    ```
  
  - Set up this laravel project in a virtual machine with laravel homestead:

  	https://dev.to/jsafe00/set-up-laravel-project-in-a-virtual-machine-with-laravel-homestead-3d4a
  	  
  - Execute this command to create Database with the existing migrations: 

  	```php artisan migrate```
 
## How it works

  This is a Controller/Service/Repository architecture built with Laravel

  - You can use these API endpoints with Postman to do basic CRUD operations on News (Posts) and Comments:
    - http://homestead.test/post/ <- attributes : 'title', 'description'.
    - http://homestead.test/comment/ <- attributes : 'body', 'post_id'.
  
  - POST examples:
       - http://homestead.test/post/?title=New%20Post%20Title&description=New%20Post%20Body
       - http://homestead.test/comment/?body=New%20Comment%20Message&post_id=1

  - Visit http://homestead.test on your browser to render the news and comments
