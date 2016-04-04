<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'photo_id', 'document_id', 'name', 'model_no', 'description', 'featured'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
