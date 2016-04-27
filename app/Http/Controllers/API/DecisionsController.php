<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Decision;
use App\Models\Procedure;
use App\Http\Controllers\Controller;

class DecisionsController extends Controller
{
    protected $decisions;

    public function __construct(Decision $decisions)
    {
        $this->decisions = $decisions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = $this->decisions;

        if ($request->input('procedureId')) {
            $model = $model->where('procedure_id', $request->input('procedureId'));
        }

        $decisions = $model->whereIsAParent()->get();

        return $decisions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $decision = $this->decisions->create([
            'procedure_id' => $request->input('procedureId'),
            'title'        => $request->input('title'),
            'parent_id'    => null,
            'label'        => 'Parent',
            'position'     => 'Middle',
        ]);

        return $decision;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $decision = $this->decisions->findOrFail($id);
        $decision->left  = $decision->leftChild();
        $decision->right = $decision->rightChild();

        return $decision;
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
        //
    }
}
