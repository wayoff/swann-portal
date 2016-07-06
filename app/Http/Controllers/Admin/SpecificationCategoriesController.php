<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Http\Controllers\Controller;

use App\Models\SpecificationCategory;

class SpecificationCategoriesController extends Controller
{

    protected $categories;
    protected $prefix = 'admin.specification-categories.';

    public function __construct(SpecificationCategory $categories)
    {
        $this->categories = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->paginate(20);

        return view($this->prefix . 'index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->prefix . 'create');
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

        return redirect(route($this->prefix . 'index'))
                    ->with('status', 'Success on creating new Category');
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

        return view($this->prefix . 'edit', compact('category'));
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
        $category = $this->categories->findOrFail($id);

        $category->update($request->all());

        return redirect(route($this->prefix . 'index'))
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
        $specification = $this->categories->findOrFail($id);

        $specification->delete();

        return redirect(route($this->prefix . 'index'))
                    ->with('status', 'Success on Deleting Category');
    }
}
