<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgreementsRequest extends Request
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
            'title'    => 'required|min:3',
            'content'  => 'min:5',
            'document' => 'mimes:doc,dot,docx,pdf'
        ];
    }
}
