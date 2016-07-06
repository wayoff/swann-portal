<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Models\Document;
use App\Models\SpecificationCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

use App\SwannPortal\ImageUpload;
use App\SwannPortal\DocumentUpload;

class ProductsController extends Controller
{
    protected $products;
    protected $categories;
    protected $specificationCategories;

    public function __construct(
            Product $products,
            Category $categories,
            SpecificationCategory $specificationCategories
    )
    {
        $this->products = $products;
        $this->categories = $categories;
        $this->specificationCategories = $specificationCategories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q')?: null;

        $model = $this->products->with('categories');

        if (!empty($q)) {
            $model = $model->searchByNameAndModel($q);
        }
        
        $products = $model->paginate(10);

        return view('admin.products.index', compact('products', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories->all();
        $specificationCategories = $this->specificationCategories->all();

        return view('admin.products.create', compact('categories', 'specificationCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Photo $photos, Document $documents)
    {
        $model = $request->input('model_no');
        $photo = (new ImageUpload($request, $photos))->handle();
        $document = (new DocumentUpload($request, $documents))->handle();

        $product = $this->products->create([
            'photo_id'    => $photo ? $photo->id : null,
            'document_id' => $document ? $document->id : null,
            'name'        => $request->input('name'),
            'model_no'    => $model,
            'description' => $request->input('description'),
            'featured'    => $request->input('featured')
        ]);

        $product->categories()->sync( $request->input('categories') );
        $product->specificationCategories()->sync( $request->input('specification_category') );

        $tags = collect();

        if (strpos($model, ',')) {
            $models = explode(',', $model);
            $tags = collect($models);
        } else {
            $tags = collect([$model]);
        }

        $tags->push($request->input('name'));

        $this->saveTag($tags, $product);

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
        $specificationCategories = $this->specificationCategories->all();

        return view('admin.products.edit', compact('product', 'categories', 'specificationCategories'));
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
        $model = $request->input('model_no');
        
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
        
        $product->categories()->sync( $request->input('categories') );
        $product->specificationCategories()->sync( $request->input('specification_category') );

        $tags = collect();

        if (strpos($model, ',')) {
            $models = explode(',', $model);
            $tags = collect($models);
        } else {
            $tags = collect([$model]);
        }

        $tags->push($request->input('name'));
        
        $this->saveTag($tags, $product);

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

    public function removeDocument($id)
    {
        $this->products->findOrFail($id)->update([
            'document_id' => null
        ]);

        return redirect()->back()->with('status', 'Succesfully removed document');
    }
}
