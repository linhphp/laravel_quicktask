<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //setup name table
    protected $table = 'tasks';
    //The attributes that are mass assignable.
    protected $fillable = [
        'name',
    ];
}
