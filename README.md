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
