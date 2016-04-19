<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    public function warranties()
    {
        return $this->belongsToMany(Warranty::class);
    }
}
