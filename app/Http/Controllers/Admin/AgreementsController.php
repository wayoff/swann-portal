<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Document;
use App\Models\Agreement;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgreementsRequest;

use App\SwannPortal\DocumentUpload;

class AgreementsController extends Controller
{
    protected $agreements;

    public function __construct(Agreement $agreements)
    {
        $this->agreements = $agreements;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agreements = $this->agreements->paginate(20);

        return view('admin.agreements.index', compact('agreements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agreements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgreementsRequest $request, Document $documents)
    {
        $document = (new DocumentUpload($request, $documents))->handle();

        $agreement = $this->agreements->create([
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'content'     => $request->input('content')
        ]);

        return redirect(route('admin.agreements.index'))
                    ->with('status', 'Success on Creating New Agreement');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agreement = $this->agreements->findOrFail($id);

        return view('admin.agreements.edit', compact('agreement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgreementsRequest $request, Document $documents, $id)
    {
        $agreement = $this->agreements->findOrFail($id);

        $documentId = !is_null($agreement->document_id) 
                        ? $agreement->document_id 
                        : false;

        $document = (new DocumentUpload($request, $documents, $documentId))->handle();

        $agreement->update([
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'content'     => $request->input('content')
        ]);

        return redirect(route('admin.agreements.index'))
                    ->with('status', 'Success on Updating Agreement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->agreements->findOrFail($id)->delete();

        return redirect(route('admin.agreements.index'))
                    ->with('status', 'Success on deleting agreement');
    }
}
