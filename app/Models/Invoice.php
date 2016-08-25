<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [ 'user_id', 'date', 'sub_total', 'vat', 'total', 'payable_id', 'payable_type'];

    public function payable()
    {
    	return $this->morphTo();
    }
}
