<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/14/2018
 * Time: 01:55 AM
 */

namespace Search;


use Illuminate\Support\ServiceProvider;

class SearchProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('ajax-search', function () {
            return new Search();
        });

    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'ajax-search');
        $this->publishes([
            __DIR__ . '/views' => base_path('/resources/views/search'),
            __DIR__ . '/migrations' => database_path('/migrations'),
        ]);
    }
}