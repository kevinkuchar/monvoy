<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raid extends Model
{
    protected $fillable = ['gym'];
    protected $table = 'raids';
}
