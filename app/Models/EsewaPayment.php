<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsewaPayment extends Model
{
    protected $morphClass = 'Esewa';

    public function invoice()
    {
        return $this->morphOne( 'App\Models\Invoice', 'payable' );
    }
}
