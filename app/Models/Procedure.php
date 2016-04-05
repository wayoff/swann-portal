<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $fillable =[
        'name', 'document_id', 'product_id'
    ];

    public function steps()
    {
        return $this->hasMany(ProcedureStep::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
