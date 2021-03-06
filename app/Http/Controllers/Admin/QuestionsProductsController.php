<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Question;
use App\Models\Document;
use App\Models\FaqCategory;
use App\SwannPortal\DocumentUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;

class QuestionsProductsController extends Controller
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
    public function index(Request $request)
    {
        $q = $request->input('q')?:null;

        $questions = $this->questions
                        ->with('products')
                        ->has('products');


        if (!empty($q)) {
            $questions = $questions->searchByTitle($q);
        }

        $questions = $questions->paginate(20);

        return view('admin.questions-products.index', compact('questions', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FaqCategory $faqCategories)
    {
        $faqCategories = $faqCategories->get();

        return view('admin.questions-products.create', compact('faqCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        QuestionsRequest $request, Document $documents, Product $products
    )
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $question = $this->questions->create([
            'product_id'      => null,
            'document_id'     => $document ? $document->id : null,
            'faq_category_id' => $request->input('category'),
            'title'           => $request->input('title'),
            'answer'          => $request->input('answer'),
            'featured'        => $request->input('featured'),
        ]);

        $question->products()->sync($request->input('product'));

        $tags = collect($request->input('tags'));

        $tags = $tags->isEmpty() 
            ? [$request->input('title')]
            : $tags->push($request->input('title'));

        $this->saveTag($tags, $question);

        return redirect(route('admin.questions.products.index'))->with('status', 'Success on Adding Question');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FaqCategory $faqCategories)
    {
        $question = $this->questions->findOrFail($id);

        $faqCategories = $faqCategories->get();

        return view('admin.questions-products.edit', compact('question', 'faqCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $documents, $id)
    {
        $question = $this->questions->findOrFail($id);

        $document = (new DocumentUpload($request, $documents, $question->document_id ?: false))->handle();

        $question->update([
            'document_id'     => $document ? $document->id : null,
            'faq_category_id' => $request->input('category'),
            'title'           => $request->input('title'),
            'answer'          => $request->input('answer'),
            'featured'        => $request->input('featured'),
        ]);

        $question->products()->sync($request->input('product'));

        $tags = collect($request->input('tags'));

        $tags = $tags->isEmpty() 
            ? [$request->input('title')]
            : $tags->push($request->input('title'));

        $this->saveTag($tags, $question);
        
        return redirect(route('admin.questions.products.index'))->with('status', 'Success on Updating Question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = $this->questions->findOrFail($id);

        $products = $question->products;

        $ids = $products->map(function($product) {
            return $product->id;
        });

        $question->products()->detach($ids);
        $question->delete();

        return redirect(route('admin.questions.products.index'))->with('status', 'Success on Deleting Question');
    }
}
