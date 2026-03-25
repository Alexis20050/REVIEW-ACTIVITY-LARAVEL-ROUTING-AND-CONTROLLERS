# Student Module – Laravel

A simple student management system built with Laravel. Demonstrates:

- Routes for displaying students
- Controller logic
- Blade views
- Admin route group
- Form method spoofing (PUT / DELETE)
- Session storage (no database required)

## Requirements

- PHP 8.2+
- Composer
- Laravel 12 (or later)

## Setup

```bash
git clone <your-repo-url>
cd student-module
composer install
cp .env.example .env
php artisan key:generate
php artisan serve  
