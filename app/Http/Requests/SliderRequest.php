<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SliderRequest extends Request
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
            'title'       => 'min:3|max:25',
            'description' => 'min:5|max:40',
            'image'       => 'required|image'
        ];
    }
}
