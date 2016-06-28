<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    protected $fillable = [
        'photo_id', 'name', 'category_id', 'order'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(ScreenshotCategory::class, 'category_id', 'id');
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
