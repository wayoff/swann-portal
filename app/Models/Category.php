<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
