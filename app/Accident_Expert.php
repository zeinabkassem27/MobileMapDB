<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accident_Expert extends Model
{
    protected $table = "accident_expert";
    
    protected $fillable = [
        'accident_id', 'expert_id','comment','rating'
    ];
}
