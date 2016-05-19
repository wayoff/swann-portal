<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'document_id'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
