<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['user_id', 'date', 'sub_total', 'vat', 'total', 'payable_id', 'payable_type', 'slug'];

    protected $dates = ['created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function payable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Boot the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        $count = self::where('date', date('Y-m-d'))->count();
        $user = auth()->user();
        static::creating(function ($invoice) use($user, $count) {
            $invoice->slug = date('YmdHis').'-'.sprintf( '%04d',$user->id).'-'.sprintf('%04d',$count+1);
            $invoice->date = date('Y-m-d');
            $invoice->user_id = $user->id;
        });
    }
}
