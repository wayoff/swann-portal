<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Excel;
use App\Http\Requests;
use App\Models\Feedback;
use App\Http\Controllers\Controller;

class FeedbacksController extends Controller
{
    protected $feedbacks;

    public function __construct( Feedback $feedbacks )
    {
        $this->feedbacks = $feedbacks;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = $this->feedbacks->orderBy('id', 'desc')->paginate(20);

        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->feedbacks->create($request->all());

        return ['status' => 1];
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->feedbacks->findOrFail($id)->delete();

        return redirect()->back()->with('status', 'Success on deleting feedback');
    }



    public function export(Request $request)
    {
        $feedbacks = $this->feedbacks->get();
        
        return Excel::create('Feedback', function($excel) use($feedbacks) {
            $excel->sheet('IKBFEEDBACK', function($sheet) use($feedbacks) {
                $sheet->loadView('excel.feedback', compact('feedbacks'));
            });
        })->export('xls');
    }
}
