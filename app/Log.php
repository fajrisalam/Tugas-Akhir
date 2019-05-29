<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['file_id','user_id', 'execution', 'duration'];

    public function user(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    public function file(){
        return $this->hasMany('App\File', 'id', 'file_id');
    }
}
