<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'photo_id', 'document_id', 'name', 'model_no', 'description', 'featured'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function scopeSearchByNameAndModel($query, $value)
    {
        return $query->where('model_no', 'like', '%'. $value .'%')
                    ->orWhere('name', 'like', '%' . $value . '%');
    }

    public function keyword()
    {
        return $this->morphOne(Keyword::class, 'keywordable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // public function documents()
    // {
    //     return $this->belongsToMany(Document::class);
    // }
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

    public function procedures()
    {
        return $this->hasMany(Procedure::class);
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }

    public function firstCategory()
    {
        return $this->categories->first();
    }

    public function hasCategory($categoryId)
    {
        return $this->categories->where('id', $categoryId)->first();
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }
}
