<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const COMPLETED = 1, ERROR = 0;

    protected $fillable = [ 'name', 'invoice_id', 'user_id', 'pin_id', 'status', 'price'];

    /**
     * The attributes that should be mutated to date.
     *
     * @var array
     */
    protected $dates = ['created_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo( 'App\Models\Invoice' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo( 'App\Models\User' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pin()
    {
        return $this->belongsTo( 'App\Models\Pin' );
    }
}
