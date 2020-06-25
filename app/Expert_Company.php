<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert_Company extends Model
{
    protected $table = "expert_company";
    
    protected $fillable = [
        'expert_id', 'company_id'
    ];
}
