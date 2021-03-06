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

    public function specifications()
    {
        return $this->belongsToMany(Specification::class)
                    ->withPivot('value', 'link_to');
    }

    public function scopeSearchByNameAndModel($query, $value)
    {
        return $query->where('model_no', 'like', '%'. $value .'%')
                    ->orWhere('name', 'like', '%' . $value . '%');
    }

    public function scopeLastUpdated($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    public function keywords()
    {
        return $this->morphToMany(Keyword::class, 'keywordable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function specificationCategories()
    {
        return $this->belongsToMany(SpecificationCategory::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class)->withPivot('label', 'description');
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function screenshots()
    {
        return $this->belongsToMany(Screenshot::class);
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

    public function getLink()
    {
        return route(
            'categories.{id}.products.show',
            [$this->firstCategory()->id, $this->id]
        );
    }

    public function hasCategory($categoryId)
    {
        return $this->categories->where('id', $categoryId)->first();
    }

    public function hasSpecificationCategory($categoryId)
    {
        return $this->specificationCategories->where('id', $categoryId)->first();
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function troubleShooting()
    {
        return $this->belongsToMany(Procedure::class);
    }

    public function otherQuestions()
    {
        return $this->belongsToMany(Question::class);
    }
}
