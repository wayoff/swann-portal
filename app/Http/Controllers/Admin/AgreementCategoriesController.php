<?php

namespace App\Http\Controllers\Admin;

use App\Models\AgreementCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class AgreementCategoriesController extends Controller
{
    protected $categories;

    public function __construct(AgreementCategory $agreements)
    {
        $this->categories = $agreements;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->paginate(20);

        return view('admin.agreement-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agreement-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categories->create($request->all());

        return redirect(route('admin.agreement-categories.index'))
                    ->with('status', 'Success On Creating New Category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categories->findOrFail($id);

        return view('admin.agreement-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categories->findOrFail($id)->update($request->all());

        return redirect(route('admin.agreement-categories.index'))
                    ->with('status', 'Success on Updating Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categories->findOrFail($id)->delete();

        return redirect(route('admin.agreement-categories.index'))
                    ->with('status', 'Success on Deleting Category');
    }
}
