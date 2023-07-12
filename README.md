## Laravel Simple Cuti API

Laravel Simple Cuti API
- Login
- Pengajuan Cuti User
- List Cuti
- Detail Cuti

## Requirements
1. PHP v7.3
2. PHP Composer installed

## Installation 

1. Clone repo `git clone git@github.com:fahmipotlot/laravel-simple-cuti-api.git`
2. Copy .env file `cp .env.example .env`
3. Run `composer install`
4. Generate Key `php artisan key:generate`
5. Setup your local database credential to `.env`
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Run `php artisan serve`
9. Run `composer test` for testing
10. Run `composer test-report` for testing and generate code coverage for run this step you must configure xdebug to your local environment, just follow this instructions https://xdebug.org/wizard