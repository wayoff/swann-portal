<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScreenshotCategory extends Model
{
    protected $fillable = [
        'name', 'order', 'parent_id'
    ];

    public function children()
    {
        return $this->hasMany(ScreenshotCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(ScreenshotCategory::class, 'parent_id');
    }

    public function scopeIsParent($query)
    {
        return $query->where('parent_id', 0);
    }

}
