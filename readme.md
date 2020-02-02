# Mendo CV generator

### Project installation
Clone git repository:
```
$ git clone https://github.com/richardfurs/mendo_cv_generator.git
$ cd mendo_cv_generator
```
Install Composer packages:
```
$ composer install
```
Create storage symlink:
```
$ php artisan storage:link
```
Run migration
```
$ php artisan migrate
```
Run application
```
$ php artisan serve
```
**PDF file is generated via wkhtmltopdf wrapper**

You can find setup instructions [here](https://github.com/barryvdh/laravel-snappy).





