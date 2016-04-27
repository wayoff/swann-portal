<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $fillable = [
        'dept',
        'title',
        'label',
        'position',
        'parent_id',
        'procedure_id',
    ];

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function getLabelAttribute($value)
    {
        return ucwords($value);
    }

    public function scopeWhereIsAParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    public function parent()
    {
        return $this->belongsTo(Decision::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Decision::class, 'parent_id');
    }

    public function leftChild()
    {
        return $this->children()->where('position', 'left')->first();
    }

    public function rightChild()
    {
        return $this->children()->where('position', 'right')->first();
    }
}
