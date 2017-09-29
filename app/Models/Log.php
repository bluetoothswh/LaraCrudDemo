<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table  = 'log';
    protected $fillable 	= ['content','add_time'];
}
