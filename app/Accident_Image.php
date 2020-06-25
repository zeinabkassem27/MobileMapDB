<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accident_Image extends Model
{
    protected $table = "accident_image";
    
    protected $fillable = [
        'image_id', 'accident_id'
    ];
}
