<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable =[
        'title', 'description', 'photo_id'
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
