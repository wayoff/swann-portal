<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ProcedureCategory;
use App\Http\Controllers\Controller;

class ProcedureCategoriesController extends Controller
{
    protected $procedureCategory;

    public function __construct(ProcedureCategory $procedureCategory)
    {
        $this->procedureCategory = $procedureCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedureCategories = $this->procedureCategory->get();

        return view('admin.procedure-categories.index', compact('procedureCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.procedure-categories.create');
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
        $procedureCategory = $this->procedureCategories->findOrFail($id);

        return view('admin.procedure-categories.edit', compact('procedureCategory'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->procedureCategories->findOrFail($id)->delete();

        return redirect(route('admin.procedure-categories'))
                    ->with('status', 'Success on Deleting Category')
    }
}
