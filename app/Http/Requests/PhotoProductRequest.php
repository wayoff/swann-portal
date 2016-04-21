<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhotoProductRequest extends Request
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
            'image' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'image.image'    => 'The Image has invalid format',
            'image.required' => 'The Image is required'
        ];
    }
}
