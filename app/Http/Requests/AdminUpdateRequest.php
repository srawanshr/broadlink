<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUpdateRequest extends Request {

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
            'email'      => 'required|email|unique:admins,email,' . $this->id,
            'username'   => 'required|unique:admins,username,' . $this->id,
            'first_name' => 'required',
            'last_name'  => 'required',
            'password'   => 'min:8|confirmed',
            'image'      => 'image|max:1024'
        ];
    }

    /**
     * Return the fields and values to update admin data
     */
    public function adminFillData()
    {
        $data = [
            'username'   => $this->username,
            'email'      => $this->email,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'address'    => $this->address,
            'phone'      => $this->phone
        ];

        if ($this->password)
        {
            $data['password'] = bcrypt($this->password);
        }

        return $data;
    }
}
