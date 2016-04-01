<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Photo;
use App\Models\Slider;
use App\SwannPortal\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;

class SlidersController extends Controller
{
    protected $sliders;

    public function __construct(Slider $sliders)
    {
        $this->sliders = $sliders;
    }

    public function index()
    {
        $sliders = $this->sliders->all();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request, Photo $photo)
    {
        $photo = (new FileUpload($request, $photo))->handle();

        $this->sliders->create([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'photo_id'    => $photo->id
        ]);

        return redirect(route('admin.sliders.index'))->with('status', 'Success on creating new Slider');
    }

    public function edit($id)
    {
        $slider = $this->sliders->findOrFail($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update($id, SliderRequest $request)
    {
        $this->sliders->findOrFail($id)->update($request->all());

        return redirect(route('admin.sliders.index'))->with('status', 'Success on Updating Slider');
    }

    public function destroy($id)
    {
        $this->sliders->findOrFail(id)->delete();

        return redirect(route('admin.sliders.index'))->with('status', 'Success on Deleting Slider');
    }
}
