<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
