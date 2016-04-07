<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'content', 'description', 'keywordable_id', 'keywordable_type'
    ];

    public function keywordable()
    {
        return $this->morphTo();
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('content', 'like', '%'. $value .'%')
                     ->orWhere('description', 'like', '%' . $value . '%');
    }
}
