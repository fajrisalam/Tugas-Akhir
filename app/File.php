<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['filename', 'path', 'stored', 'format', 'size', 'id_user', 'key', 'sha', 'duration', 'privasi', 'modif'];

    public function log(){
    	return $this->belongsTo('App\Log');
    }
}
