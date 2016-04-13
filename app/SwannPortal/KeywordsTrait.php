<?php
namespace App\SwannPortal;

use App\Models\Keyword;
use Illuminate\Database\Eloquent\Model;

trait KeywordsTrait 
{

    public function saveTag($tags, Model $model)
    {
        $collection = collect();

        if (empty($tags)) {
            return $model->keywords()->sync([]);
        }

        foreach ($tags as $tag) {
            $keyword = Keyword::findByContentOrCreate($tag);
            $collection->push($keyword->id);
        }

        return $model->keywords()->sync($collection->toArray());
    }
}