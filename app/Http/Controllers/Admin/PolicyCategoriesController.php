<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\PolicyCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class PolicyCategoriesController extends Controller
{
    protected $policyCategories;

    public function __construct(PolicyCategory $policyCategories)
    {
        $this->policyCategories = $policyCategories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policyCategories = $this->policyCategories->where('parent_id', 0)->paginate(20) ;

        return view('admin.policy-categories.index', compact('policyCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.policy-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Country $countries)
    {
        $parent = $this->policyCategories->create($request->all());

        foreach($countries->get() as $key => $country) {
            $this->policyCategories->create([
                'name'      => $country->name,
                'parent_id' => $parent->id,
                'order'     => $key + 1
            ]);
        }

        return redirect(route('admin.policy-categories.index'))
                    ->with('status', 'Success on Adding New Policy Category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policyCategory = $this->policyCategories->findOrFail($id);

        return view('admin.policy-categories.edit', compact('policyCategory'));
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
        $this->policyCategories->findOrFail($id)->update($request->all());

        return redirect(route('admin.policy-categories.index'))
                    ->with('status', 'Success on Updating Policy Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->policyCategories
            ->where('id', $id)
            ->orWhere('parent_id', $id)
            ->delete();


        return redirect(route('admin.policy-categories.index'))
                    ->with('status', 'Success on Deleting Policy Category');
    }
}
