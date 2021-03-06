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
        $procedureCategories = $this->procedureCategories->where('parent_id', 0)->get();

        return view('admin.procedure-categories.index', compact('procedureCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parentId = $request->input('parent');

        $parents = $this->procedureCategories->where('parent_id', 0)->get();

        return view('admin.procedure-categories.create', compact('parents', 'parentId'));
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

        $parents = $this->procedureCategories
                        ->where('parent_id', 0)
                        ->whereNotIn('id', [$id])
                        ->get();

        return view('admin.procedure-categories.edit', compact('procedureCategory', 'parents'));
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
        $parent = $this->procedureCategories->findOrFail($id);
        
        $this->procedureCategories->where('parent_id', $parent->id)->delete();

        $parent->delete();

        return redirect(route('admin.procedure-categories.index'))
                    ->with('status', 'Success on Deleting Category');
    }
}
