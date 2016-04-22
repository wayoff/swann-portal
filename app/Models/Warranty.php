<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    protected $fillable = [
        'name', 'document_id'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function categories()
    {
        return $this->belongsToMany(PolicyCategory::class);
    }
}
