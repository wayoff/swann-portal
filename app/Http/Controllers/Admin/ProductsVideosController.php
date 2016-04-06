<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Product;
use App\SwannPortal\VideoUpload;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;

class ProductsVideosController extends Controller
{
    protected $products;
    protected $videos;

    public function __construct(Product $products, Video $videos)
    {
        $this->products = $products;
        $this->videos = $videos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = $this->products->findOrFail($id);

        $videos = $product->videos()->paginate(20);

        return view('admin.products.videos.index', compact('product', 'videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = $this->products->findOrFail($id);

        return view('admin.products.videos.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, VideoRequest $request)
    {
        $video = (new VideoUpload($request, $this->videos))->handle();
        $this->products->findOrFail($id)->videos()->save($video);

        return redirect(route('admin.products.{id}.videos.index', $id))
                        ->with('status', 'Success on Adding Video on Product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $videoId)
    {
        $product = $this->products->findOrFail($id);
        $video = $product->videos()->where('id', $videoId)->first();

        return view('admin.products.videos.edit', compact('product', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id, $videoId)
    {
        (new VideoUpload($request, $this->videos, $videoId))->handle();

        return redirect(route('admin.products.{id}.videos.index', $id))
                        ->with('status', 'Success on Updating Video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $videoId)
    {
        $video = $this->videos->findOrFail($videoId);

        \File::delete(public_path() . config('swannportal.path.videos') . $video->name . '.' . 'mp4');
        \File::delete(public_path() . config('swannportal.path.videos') . $video->name . '.' . 'ogg');

        $this->products->findOrFail($id)->videos()->detach($videoId);
        $video->delete();

        return redirect(route('admin.products.{id}.videos.index', $id))->with('status', 'Success on Deleting Video');
    }
}
