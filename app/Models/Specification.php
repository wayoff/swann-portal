<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = [
        'category_id', 'name'
    ];

    public function category()
    {
        return $this->belongsTo(SpecificationCategory::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
                ->withPivot('value', 'link_to');
    }
}
