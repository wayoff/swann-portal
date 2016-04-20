<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $fillable =[
        'name', 'document_id', 'product_id', 'procedure_category_id'
    ];

    public function procedureCategory()
    {
        return $this->belongsTo(ProcedureCategory::class);
    }

    public function steps()
    {
        return $this->hasMany(ProcedureStep::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function keywords()
    {
        return $this->morphToMany(Keyword::class, 'keywordable');
    }

    public function dividers()
    {
        return $this->belongsToMany(Divider::class);
    }
}
