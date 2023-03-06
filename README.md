# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

Create a repo folder in your PC

    C:/avlanche

Clone the repository inside the repo folder

    git clone https://github.com/AXUSLK/StudentManagementSystem.git .

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
    
## Installed Packages

```
Laravel Breeze
Laravel Permission Spatie
Laravel Collective HTML
Laravel Dompdf (barryvdh/laravel-dompdf)

```
