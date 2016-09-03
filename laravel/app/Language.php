<?php

namespace app;


use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    protected $primaryKey = 'idlanguage';
    public $timestamps = false;

}
