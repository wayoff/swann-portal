<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'    => 'required|min:4|max:150',
            'answer'   => 'required|min:3',
            'featured' => 'required',
            'document' => 'mimes:doc,dot,docx,pdf'
        ];
    }
}
