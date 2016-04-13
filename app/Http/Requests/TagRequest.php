<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
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
        $name = 'required|min:3|unique:tags,name';

        if ($this->route('tags')) {
            $name .= ',' . $this->route('tags');
        }
        
        return [
            'name'        => $name,
            'description' => 'min:3'
        ];
    }
}
