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

        $model = $keywords
                    ->search($q)
                    ->with(['procedures' => function($query) {
                        $query->distinct()->groupBy('procedures.id');
                    }])
                    ->with(['products' => function($query) {
                        $query->distinct()->groupBy('products.id');
                    }])
                    ->with(['questions' => function($query) {
                        $query->distinct()->groupBy('questions.id');
                    }]);

        // $keywords = $this->keywords->search($request->input('q'))->limit(10);

        // $keywords = $keywords->pluck('content');
        
        $searches = $model->pluck('content')->get();

        if ($searches->isEmpty()) {
            return [];
        }

        return $searches;
    }
}
