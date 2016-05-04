<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'document_id',
        'agreement_category_id'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function category()
    {
        return $this->belongsTo(AgreementCategory::class, 'agreement_category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
