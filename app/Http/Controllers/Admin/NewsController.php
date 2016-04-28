<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Document;

use App\SwannPortal\VideoUpload;
use App\SwannPortal\ImageUpload;
use App\SwannPortal\DocumentUpload;


use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->news->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request, Photo $photos, Video $videos, Document $documents)
    {
        $photo = (new ImageUpload($request, $photos))->handle();
        $video = (new VideoUpload($request, $videos))->handle();
        $document = (new DocumentUpload($request, $documents))->handle();

        $this->news->create([
            'photo_id'    => $photo ? $photo->id : null,
            'video_id'    => $video ? $video->id : null,
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'content'     => $request->input('content')
        ]);

        return redirect(route('admin.news.index'))->with('status', 'Success on adding news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->news->findOrFail($id);

        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        $id, NewsRequest $request,Photo $photos, Video $videos, Document $documents
    )
    {
        $news = $this->news->findOrFail($id);

        $photo = (new ImageUpload($request, $photos, $news->photo_id))->handle();
        $video = (new VideoUpload($request, $videos, $news->video_id))->handle();
        $document = (new DocumentUpload($request, $documents, $news->document_id))->handle();


        $news->update([
            'photo_id'    => $photo ? $photo->id : null,
            'video_id'    => $video ? $video->id : null,
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'content'     => $request->input('content')
        ]);

        return redirect(route('admin.news.index'))->with('status', 'Success on updating news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->news->findOrFail($id)->delete();

        return redirect(route('admin.news.index'));
    }
}
