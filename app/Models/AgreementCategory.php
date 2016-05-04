<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgreementCategory extends Model
{
    protected $fillable = ['name'];

    public function agreements()
    {
        return $this->hasMany(Agreement::class, 'agreement_category_id');
    }
}
