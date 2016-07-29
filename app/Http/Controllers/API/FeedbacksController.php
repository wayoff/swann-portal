<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Feedback;
use App\Http\Controllers\Controller;

class FeedbacksController extends Controller
{
    protected $feedbacks;

    public function __construct(Feedback $feedbacks)
    {
        $this->feedbacks = $feedbacks;
    }

    public function store(Request $request)
    {
        $this->feedbacks->create($request->all());

        return ['status' => 1];
    }
}
