<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcedureStep extends Model
{
    protected $fillable = [
        'procedure_id', 'photo_id', 'document_id', 'title', 'content'
    ];

    public function keyword()
    {
        return $this->morphOne(Keyword::class, 'keywordable');
    }
    
    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
