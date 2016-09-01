<?php
/**
 * Created by PhpStorm.
 * User: Loulouw
 * Date: 01/09/2016
 * Time: 22:44
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'idcustomer';
    public $timestamps = false;



}