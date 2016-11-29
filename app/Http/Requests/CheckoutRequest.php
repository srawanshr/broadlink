<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Facades\Cart;

class CheckoutRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('user')->check() && Cart::count() > 0;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'method' => 'required|in:esewa,nibl'
        ];
    }
}
