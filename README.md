This project is made up of laravel 9.

to use this project, cron the project to your einnvoriment by git clone 

run composer install and after completion run npm install

create your msql database and connect using .env

migrate table by php artisan migrate, this will add all tables and neccesssary data into your tables, such as admin and 5000 books

start application by php artisan serve and in other tab npm run hot for development or npm run product for production enviroment

admin user email is admin@admin.com.com passowrd ia 123456789.

API for user authentication are in http://127.0.0.1:8000/api/login http://127.0.0.1:8000/api/register

get all products paginated api url http://127.0.0.1:8000/api/products

create a new order by running post http://127.0.0.1:8000/api//product/order/{id} where is {id} is the id of the product you want to order and you must be authenticated to perform the function
