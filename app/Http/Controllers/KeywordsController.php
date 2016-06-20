<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Keyword;

class KeywordsController extends Controller
{
    protected $keywords;

    public function __construct(Keyword $keywords)
    {
        $this->keywords = $keywords;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');

        $model = $this->keywords
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
                    ]);

        $searches = $model->get();
        $results = collect();

        foreach($searches as $searchable) :
            $contents = $searchable->switcher();
            foreach($contents as $content) :
                $results->push($content->title());
            endforeach;
        endforeach;

        return $results->unique()->values()->all();
    }
}
