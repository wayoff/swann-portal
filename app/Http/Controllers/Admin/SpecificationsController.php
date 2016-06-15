<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Specification;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecificationsRequest;

class SpecificationsController extends Controller
{
    protected $specifications;

    public function __construct(Specification $specifications)
    {
        $this->specifications = $specifications;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specifications = $this->specifications->with('category')->paginate(20);

        return view('admin.specifications.index', compact('specifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories)
    {
        $categories = $categories->get();

        return view('admin.specifications.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecificationsRequest $request)
    {
        $this->specifications->create($request->all());

        return redirect(route('admin.specifications.index'))
                    ->with('status', 'Success on Creating new Specification');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $categories)
    {
        $specification = $this->specifications->findOrFail($id);

        $categories = $categories->get();

        return view('admin.specifications.edit', compact('specification', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecificationsRequest $request, $id)
    {
        $this->specifications->findOrFail($id)->update( $request->all() );

        return redirect(route('admin.specifications.index'))
                    ->with('status', 'Success on Updating Specification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->specifications->findOrFail($id)->delete();

        return redirect(route('admin.specifications.index'))
                    ->with('status', 'Success On Deleting Specification');
    }
}
