<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Question;
use App\Models\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;

use App\SwannPortal\DocumentUpload;

class ProductsQuestionsController extends Controller
{
    protected $products;
    protected $questions;

    public function __construct(Product $products, Question $questions)
    {
        $this->products = $products;
        $this->questions = $questions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = $this->products->findOrFail($id);
        $questions = $product->questions;

        return view('admin.products.questions.index', compact('product', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = $this->products->findOrFail($id);

        return view('admin.products.questions.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsRequest $request, Document $documents, $id)
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $this->questions->create([
            'product_id'  => $id,
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'answer'      => $request->input('answer'),
            'featured'    => $request->input('featured'),
        ]);

        return redirect(route('admin.products.{id}.questions.index', $id))->with('status', 'Success on Creating Adding new Question');
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
    public function edit($id, $questionId)
    {
        $product = $this->products->findOrFail($id);
        $question = $this->questions->findOrFail($questionId);

        return view('admin.products.questions.edit', compact('product', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request, Document $documents, $id, $questionId)
    {
        $question = $this->questions->findOrFail($questionId);

        $document = (new DocumentUpload($request, $documents, $question->document_id ?: false))->handle();

        $question->update([
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'answer'      => $request->input('answer'),
            'featured'    => $request->input('featured'),
        ]);

        return redirect(route('admin.products.{id}.questions.index', $id))->with('status', 'Success on Updating Question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $questionId)
    {
        $this->questions->findOrFail($questionId)->delete();

        return redirect(route('admin.products.{id}.questions.index', $id))->with('status', 'Success on Deleting Question');
    }
}
