<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divider extends Model
{
    protected $table = [
        'name'
    ];

    public function procedures()
    {
        return $this->belongsToMany(Procedure::class);
    }
}
