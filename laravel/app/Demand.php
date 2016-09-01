<?php
/**
 * Created by PhpStorm.
 * User: Loulouw
 * Date: 01/09/2016
 * Time: 22:45
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $table = 'demand';
    protected $primaryKey = 'iddemand';
    public $timestamps = false;

}