<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'product_id', 'document_id', 'title', 'answer', 'featured'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function keyword()
    {
        return $this->morphOne(Keyword::class, 'keywordable');
    }
}
