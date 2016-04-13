<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Document;
use App\Models\Procedure;
use App\Models\ProcedureStep;

use App\Http\Requests\ProcedureStepRequest;
use App\Http\Controllers\Controller;


use App\SwannPortal\ImageUpload;
use App\SwannPortal\DocumentUpload;

class ProductsProceduresStepsController extends Controller
{
    protected $products;
    protected $procedures;
    protected $procedureSteps;

    public function __construct(
        Product $products, Procedure $procedures, ProcedureStep $procedureSteps
    ) {
        $this->products = $products;
        $this->procedures = $procedures;
        $this->procedureSteps = $procedureSteps;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $procedureId)
    {
        $product = $this->products->findOrFail($id);
        $procedure = $this->procedures->findOrFail($procedureId);
        $steps = $procedure->steps()->with(['photo', 'document'])->get();

        return view('admin.products.procedures.steps.index',
                    compact('product', 'procedure', 'steps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $procedureId)
    {
        $product = $this->products->findOrFail($id);
        $procedure = $this->procedures->findOrFail($procedureId);

        return view('admin.products.procedures.steps.create',
                    compact('product', 'procedure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedureStepRequest $request, $id, $procedureId, Photo $photos, Document $documents)
    {
        $photo = (new ImageUpload($request, $photos))->handle();
        $document = (new DocumentUpload($request, $documents))->handle();


        $step = $this->procedureSteps->create([
            'procedure_id'=> $procedureId,
            'photo_id'    => $photo ? $photo->id : null,
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'content'     => $request->input('content'),
        ]);

        return redirect(route('admin.products.{id}.procedures.{procedureId}.steps.index',[$id, $procedureId]))
                ->with('status', 'Success on creating new step');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $procedureId, $stepId)
    {
        $product = $this->products->findOrFail($id);
        $procedure = $this->procedures->findOrFail($procedureId);
        $step = $this->procedureSteps->findOrFail($stepId);

        return view('admin.products.procedures.steps.edit',
                    compact('product', 'procedure', 'step'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        ProcedureStepRequest $request, Photo $photos, Document $documents, $id, $procedureId, $stepId
    )
    {
        $step = $this->procedureSteps->findOrFail($stepId);

        $photoId = !is_null($step->photo_id) ? $step->photo_id : false;
        $documentId = !is_null($step->document_id) ? $step->document_id : false;

        $photo = (new ImageUpload($request, $photos, $photoId))->handle();
        $document = (new DocumentUpload($request, $documents, $documentId))->handle();

        $step->update([
            'photo_id'    => $photo ? $photo->id : null,
            'document_id' => $document ? $document->id : null,
            'title'       => $request->input('title'),
            'content'     => $request->input('content'),
        ]);

        return redirect(route('admin.products.{id}.procedures.{procedureId}.steps.index',[$id, $procedureId]))
                ->with('status', 'Success on updating step');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $procedureId, $stepId)
    {
        $step = $this->procedureSteps->findOrFail($stepId);
        
        $step->delete();

        return redirect(route('admin.products.{id}.procedures.{procedureId}.steps.index',[$id, $procedureId]))
                ->with('status', 'Success on deleting step');
    }
}
