<?php
namespace App\SwannPortal\Composers;

use App\Models\Tag;
use Illuminate\View\View;

class FormTagComposer
{
    protected $tags;

    function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }

    public function compose(View $view)
    {
        $tags = $this->tags->all();

        return $view->with('tags', $tags);
    }
}