<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use App\Http\Requests;
use App\Models\Keyword;
use App\Models\Question;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        return redirect('home');
    }

    public function getHome()
    {
        return view('pages.index');
    }

    public function getVideos(Video $videos)
    {
        $videos = $videos->where('featured', 1)->get();

        return view('pages.videos', compact('videos'));
    }

    public function getFaq(Question $questions)
    {
        $questions = $questions->where('featured', 1)->get();

        return view('pages.faq', compact('questions'));
    }

    public function getNews(News $news)
    {
        $news = $news->orderBy('id', 'desc')->paginate(1);
        
        return view('pages.news', compact('news'));
    }

    public function getSearch(Request $request, Keyword $keywords)
    {
        $q = $request->input('q');

        $searches = $keywords
                    ->search($q)
                    ->with(['procedures' => function($query) {
                        $query->distinct()->groupBy('procedures.id');
                    }])
                    ->with(['products' => function($query) {
                        $query->distinct()->groupBy('products.id');
                    }])
                    ->with(['questions' => function($query) {
                        $query->distinct()->groupBy('questions.id');
                    }])
                    ->with([
                        'procedures.products', 'questions.products',
                        'procedures.document', 'questions.document',
                        'products.categories'
                    ])
                    ->paginate(20);
        return view('pages.search', compact('searches', 'q'));
    }
}
