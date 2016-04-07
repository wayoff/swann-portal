<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Document;
use App\Models\Procedure;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcedureRequest;

use App\SwannPortal\DocumentUpload;

class ProductsProceduresController extends Controller
{
    protected $products;
    protected $procedures;

    public function __construct(Product $products, Procedure $procedures)
    {
        $this->products = $products;
        $this->procedures = $procedures;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = $this->products->findOrFail($id);
        $procedures = $product->procedures;

        return view('admin.products.procedures.index', compact('product', 'procedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = $this->products->findOrFail($id);

        return view('admin.products.procedures.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedureRequest $request, Document $documents, $id)
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $procedure = $this->procedures->create([
            'product_id'  => $id,
            'document_id' => $document ? $document->id : null,
            'name'        => $request->input('name')
        ]);

        $this->saveKeyword($procedure, [
            'content'     => $request->input('name'),
            'description' => ''
        ]);

        return redirect(route('admin.products.{id}.procedures.index', $id))->with('status', 'Success on Creating Adding new Procedure');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $procedureId)
    {
        $product = $this->products->findOrFail($id);
        $procedure = $this->procedures->findOrFail($procedureId);

        return view('admin.products.procedures.edit', compact('product', 'procedure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedureRequest $request, Document $documents, $id, $procedureId)
    {
        $procedure = $this->procedures->findOrFail($procedureId);

        $document = (new DocumentUpload($request, $documents, $procedure->document_id ?: false))->handle();

        $procedure->update([
            'document_id' => $document ? $document->id : null,
            'name'        => $request->input('name')
        ]);

        $this->updateKeyword($video, [
            'content'     => $request->input('name'),
            'description' => ''
        ]);

        return redirect(route('admin.products.{id}.procedures.index', $id))->with('status', 'Success on Updating Procedures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $procedureId)
    {
        $this->procedures->findOrFail($procedureId)->delete();

        return redirect(route('admin.products.{id}.procedures.index', $id))->with('status', 'Success on Deleting Question');
    }
}
