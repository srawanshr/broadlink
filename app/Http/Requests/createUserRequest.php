<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class createUserRequest extends Request
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
            'username' => 'required|min:3|unique:users,username',
            'first_name' => 'required|min:3|alpha',
            'last_name' => 'required|min:3|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'terms' => 'accepted'
        ];
    }
}
