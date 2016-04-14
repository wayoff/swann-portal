<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\FaqCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class FaqCategoriesController extends Controller
{
    protected $faqCategories;

    public function __construct(FaqCategory $faqCategories)
    {
        $this->faqCategories = $faqCategories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqCategories = $this->faqCategories->paginate(20);

        return view('admin.faq-categories.index', compact('faqCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->faqCategories->create($request->all());

        return redirect(route('admin.faq-categories.index'))->with('status', 'Success On Creating New FAQ\'s Category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqCategory = $this->faqCategories->findOrFail($id);

        return view('admin.faq-categories.edit', compact('faqCategory'));
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
        $this->faqCategories->findOrFail($id)->update($request->all());

        return redirect(route('admin.faq-categories.index'))->with('status', 'Success on Updating Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->faqCategories->findOrFail($id)->delete();

        return redirect(route('admin.faq-categories.index'))->with('status', 'Success on Deleting Category');
    }
}
