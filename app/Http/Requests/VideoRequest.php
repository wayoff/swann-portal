<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoRequest extends Request
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
            'video_title'       => 'required|min:3|max:40',
            'video_description' => 'required|min:5|max:150',
            'video_featured'    => 'required',
            'video'             => $this->route('videos') ? '' : 'required|' . 'mimes:mp4, mpeg, flv, ogv'
        ];
    }
}
