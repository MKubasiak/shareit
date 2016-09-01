<?php
/**
 * Created by PhpStorm.
 * User: Loulouw
 * Date: 01/09/2016
 * Time: 22:44
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class CodeSuggestion extends Model
{
    protected $table = 'code_suggestion';
    protected $primaryKey = 'idcodesuggestion';
    public $timestamps = false;

}