<?php
/**
 * Created by PhpStorm.
 * User: Loulouw
 * Date: 01/09/2016
 * Time: 22:46
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class FunctionBase extends Model
{
    protected $table = 'function';
    protected $primaryKey = 'idfunction';
    public $timestamps = false;

    static public function getFunctions($limit){

    return FunctionBase::select('*')->
                    join('language','function.idlanguage','=','language.idlanguage')->
                              join('customer','function.idcustomer','=','customer.idcustomer')->
                      orderby('function.idfunction')->
                    take($limit)->
                    get();
  }

  static public function getFunctionsByLanguage($language){
     return FunctionBase::select('function.idfunction', 'function.title', 'function.date_creation', 'customer.nickname', 'function.description')->
                                        join('language','function.idlanguage','=','language.idlanguage')->
                                        join('customer','function.idcustomer','=','customer.idcustomer')->
                                        where('language.nom',$language)->
                                        get();
  }

}
