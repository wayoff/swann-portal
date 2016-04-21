<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Photo;
use App\Models\Product;

use App\SwannPortal\ImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoProductRequest;

class PhotoProductController extends Controller
{
    protected $products;
    protected $photos;

    public function __construct(Product $products, Photo $photos)
    {
        $this->products = $products;
        $this->photos = $photos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = $this->products->findOrFail($id);

        $photos = $product->photos()->get();

        return view('admin.products.photos.index', compact('product', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = $this->products->findOrFail($id);

        return view('admin.products.photos.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, PhotoProductRequest $request)
    {
        $product = $this->products->findOrFail($id);

        $photo = (new ImageUpload($request, $this->photos))->handle();

        $product->photos()->save($photo);

        return redirect(route('admin.products.{id}.photos.index', $id))
                        ->with('status', 'Success On Adding New Photo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $photoId)
    {
        $product = $this->products->findOrFail($id);

        $photo = $product->photos()->where('photo_id', $photoId)->first();

        return view('admin.products.photos.edit', compact('product', 'photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id, $photoId, PhotoProductRequest $request)
    {
        $photo = (new ImageUpload($request, $this->photos, $photoId))->handle();

        return redirect(route('admin.products.{id}.photos.index', $id))
                        ->with('status', 'Success on Updating Image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $photoId)
    {
        $photo = $this->photos->findOrFail($photoId);

        $this->products->findOrFail($id)->photos()->detach($photoId);

        $photo->delete();

        return redirect(route('admin.products.{id}.photos.index', $id))
                            ->with('status', 'Success on deleting photo');
    }
}
