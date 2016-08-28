<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsewaPayment extends Model
{
    protected $morphClass = 'Esewa';

    protected $fillable = [ 'ref_id', 'is_verified' ];

    public function invoice()
    {
        return $this->morphOne( 'App\Models\Invoice', 'payable' );
    }
}
