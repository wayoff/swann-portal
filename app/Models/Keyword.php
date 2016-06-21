<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\SwannPortal\Decorators\KeywordSwitcher;

class Keyword extends Model
{
    protected $fillable = [
        'content', 'description'
    ];

    public function procedures()
    {
        return $this->morphedByMany(Procedure::class, 'keywordable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'keywordable');
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'keywordable');
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('content', 'like', '%'. $value .'%')
                     ->orWhere('description', 'like', '%' . $value . '%');
    }

    public function switcher($products, $procedures, $questions)
    {
        $switcher = new KeywordSwitcher($this, $products, $procedures, $questions);

        return $switcher->handle();
    }

    public function scopeFindByContentOrCreate($query, $name)
    {
        $keyword = $query->where('content', $name)->first();

        if (!empty($keyword)) {
            return $keyword;
        }
        
        $keyword = $this->create([
            'content' => $name,
            'description' => ''
        ]);

        return $keyword;
    }
}
