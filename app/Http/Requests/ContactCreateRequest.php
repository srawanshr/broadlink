<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactCreateRequest extends Request {

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
            'name'    => 'required',
            'type'    => 'required',
            'phone'   => 'required',
            'address' => 'required'
        ];
    }

    /**
     * @return mixed
     */
    public function contactFillData()
    {
        $inputs = $this->all();

        return $inputs;
    }
}