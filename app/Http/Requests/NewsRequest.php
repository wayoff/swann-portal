<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsRequest extends Request
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
            'title'   => 'min:3|max:40',
            'content' => 'min:10',
            'image'   => 'image',
            'video'   => 'mimes:mp4, mpeg, flv, ogv'
        ];
    }
}
