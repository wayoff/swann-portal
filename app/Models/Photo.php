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
        return $this->hasOne(Slider::class);
    }

    public function getImage()
    {
        return url( config('swannportal.path.images') . $this->name . '.' . $this->extension);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
