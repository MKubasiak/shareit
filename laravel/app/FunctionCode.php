<?php
/**
 * Created by PhpStorm.
 * User: Loulouw
 * Date: 01/09/2016
 * Time: 22:46
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class FunctionCode extends Model
{
    protected $table = 'function_code';
    protected $primaryKey = 'idfunctioncode';
    public $timestamps = false;

}