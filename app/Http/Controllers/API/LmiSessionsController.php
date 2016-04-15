<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
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
        return $this->lmiSessions->with('user')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->lmiSessions->findOrFail($request->input('id'))->update([
            'user_id' => $request->input('user_id')
        ]);

        return ['status' => 'ok'];
    }
}
