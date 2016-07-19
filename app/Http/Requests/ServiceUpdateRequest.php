<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServiceUpdateRequest extends Request
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
            'name'             => 'required',
            'meta_description' => 'required',
            'description_raw'  => 'required',
            'is_active'        => 'boolean'
        ];
    }

    public function serviceFillData()
    {
        $inputs = $this->all();

        $inputs[ 'is_active' ] = $this->get( 'is_active', false );

        return $inputs;
    }
}
