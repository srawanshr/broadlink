<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
            'email'      => 'required|email|unique:admins,email,' . $this->id,
            'password'   => 'min:8|confirmed',
            'image'      => 'image|max:1024'
        ];
    }

    public function userFillData()
    {
        $inputs = $this->except(['password', 'image']);

        if($this->has('password'))
            $inputs['password'] = bcrypt($this->get('password'));

        return $inputs;
    }
}
