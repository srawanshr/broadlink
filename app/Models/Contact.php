<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $types = [
        0 => 'branch', 1 => 'distributor', 2 => 'reseller'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'address', 'phone', 'email', 'description'
    ];

    /**
     * Scope a query to get contact of a type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param bool $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeType($query, $type)
    {
        $type = array_search($type, $this->types);

        return $query->whereType($type);
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }
}
