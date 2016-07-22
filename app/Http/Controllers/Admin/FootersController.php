<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Footer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FootersController extends Controller
{
    protected $footers;

    public function __construct(Footer $footers)
    {
        $this->footers = $footers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = $this->footers->all();

        return view('admin.footers.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer = $this->footers->findOrFail($id);

        return view('admin.footers.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->footers->findOrFail($id)->update($request->all());

        return redirect('/admin/footers')
                ->with('status', 'Success on updating footer content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
