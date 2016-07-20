<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlanUpdateRequest extends Request
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
            'service_id'       => 'exists:services,id',
            'name'             => 'required',
            'meta_description' => 'required',
            'description_raw'  => 'required',
            'image'            => 'image|max:2048',
            'is_active'        => 'boolean'
        ];
    }

    /**
     * @return array
     */
    public function planFillData()
    {
        $inputs = $this->all();

        $inputs[ 'is_active' ] = $this->get( 'is_active', false );

        return $inputs;
    }
}
