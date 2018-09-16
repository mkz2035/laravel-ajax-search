<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/14/2018
 * Time: 02:16 AM
 */

namespace Search\Models;


use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['title', 'body', 'price', 'linkFile'];

}