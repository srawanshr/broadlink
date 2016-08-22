<?php
namespace App\Http\Requests;

use Carbon\Carbon;

class PostUpdateRequest extends Request {

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
            'title'        => 'required',
            'content'      => 'required',
            'published_at' => 'required',
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        $inputs = [
            'title'            => $this->title,
            'content_raw'      => $this->get('content'),
            'meta_description' => $this->meta_description,
            'published_at'     => Carbon::parse($this->published_at)->toDateTimeString()
        ];

        $inputs[ 'is_draft' ] = $this->get( 'is_published') ? false : true;

        return $inputs;
    }
}