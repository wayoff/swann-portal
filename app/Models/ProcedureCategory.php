<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcedureCategory extends Model
{
    protected $fillable = [
        'name', 'parent_id', 'order'
    ];

    public function parent()
    {
        return $this->belongsTo(ProcedureCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProcedureCategory::class, 'parent_id');
    }
}
