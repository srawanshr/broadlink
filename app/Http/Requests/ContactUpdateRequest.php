<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactUpdateRequest extends Request {

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
     * @return array
     */
    public function contactFillData()
    {
        $inputs = $this->all();

        return $inputs;
    }
}