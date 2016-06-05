<?php

namespace App\Http\Controllers\Admin;

use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementsRequest;

class AnnouncementsController extends Controller
{
    protected $announcements;

    public function __construct(Announcement $announcements)
    {
        $this->announcements = $announcements;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = $this->announcements->paginate(20);

        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementsRequest $request)
    {
        $this->announcements->create($request->all());

        return redirect(route('admin.announcements.index'))
                    ->with('success', 'Success on creating new announcement');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = $this->announcements->findOrFail($id);

        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementsRequest $request, $id)
    {
        $this->announcements->findOrFail($id)->update($request->all());

        return redirect(route('admin.announcements.index'))
                    ->with('status', 'Success on Updating Announcement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->announcements->findOrFail($id)->delete();

        return redirect(route('admin.announcements.index'))
                    ->with('status', 'Success on Deleting Announcement');
    }
}
