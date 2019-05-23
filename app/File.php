<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['filename', 'path', 'stored', 'format', 'size', 'id_user', 'public_key', 'sha', 'private_key', 'duration'];
}
