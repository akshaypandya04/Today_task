# Interview Task

This is a Laravel 8 interview task.

This is not a package - it's a full Laravel project.

Clone the repository with git clone
Copy .env.example file to .env and edit database credentials there
Run composer install
Run php artisan key:generate
Run php artisan migrate --seed (it has some seeded data - see below)
That's it: launch the main URL

#Features

User Authentication:

Create Login, Register and Reset Password
After registration user should be sent a welcome email.

Product Module:

Manage Category , Product

Create RESTful API’s for below actions :

1. Auth: Login
2. Product: List, Show, Create,
3. Category: List
