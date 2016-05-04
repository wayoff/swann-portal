<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Agreement;
use App\Models\SupervisorPassword;
use App\Http\Controllers\Controller;

class AgreementsController extends Controller
{
    protected $agreements;
    protected $passwords;

    public function __construct(
            Agreement $agreements, SupervisorPassword $passwords
    )
    {
        $this->agreements = $agreements;
        $this->passwords = $passwords;
    }

    public function getCheck(Request $request)
    {
        $agreement = $this->passwords
                        ->where('password', $request->input('password'))
                        ->first();

        if(!empty($agreement)) {
            return ['status' => 1];
        }

        return ['status' => 0];
    }

    public function getShow(Request $request)
    {
        $agreement = $this->agreements
                        ->with('document')
                        ->findOrFail($request->input('id'));
        
        $agreement = [
            'id'       => $agreement->id,
            'document' => $agreement->document->getDocument(),
            'content'  => $agreement->content,
            'title'    => $agreement->title,
            'agreed'   => $agreement->users()->where('user_id', auth()->user()->id)->first()
        ];

        return $agreement;
    }

    public function getAgreed(Request $request)
    {
        $agreement = $this->agreements->findOrFail($request->input('id'));

        $agreement->users()->attach(auth()->user()->id);

        return ['status' => 1];
    }
}
