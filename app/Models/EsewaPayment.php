<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsewaPayment extends Model
{
    public function invoice()
    {
    	return $this->morphOne('App\Models\Invoice', 'payable');
    }
}
