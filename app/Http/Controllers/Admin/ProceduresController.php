<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Document;
use App\Models\Procedure;
use App\Models\ProcedureCategory;
use App\SwannPortal\DocumentUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDocumentRequest;

class ProceduresController extends Controller
{
    protected $procedures;

    public function __construct(Procedure $procedures)
    {
        $this->procedures = $procedures;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedures = $this->procedures
                            ->with(['products', 'procedureCategory'])
                            ->whereNull('product_id')
                            ->paginate(20);

        return view('admin.procedures.index', compact('procedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProcedureCategory $procedureCategories)
    {
        $procedureCategories = $procedureCategories->get();

        return view('admin.procedures.create', compact('procedureCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDocumentRequest $request, Document $documents, Product $products)
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $procedure = $this->procedures->create([
            'product_id'            => null,
            'document_id'           => $document ? $document->id : null,
            'name'                  => $request->input('name'),
            'procedure_category_id' => $request->input('procedure_category_id')
        ]);
        
        $procedure->products()->sync($request->input('product'));

        $tags = collect($request->input('tags'));

        $tags = $tags->isEmpty() 
            ? [$request->input('name')]
            : $tags->push($request->input('name'));

        $this->saveTag($tags, $procedure);

        return redirect(route('admin.procedures.index'))->with('success', 'Success on Adding new Troubleshootin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ProcedureCategory $procedureCategories)
    {
        $procedure = $this->procedures->findOrFail($id);
        $procedureCategories = $procedureCategories->get();

        return view('admin.procedures.edit', compact('procedure', 'procedureCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $documents, $id)
    {
        $procedure = $this->procedures->findOrFail($id);

        $document = (new DocumentUpload($request, $documents, $procedure->document_id ?: false))->handle();

        $procedure->update([
            'product_id'            => null,
            'document_id'           => $document ? $document->id : null,
            'name'                  => $request->input('name'),
            'procedure_category_id' => $request->input('procedure_category_id')
        ]);

        $procedure->products()->sync($request->input('product'));
        
        $tags = collect($request->input('tags'));

        $tags = $tags->isEmpty() 
            ? [$request->input('name')]
            : $tags->push($request->input('name'));

        $this->saveTag($tags, $procedure);

        return redirect(route('admin.procedures.index'))->with('success', 'Success on Updating Troubleshootin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedure = $this->procedures->findOrFail($id);
        $products = $procedure->products;

        if(!$products->isEmpty()) {
            $ids = $products->map(function($product) {
                return $product->id;
            });

            $procedure->products()->detach($ids);
        }
        
        $procedure->delete();

        return redirect(route('admin.procedures.index'))->with('success', 'Success on Deleting Troubleshootin');
    }
}
