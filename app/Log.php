<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['id_file','id_user', 'execution', 'duration'];

    public function user(){
        return $this->hasMany('App\User', 'id_user');
    }
    public function file(){
        return $this->hasMany('App\File', 'id_file');
    }
}
