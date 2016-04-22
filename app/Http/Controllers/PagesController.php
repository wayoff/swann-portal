<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use App\Http\Requests;
use App\Models\Keyword;
use App\Models\Warranty;
use App\Models\Question;
use App\Models\PolicyCategory;
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

    public function getLmiSessions()
    {
        return view('pages.lmi-sessions');
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
                        'products', 'products.categories',
                        'procedures.products', 'questions.products',
                        'procedures.document', 'questions.document',
                        'procedures.products.categories',
                        'questions.products.categories',
                    ])
                    ->paginate(20);
        return view('pages.search', compact('searches', 'q'));
    }

    public function getTimezone($state)
    {
        $timezones = config('timezone.states.' . $state);

        if (empty($timezones)) {
            return redirect()->back();
        }
        $timezones = collect($timezones);
        $title = string_slug_to_word('-', $state);
        $now = \Carbon\Carbon::now();


        return view('pages.timezone', compact('timezones', 'title', 'now'));
    }

    public function getWarranties(
            $state, Warranty $warranties, PolicyCategory $policyCategories
    )
    {
        $policyCategory = $policyCategories->with('parent')->findOrFail($state);

        $warranties = $warranties
        ->with(['document', 'categories'])
        ->whereHas('categories', function($query) use($state) {
            $query->where('policy_categories.id', $state);
        })->get();

        return view('pages.warranties', compact('warranties', 'policyCategory'));
    }
}
