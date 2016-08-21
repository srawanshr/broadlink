<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sno', 'pin', 'voucher', 'is_used'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_used' => 'boolean'
    ];
    
    public function scopeUsed($query)
    {
    	return $query->where('is_used', 1);
    }

    public function scopeNotUsed($query)
    {
    	return $query->where('is_used', 0);
    }
}
