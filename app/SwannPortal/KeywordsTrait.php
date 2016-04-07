<?php
namespace App\SwannPortal;

use App\Models\Keyword;
use Illuminate\Database\Eloquent\Model;

trait KeywordsTrait 
{
    public function saveKeyword(Model $model, array $data)
    {
        $this->keyword('create', $model, [
            'content'     => $data['content'],
            'description' => $data['description']
        ]);
    }

    public function updateKeyword(Model $model, array $data)
    {
        $this->keyword('update', $model, [
            'content'     => $data['content'],
            'description' => $data['description']
        ]);
    }

    public function keyword($action, Model $model, array $data)
    {
        $model->keyword()->$action([
            'content'     => $data['content'],
            'description' => $data['description']
        ]);
    }
}