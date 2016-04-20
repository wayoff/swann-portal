<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\ProcedureCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcedureCategoriesRequest;

class ProcedureCategoriesController extends Controller
{
    protected $procedureCategories;

    public function __construct(ProcedureCategory $procedureCategories)
    {
        $this->procedureCategories = $procedureCategories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedureCategories = $this->procedureCategories->paginate(20);

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
    public function store(ProcedureCategoriesRequest $request)
    {
        $this->procedureCategories->create($request->all());

        return redirect(route('admin.procedure-categories.index'))
                    ->with('status', 'Success on Creating new Trouble Shooting Category');
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
    public function update(ProcedureCategoriesRequest $request, $id)
    {
        $this->procedureCategories->findOrFail($id)->update($request->all());

        return redirect(route('admin.procedure-categories.index'))
                    ->with('status', 'Success on Creating new Trouble Shooting Category');
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

        return redirect(route('admin.procedure-categories.index'))
                    ->with('status', 'Success on Deleting Category');
    }
}
