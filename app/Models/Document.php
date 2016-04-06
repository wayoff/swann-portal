<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name', 'extension'
    ];

    public function getDocument()
    {
        return url( config('swannportal.path.documents') . $this->name . '.' . $this->extension);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
