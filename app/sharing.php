<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sharing extends Model
{
    protected $fillable = ['id_owner', 'id_file', 'id_shared', 'public'];

    public function owner(){
    	return $this->hasMany('App\User', 'id', 'id_owner');
    }

    public function file(){
    	return $this->hasMany('App\File', 'id', 'id_file');
    }

    public function shared(){
    	return $this->hasMany('App\User', 'id', 'id_shared');
    }
}
