<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Keyword;
use App\Models\Question;
use App\Models\Document;
use App\SwannPortal\DocumentUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;

class QuestionsController extends Controller
{
    protected $questions;

    public function __construct(Question $questions)
    {
        $this->questions = $questions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->questions->doesntHave('products')->where('product_id', null)->paginate(20);

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsRequest $request, Document $documents)
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $question = $this->questions->create([
            'product_id'  => null,
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'answer'      => $request->input('answer'),
            'featured'    => $request->input('featured'),
        ]);

        $this->saveTag($request->input('tags'), $question);

        return redirect(route('admin.questions.index'))->with('status', 'Success on Adding Question');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->questions->findOrFail($id);

        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request, Document $documents, $id)
    {
        $question = $this->questions->findOrFail($id);

        $document = (new DocumentUpload($request, $documents, $question->document_id ?: false))->handle();

        $question->update([
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'answer'      => $request->input('answer'),
            'featured'    => $request->input('featured'),
        ]);

        $this->updateTag($request->input('tags'), $question);

        return redirect(route('admin.questions.index'))->with('status', 'Success on Updating Question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->questions->findOrFail($id)->delete();

        return redirect(route('admin.questions.index'))->with('status', 'Success on Deleting Question');
    }
}
