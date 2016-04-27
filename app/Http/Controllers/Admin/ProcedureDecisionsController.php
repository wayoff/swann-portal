<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Decision;
use App\Models\Procedure;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcedureDecisionRequest;

class ProcedureDecisionsController extends Controller
{
    protected $decisions;
    protected $procedures;

    public function __construct(Decision $decisions, Procedure $procedures)
    {
        $this->decisions = $decisions;
        $this->procedures = $procedures;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $procedure = $this->procedures->findOrFail($id);
        $decision = $procedure->trees()->whereIsAParent()->first();

        return view('admin.procedures.decisions.index',
                            compact('procedure', 'decision'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $procedure = $this->procedures->findOrFail($id);
        $parent = $this->decisions->findOrFail($request->input('parent'));

        return view('admin.procedures.decisions.create',
                        compact('procedure', 'parent')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, ProcedureDecisionRequest $request)
    {
        $this->decisions->create([
            'procedure_id' => $id,
            'parent_id'    => $request->input('parent'),
            'title'        => $request->input('title'),
            'label'        => $request->input('label'),
            'position'     => 'Branch'
        ]);

        return redirect(route('admin.procedures.{id}.decisions.index', $id))
                    ->with('status', 'Success on Creating new Decision Branch');
    }

    public function edit($id, $decisionId)
    {
        $decision = $this->decisions->findOrFail($decisionId);

        $procedure = $this->procedures->findOrFail($id);

        return view('admin.procedures.decisions.edit',
                    compact('decision', 'procedure')
        );
    }

    public function update($id, $decisionId, ProcedureDecisionRequest $request)
    {
        $decision = $this->decisions->findOrFail($decisionId)->update([
            'title' => $request->input('title'),
            'label' => $request->input('label')
        ]);

        return redirect(route('admin.procedures.{id}.decisions.index', $id))
                    ->with('status', 'Success on Updating Decision Branch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $decisionId)
    {
        $this->decisions->where('id', $decisionId)->delete();

        return redirect(route('admin.procedures.{id}.decisions.index', $id))
                        ->with('status', 'Success On Deleting Decision Branch');
    }

    public function start($id)
    {
        $procedure = $this->procedures->findOrFail($id);

        $this->decisions->create([
            'procedure_id' => $id,
            'parent_id'    => null,
            'title'        => $procedure->name,
            'label'        => 'Procedure',
            'position'     => 'Middle'
        ]);

        return redirect(route('admin.procedures.{id}.decisions.index', $id));
    }
}
