This project is made up of laravel 9.

to use this project, cron the project to your einnvoriment by git clone 

run composer install and after completion run npm install

create your msql database and connect using .env

migrate table by php artisan migrate, this will add all tables and neccesssary data into your tables, such as admin and 5000 books

start application by php artisan serve and in other tab npm run dev for development or npm run build for production enviroment

admin user email is admin@admin.com.com passowrd ia 123456789.

API for user authentication are in http://127.0.0.1:8000/api/login http://127.0.0.1:8000/api/register

get all products paginated api url http://127.0.0.1:8000/api/products

create a new order by running post http://127.0.0.1:8000/api/order with body of product_id and payment_method if cash will be submitted with no need of billing_addrees and card_number but if payment_method is card they will be needed order is made
