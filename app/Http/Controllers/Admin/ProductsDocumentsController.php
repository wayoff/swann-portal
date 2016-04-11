<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\ProductDocumentRequest;
use App\Models\Product;
use App\Models\Document;

use App\SwannPortal\DocumentUpload;
use App\Http\Controllers\Controller;

class ProductsDocumentsController extends Controller
{
    protected $products;
    protected $documents;

    public function __construct(Product $products, Document $documents)
    {
        $this->products = $products;
        $this->documents = $documents;
    }

    public function index($id)
    {
        $product = $this->products->findOrFail($id);

        $documents = $product->documents()->get();

        return view('admin.products.documents.index', compact('product', 'documents'));
    }

    public function create($id)
    {
        $product = $this->products->findOrFail($id);

        return view('admin.products.documents.create', compact('product'));
    }

    public function store($id, ProductDocumentRequest $request)
    {
        $document = (new DocumentUpload($request, $this->documents))->handle();

        $this->products->findOrFail($id)->documents()->save($document, [
                'label'       => $request->input('label') ?: null,
                'description' => $request->input('description') ?: null
        ]);

        return redirect(route('admin.products.{id}.documents.index', $id))
                        ->with('status', 'Success on Adding Document on Product');
    }

    public function edit($id, $documentId)
    {
        $product = $this->products->findOrFail($id);

        $document = $product->documents()->where('id', $documentId)->first();

        return view('admin.products.documents.edit', compact('product', 'document'));
    }

    public function update($id, $documentId, ProductDocumentRequest $request)
    {
        $document = (new DocumentUpload($request, $this->documents, $documentId))->handle();

        $this->products->findOrFail($id)->documents()->updateExistingPivot($documentId, [
                'label'       => $request->input('label') ?: null,
                'description' => $request->input('description') ?: null
        ]);

        return redirect(route('admin.products.{id}.documents.index', $id))
                        ->with('status', 'Success on Updating Document on Product');
    }

    public function destroy($id, $documentId)
    {
        $document = $this->documents->findOrFail($documentId);
        $this->products->findOrFail($id)->documents()->detach($documentId);
        $document->delete();

        return redirect(route('admin.products.{id}.documents.index', $id))->with('status', 'Success on Deleting Document');

    }
}
