<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserStoreRequest extends Request
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
            'name'     => 'required|min:5',
            'email'    => 'required|min:4|max:80:unique:users,email',
            'password' => 'required|min:3|max:60|confirmed '
        ];
    }
}
