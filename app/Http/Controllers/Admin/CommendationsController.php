<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Models\Commendation;
use App\SwannPortal\ImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommendationRequest;

class CommendationsController extends Controller
{
    protected $commendations;

    public function __construct(Commendation $commendations)
    {
        $this->commendations = $commendations;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commendations = $this->commendations->paginate(20);

        return view('admin.commendations.index', compact('commendations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commendations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommendationRequest $request, Photo $photo)
    {
        $photo = (new ImageUpload($request, $photo))->handle();

        $this->commendations->create([
            'name'        => $request->input('name'),
            'testimonial' => $request->input('testimonial'),
            'photo_id'    => $photo->id
        ]);

        return redirect(route('admin.commendations.index'))
                ->with('status', 'Success on creating new Commendation');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commendation = $this->commendations->findOrFail($id);

        return view('admin.commendations.edit', compact('commendation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommendationRequest $request, Photo $photos, $id)
    {
        $commendation = $this->commendations->findOrFail($id);

        $photo = (new ImageUpload($request, $photos, $commendation->photo_id))->handle();

        $commendation->findOrFail($id)->update([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'photo_id'    => $photo ? $photo->id : null,
        ]);

        return redirect(route('admin.commendations.index'))
                    ->with('status', 'Success on Updating Commendation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->commendations->findOrFail($id)->delete();

        return redirect(route('admin.commendations.index'))
                    ->with('status', 'Success on Deleting Commendation');
    }
}
