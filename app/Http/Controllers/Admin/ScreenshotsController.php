<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Photo;
use App\Models\Screenshot;
use App\Models\ScreenshotCategory;
use App\Http\Controllers\Controller;

use App\SwannPortal\ImageUpload;

class ScreenshotsController extends Controller
{
    protected $screenshots;

    public function __construct(Screenshot $screenshots)
    {
        $this->screenshots = $screenshots;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screenshots = $this->screenshots->orderBy('id', 'desc')->paginate(20);

        return view('admin.screenshots.index', compact('screenshots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ScreenshotCategory $categories)
    {
        $categories = $categories->get();

        return view('admin.screenshots.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Photo $photos)
    {
        $photo = (new ImageUpload($request, $photos))->handle();

        $screenshot = $this->screenshots->create([
            'name'        => $request->input('name'),
            'photo_id'    => $photo->id,
            'category_id' => $request->input('category_id'),
            'order'       =>$request->input('order')
        ]);

        $screenshot->products()->sync($request->input('product'));

        return redirect(route('admin.screenshots.index'))
                    ->with('status', 'Success on Adding New Screenshot');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ScreenshotCategory $categories)
    {
        $screenshot = $this->screenshots->findOrFail($id);

        $categories = $categories->get();

        return view('admin.screenshots.edit', compact('screenshot', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photos, $id)
    {
        $screenshot = $this->screenshots->findOrFail($id);

        $photo = (new ImageUpload($request, $photos, $screenshot->photo_id))->handle();

        $screenshot->update([
            'name'        => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'order'       =>$request->input('order')
        ]);

        $screenshot->products()->sync($request->input('product'));

        return redirect(route('admin.screenshots.index'))
                    ->with('status', 'Success on Updating Screenshot Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->screenshots->findOrFail($id)->delete();

        return redirect(route('admin.screenshots.index'))
                    ->with('status', 'Success on Deleting Screenshot Data');
    }
}
