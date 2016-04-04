<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
}
