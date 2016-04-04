<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'name'        => 'required|min:3|max:60',
            'description' => 'required|min:5|max:250',
            'model_no'    => 'required|min:5|max:60',
            'category'    => 'required',
            'featured'    => 'required',
            'image'       => 'image',
            'document'    => 'mimes:doc,dot,docx,pdf'
        ];
    }
}
