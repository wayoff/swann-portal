<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Video;
use App\SwannPortal\VideoUpload;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    protected $videos;

    public function __construct(Video $videos)
    {
        $this->videos = $videos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->videos->paginate(20);

        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $video = (new VideoUpload($request, $this->videos))->handle();
        
        return redirect(route('admin.videos.index'))->with('status', 'Success on Adding Video');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = $this->videos->findOrFail($id);

        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video = (new VideoUpload($request, $this->videos, $id))->handle();

        return redirect(route('admin.videos.index'))->with('status', 'Success on Updating Video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = $this->videos->findOrFail($id);

        \File::delete(public_path() . config('swannportal.path.videos') . $video->name . '.' . 'mp4');
        \File::delete(public_path() . config('swannportal.path.videos') . $video->name . '.' . 'ogg');

        $video->delete();

        return redirect(route('admin.videos.index'))->with('status', 'Success on Deleting Video');
    }
}
