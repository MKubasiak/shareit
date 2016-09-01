<?php
/**
 * Created by PhpStorm.
 * User: Loulouw
 * Date: 01/09/2016
 * Time: 22:44
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class CodeComment extends Model
{
    protected $table = 'code_comment';
    protected $primaryKey = 'idcodecomment';
    public $timestamps = false;

    public function code(){
        return $this->hasOne('App\FunctionCode');
    }

}