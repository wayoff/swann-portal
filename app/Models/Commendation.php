<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commendation extends Model
{
    protected $fillable = [
        'name', 'testimonial', 'photo_id'
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
