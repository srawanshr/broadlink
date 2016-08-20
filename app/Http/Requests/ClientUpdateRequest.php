<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientUpdateRequest extends Request {

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
            'name'  => 'required',
            'image' => 'image|max:2048',
        ];
    }

    /**
     * @return array
     */
    public function clientFillData()
    {
        $inputs = $this->except(['image']);

        if ( ! $this->has('is_published'))
            $inputs['is_published'] = 0;

        return $inputs;
    }
}
