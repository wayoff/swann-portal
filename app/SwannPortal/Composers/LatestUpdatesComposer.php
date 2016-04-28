<?php
namespace App\SwannPortal\Composers;

use App\Models\News;
use Illuminate\View\View;

class LatestUpdatesComposer
{
    protected $news;

    function __construct(News $news)
    {
        $this->news = $news;
    }

    public function compose(View $view)
    {
        $news = $this->news->limit(5)->orderBy('id', 'desc')->get();

        return $view->with('latestUpdates', $news);
    }
}