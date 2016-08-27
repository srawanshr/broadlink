<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'invoice_id', 'user_id', 'pin_id'];

    protected $dates = ['created_at'];

    public function product()
    {
        return $this->belongsTo( 'App\Models\Product' );
    }

    public function invoice()
    {
        return $this->belongsTo( 'App\Models\Invoice' );
    }

    public function user()
    {
        return $this->belongsTo( 'App\Models\User' );
    }

    public function pin()
    {
        return $this->belongsTo( 'App\Models\Pin' );
    }
}
