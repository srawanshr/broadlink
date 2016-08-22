<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PageUpdateRequest extends Request {

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
            'title'       => 'required',
            'content_raw' => 'required',
            'view'        => 'required',
            'is_draft'    => 'boolean'
        ];
    }

    /**
     * Return the fields and values to update a page from
     */
    public function pageFillData()
    {
        $inputs = $this->all();

        $inputs[ 'is_draft' ] = $this->get( 'is_published') ? false : true;

        return $inputs;
    }
}
