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

    public function __construct(Product $products)
    {
        $this->products = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories)
    {
        $categories = $categories->all();

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

        $this->products->create([
            'photo_id'    => $photo ? $photo->id : null,
            'document_id' => $document ? $document->id : null,
            'category_id' => $request->input('category'),
            'name'        => $request->input('name'),
            'model_no'    => $request->input('model_no'),
            'description' => $request->input('description'),
            'featured'    => $request->input('featured')
        ]);

        return redirect(route('admin.products.index'))->with('status', 'Success on Creating new Product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $categories)
    {
        $product = $this->products->findOrFail($id);
        $categories = $categories->all();

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

        $photo = (new ImageUpload($request, $photos, $product->photo_id ?: false))->handle();
        $document = (new DocumentUpload($request, $documents, $product->document_id ?: false))->handle();

        $product->update([
            'photo_id'    => $photo ? $photo->id : null,
            'document_id' => $document ? $document->id : null,
            'category_id' => $request->input('category'),
            'name'        => $request->input('name'),
            'model_no'    => $request->input('model_no'),
            'description' => $request->input('description'),
            'featured'    => $request->input('featured')
        ]);

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
