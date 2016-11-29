<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
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
            'email' => 'required|email|unique:admins,email',
            'username' => 'required|unique:admins,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:8|confirmed'
        ];
    }

    /**
     * Return the fields and values to create a new admin
     */
    public function adminFillData()
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => bcrypt($this->password),
            'address' => $this->address,
            'phone' => $this->phone
        ];
    }
}
