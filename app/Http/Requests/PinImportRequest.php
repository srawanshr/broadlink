<?php

namespace App\Http\Requests;

use Excel;
use Validator;
use App\Http\Requests\Request;

class PinImportRequest extends Request
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
            'pin' => 'required|mimes:xlsx,xls|max:5120'
        ];
    }

    /**
     * Get excel rows from uploaded file
     * 
     * @return array $rows
     */
    public function getRows()
    {
        $file = $this->file('pin');

        $reader = Excel::load($file)->get();

        $rows = [];

        foreach($reader as $sheet) {

            foreach($sheet as $row) {

                array_push($rows, $row->all());

            }

        }

        return $rows;
    }

    public function validateRows($rows)
    {
        foreach ($rows as $data){

            $validator = Validator::make($data, [
                'sno' => 'required|unique:pins,sno',
                'pin' => 'required|unique:pins,pin',
                'voucher' => 'required'
            ]);

            if ($validator->fails())
                return $validator;

        }

        return $validator;
    }
}
