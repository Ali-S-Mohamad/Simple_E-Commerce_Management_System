![image](https://github.com/user-attachments/assets/11530f9f-d3d0-4287-9d4f-5100597a5711)# Simple E-Commerce Management System

The Simple E-Commerce Management System is a basic web application for managing products, categories, and orders. This system is built with the Laravel framework and provides basic CRUD operations, soft delete functionality for products, restricted admin access to the dashboard, and API authentication using Laravel Sanctum.

## Prerequisites

- PHP >= 8.0
- Composer
- MySQL database
- Laravel >= 9.0

## Installation

1. Clone the repository
  
   git clone https://github.com/Ali-S-Mohamad/Simple_E-Commerce_Management_System.git
   cd Simple_E-Commerce_Management_System
   
2. Install dependencies with Composer
  
   composer install
   
3. Create a copy of the .env file
  
   cp .env.example .env
   
4. Generate the application key
  
   php artisan key:generate
   
5. Set up the database

   - Open the .env file and configure the database settings:
    
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     
   - Create the database in MySQL with the name you specified.

6. Run migrations
  
   php artisan migrate

7. install laravel-faker-provider libraray using command

    composer require --dev mbezhanov/laravel-faker-provider-collection

8. Run seeder
   
    php artisan db:seed
        
9. Run node

   npm run dev
   
10. Run the server
  
   php artisan serve
   
11. Access the application

   Open your browser and go to http://localhost:8000.

## Features

- Product Management: Add, edit, delete, and view products.
- Category Management: Add, edit, delete, and view categories.
- Order Management: View orders and order details.
- Soft Deletes: Allows for products to be soft-deleted and restored.
- Admin Dashboard: Restricted access for administrators.
- API Authentication: Secured API routes using Laravel Sanctum.

## API Usage

This project includes API routes for list products, and place orders. To use these API routes, authentication is required via Laravel Sanctum.

1. Register or login to get an API token
2. Attach the token to API requests in the Authorization header
  
   Authorization: Bearer YOUR_TOKEN

postman link to test APIs:

https://documenter.getpostman.com/view/24693079/2sAY4uCP9z
