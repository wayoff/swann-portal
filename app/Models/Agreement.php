<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'document_id'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
