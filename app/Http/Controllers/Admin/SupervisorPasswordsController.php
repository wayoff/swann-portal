<?php

namespace App\Http\Controllers\Admin;


use App\Models\SupervisorPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorPasswordRequest;

class SupervisorPasswordsController extends Controller
{
    protected $passwords;

    public function __construct(SupervisorPassword $passwords)
    {
        $this->passwords = $passwords;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $password = $this->passwords->first();

        return view('admin.supervisor-passwords.index', compact('password'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supervisor-passwords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorPasswordRequest $request)
    {
        $this->passwords->create($request->all());

        return redirect(route('admin.supervisor-passwords.index'))
                        ->with('status', 'Success on Creating Password');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $password = $this->passwords->first();

        return view('admin.supervisor-passwords.edit', compact('password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorPasswordRequest $request, $id)
    {
        $this->passwords->findOrFail($id)->update($request->all());

        return redirect(route('admin.supervisor-passwords.index'))
                        ->with('status', 'Success on Updating Password');
    }
}
