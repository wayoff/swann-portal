<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Decision;
use App\Models\Procedure;
use App\Http\Controllers\Controller;

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
        $decisions = $procedure->trees()->whereIsAParent()->get();

        return view('admin.procedures.decisions.index',
                            compact('procedure', 'decisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $procedure = $this->procedures->findOrFail($id);

        return view('admin.procedures.decisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        return redirect(route('admin.procedures.{id}.decisions', $id))
                    ->with('status', 'Success on Creating new Decision Tree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idm, $decisionId)
    {
        $this->decisions
                ->where('id', $decisionId)
                ->orWhere('parent_id', $decisionId)
                ->delete();

        return redirect(route('admin.procedures.{id}.decisions.index', $id))
                        ->with('status', 'Success On Deleting Decision Tree');
    }
}
