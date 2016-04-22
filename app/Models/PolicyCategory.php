<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyCategory extends Model
{
    protected $fillable = [
        'name', 'order', 'parent_id'
    ];
    
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function parent()
    {
        return $this->belongsTo(PolicyCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(PolicyCategory::class, 'parent_id');
    }

    public function warranties()
    {
        return $this->belongsToMany(Warranty::class);
    }
}
