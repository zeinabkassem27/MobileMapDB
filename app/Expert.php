<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $table = "expert";
    
    protected $fillable = [
        'name', 'phone','syndicate_id','acceptance'
    ];
}
