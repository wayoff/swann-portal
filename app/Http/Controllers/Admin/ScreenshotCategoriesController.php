<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ScreenshotCategory;
use App\Http\Controllers\Controller;

class ScreenshotCategoriesController extends Controller
{
    protected $categories;

    public function __construct(ScreenshotCategory $categories)
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

        return view('admin.screenshot-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.screenshot-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->categories->create($request->all());

        return redirect(route('admin.screenshot-categories.index'))
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

        return view('admin.screenshot-categories.edit', compact('category'));
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
        $this->categories->findOrFail($id)->update($request->all());

        return redirect(route('admin.screenshot-categories.index'))
                    ->with('status', 'Success On Updating Category');
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

        return redirect(route('admin.screenshot-categories.index'))
                    ->with('status', 'Success On Deleting Category');
    }
}
