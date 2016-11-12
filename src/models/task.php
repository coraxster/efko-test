<?php
/**
 * Created by PhpStorm.
 * User: rockwith
 * Date: 12.11.16
 * Time: 19:14
 */

namespace models;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table = 'tasks';
    public $timestamps = false;
    protected $fillable = ['issue', 'solution'];
}