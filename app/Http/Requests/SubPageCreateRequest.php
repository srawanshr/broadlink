<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubPageCreateRequest extends Request
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
            'title'             => 'required',
            'content_raw'       => 'required',
            'view'              => 'required',
            'is_draft'          => 'boolean'
        ];
    }

    /**
     * Return the fields and values to create a new sub page from
     * @param $pageId
     * @return array
     */
    public function subPageFillData($pageId)
    {
        $inputs = $this->all();

        $inputs[ 'is_draft' ] = $this->get( 'is_draft', false );

        $inputs[ 'created_by' ] = auth()->guard('admin')->id();

        $inputs[ 'page_id' ] = $pageId;

        return $inputs;
    }
}
