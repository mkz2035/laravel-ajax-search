<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/14/2018
 * Time: 01:59 AM
 */

namespace Search;


use Illuminate\Support\Facades\Facade;

class SearchFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ajax-search';
    }


}