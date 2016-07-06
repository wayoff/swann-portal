<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecificationCategory extends Model
{
    protected $table = 'specification_categories';
    
    protected $fillable = [
        'name', 'order', 'parent_id'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

}
