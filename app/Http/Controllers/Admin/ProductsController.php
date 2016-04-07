<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Models\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

use App\SwannPortal\ImageUpload;
use App\SwannPortal\DocumentUpload;

class ProductsController extends Controller
{
    protected $products;
    protected $categories;

    public function __construct(Product $products, Category $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->with('categories')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories->all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Photo $photos, Document $documents)
    {

        $photo = (new ImageUpload($request, $photos))->handle();
        $document = (new DocumentUpload($request, $documents))->handle();

        $product = $this->products->create([
            'photo_id'    => $photo ? $photo->id : null,
            'document_id' => $document ? $document->id : null,
            'name'        => $request->input('name'),
            'model_no'    => $request->input('model_no'),
            'description' => $request->input('description'),
            'featured'    => $request->input('featured')
        ]);

        $this->saveKeyword($product, [
            'content'     => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $product->categories()->sync( $request->input('categories') );

        return redirect(route('admin.products.index'))->with('status', 'Success on Creating new Product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->products->findOrFail($id);
        $categories = $this->categories->all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Photo $photos, Document $documents, $id)
    {
        $product = $this->products->findOrFail($id);
        
        $photoId = !is_null($product->photo_id) ? $product->photo_id : false;
        $documentId = !is_null($product->document_id) ? $product->document_id : false;

        $photo = (new ImageUpload($request, $photos, $photoId))->handle();
        $document = (new DocumentUpload($request, $documents, $documentId))->handle();

        $product->update([
            'photo_id'    => $photo ? $photo->id : null,
            'document_id' => $document ? $document->id : null,
            'name'        => $request->input('name'),
            'model_no'    => $request->input('model_no'),
            'description' => $request->input('description'),
            'featured'    => $request->input('featured')
        ]);

        $this->saveKeyword($product, [
            'content'     => $request->input('name'),
            'description' => $request->input('description')
        ]);
        
        $product->categories()->sync( $request->input('categories') );

        return redirect(route('admin.products.index'))->with('status', 'Success on Updating Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->products->findOrFail($id)->delete();

        return redirect(route('admin.products.index'))->with('status', 'Success on Deleting Product');
    }
}
