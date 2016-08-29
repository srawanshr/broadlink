<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'name', 'invoice_id', 'user_id', 'pin_id', 'status', 'price'];

    const COMPLETED = 1, ERROR = 0;

    protected $dates = ['created_at'];

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
