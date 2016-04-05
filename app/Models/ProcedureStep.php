<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcedureStep extends Model
{
    protected $fillable = [
        'procedure_id', 'photo_id', 'content'
    ]

    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
