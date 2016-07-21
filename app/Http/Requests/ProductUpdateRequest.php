<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductUpdateRequest extends Request {

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
            'plan_id'         => 'required|exists:plans,id',
            'name'            => 'required',
            'description_raw' => 'required',
            'price'           => 'required',
            'image'           => 'image|max:2048',
            'is_active'       => 'boolean'
        ];
    }

    /**
     * @return array
     */
    public function productFillData()
    {
        $inputs = $this->all();

        $inputs['is_active'] = $this->get('is_active', false);

        return $inputs;
    }
}
