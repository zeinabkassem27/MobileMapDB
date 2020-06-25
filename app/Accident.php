<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    protected $table = "accident";
    
    protected $fillable = [
        'date', 'time','location'
    ];
}
