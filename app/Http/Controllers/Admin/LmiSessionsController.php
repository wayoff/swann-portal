<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\LmiSessionRequest;
use App\Models\LmiSessions;
use App\Http\Controllers\Controller;

class LmiSessionsController extends Controller
{
    protected $lmiSessions;

    public function __construct(LmiSessions $lmiSessions)
    {
        $this->lmiSessions = $lmiSessions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lmiSessions = $this->lmiSessions->get();

        return view('admin.lmi-sessions.index', compact('lmiSessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lmi-sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LmiSessionRequest $request)
    {
        $this->lmiSessions->create([
            'name'    => $request->input('name'),
            'user_id' => null
        ]);

        return redirect(route('admin.lmi-sessions.index'))
                    ->with('status', 'Success on Creating New LMI Session');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lmiSession = $this->lmiSessions->findOrFail($id);

        return view('admin.lmi-sessions.edit', compact('lmiSession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LmiSessionRequest $request, $id)
    {
        $this->lmiSessions->findOrFail($id)->update([
            'name' => $request->input('name')
        ]);

        return redirect(route('admin.lmi-sessions.index'))
                    ->with('status', 'Success on Updating LMI session');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->lmiSessions->findOrFail($id)->delete();

        return redirect(route('admin.lmi-sessions.index'))
                    ->with('status', 'Success on Deleting LMI Sessions');
    }
}
