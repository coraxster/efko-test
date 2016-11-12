<?php
/**
 * Created by PhpStorm.
 * User: rockwith
 * Date: 12.11.16
 * Time: 19:14
 */

namespace models;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'users';
    public $timestamps = false;
}