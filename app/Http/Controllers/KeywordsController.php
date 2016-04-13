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
        $keywords = $this->keywords->search($request->input('q'))->limit(10);

        $keywords = $keywords->pluck('content');

        return $keywords;
    }
}
