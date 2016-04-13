<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Tag;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    protected $tags;

    public function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tags->paginate(20);

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $this->tags->create([
            'name'        => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect(route('admin.tags.index'))->with('successs', 'Success on Creating New Tag');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tags->findOrFail($id);

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = $this->tags->findOrFail($id);

        $tag->update([
            'name'        => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect(route('admin.tags.index'))->with('successs', 'Success on Updating Tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tags->findOrFail($id)->delete();

        return redirect(route('admin.tags.index'))->with('successs', 'Success on Deleting Tag');
    }
}
