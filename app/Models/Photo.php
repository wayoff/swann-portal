<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 'extension'
    ];

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

    public function getImage()
    {
        return url('uploads/' . $this->name . '.' . $this->extension);
    }
}
