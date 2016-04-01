<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getIndex()
    {
        return redirect('/admin/dashboard');
    }

    public function getDashboard()
    {
        return view('admin.dashboard');
    }
}
