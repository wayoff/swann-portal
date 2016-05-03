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
}
