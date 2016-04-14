<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    protected $fillable = [
        'name', 'document_id', 'warranty_procedure'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
