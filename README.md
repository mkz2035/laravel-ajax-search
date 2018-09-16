# laravel-ajax-search
## written by mostafa karimzadeh
#### Accountant in khu university
laravel-ajax-search is a package for Laravel 5+ that helps you to create simple ajax search.it must be amazin :)
## Installation
### 1 - Dependency
The first step is using composer to install the package and automatically update your composer.json file, you can do this by running
```
composer require mostafa_kz/ajax_search_for_laravel
```
### 2 - Provider
You need to update your application configuration in order to register the package so it can be loaded by Laravel, just update your **config/app.php** file adding the following code at the end of your '**providers**
```
    'providers' => [
         Search\SearchProvider::class,
    ],
```
### 3 - Facade
In order to use the **Search** facade, you need to register it on the **config/app.php** file, you can do that the following way:
```
   'aliases' => [
    'Search' => Search\SearchFacade::class,
    ],
```
### 4 - Configuration
In your terminal type
```
  php artisan vendor:publish
```
or
```
 php artisan vendor:publish --provider="Search\SearchProvider"

```
## Usage
### 1 - Database(Migration)
run this command for init table in your project
```
 php artisan migrate

```
### 2 - Init Routes
put this routes in **web.php**
```
Route::get('/','SearchController@index');
Route::get('/search','SearchController@search')->name('search.result');
```
### 3 - Init Controllers
run this command for create controller
```
php artisan make:controller SearchController
```
then put this code on **SearchController**
```
<?php

namespace App\Http\Controllers;
use Search;

use App\File;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return Search::setViewSearch();

    }

    public function search()
    {
        return Search::setResultSearch();

    }
}
```
### Note! because we were used laravel authentication,you must run this command for adding this feature to your project
```
 php artisan make:auth

```
### Note! For insert data in your table(files),you can use phpmyadmin or data fake generator laravel(factory)
### Note! For insert data in your table(files),attentive to this pattern
* price==free
* price > 0

