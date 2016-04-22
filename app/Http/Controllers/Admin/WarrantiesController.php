<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Warranty;
use App\Models\Document;
use App\Models\PolicyCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarrantyRequest;

use App\SwannPortal\DocumentUpload;

class WarrantiesController extends Controller
{
    protected $warranties;
    protected $policyCategories;

    public function __construct(
            Warranty $warranties, PolicyCategory $policyCategories
    )
    {
        $this->warranties = $warranties;
        $this->policyCategories = $policyCategories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warranties = $this->warranties
                        ->with(['categories', 'categories.parent'])
                        ->get();

        return view('admin.warranties.index', compact('warranties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $policyCategories = $this->policyCategories
                                ->with('children')
                                ->where('parent_id', 0)
                                ->get();

        return view('admin.warranties.create', compact('policyCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarrantyRequest $request, Document $documents)
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $warranty = $this->warranties->create([
            'name'               => $request->input('name'),
            'document_id'        => $document ? $document->id : null
        ]);

        if($request->input('countries')) {
            $warranty->categories()->sync($request->input('countries'));
        }

        return redirect(route('admin.warranties.index'))
                    ->with('status', 'Sucess on Creating New Warranty');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warranty = $this->warranties->findOrFail($id);

        $policyCategories = $this->policyCategories
                                ->with('children')
                                ->where('parent_id', 0)
                                ->get();

        return view('admin.warranties.edit', compact('warranty', 'policyCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarrantyRequest $request, Document $documents, $id)
    {
        $warranty = $this->warranties->findOrFail($id);
        
        $documentId = !is_null($warranty->document_id) ? $warranty->document_id : false;
        $document = (new DocumentUpload($request, $documents, $documentId))->handle();

        $warranty->update([
            'name'               => $request->input('name'),
            'document_id'        => $document ? $document->id : null
        ]);

        if($request->input('countries')) {
            $warranty->categories()->sync($request->input('countries'));
        }

        return redirect(route('admin.warranties.index'))
                    ->with('status', 'Success on updating warranty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->warranties->findOrFail($id)->delete();

        return redirect(route('admin.warranties.index'))
                    ->with('status', 'Success on Deleting Warranty');
    }
}
