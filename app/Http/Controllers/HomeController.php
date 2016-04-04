<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Slider $sliders)
    {
        $sliders = $sliders->all();

        return view('pages.index', compact('sliders'));
    }
}
