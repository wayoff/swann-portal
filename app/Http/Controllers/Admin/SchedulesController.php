<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use App\Models\Document;
use App\SwannPortal\DocumentUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;

class SchedulesController extends Controller
{
    protected $schedules;

    public function __construct(Schedule $schedules)
    {
        $this->schedules = $schedules;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = $this->schedules->first();

        return view('admin.schedules.index', compact('schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request, Document $documents)
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $this->schedules->create([
            'document_id' => $document->id
        ]);

        return redirect(route('admin.schedules.index'))
                    ->with('status', 'Success on adding schedule');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Document $documents, $id)
    {
        $schedule = $this->schedules->findOrFail($id);

        $document = (new DocumentUpload($request, $documents, $schedule->id))->handle();

        $schedule->update([
            'document_id' => $document->id
        ]);

        return redirect(route('admin.schedules.index'))
                        ->with('status', 'Success on updating Schedule');
    }
}
