<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address', 'city', 'state', 'phone',
        'gender', 'username', 'email', 'password', 'is_active', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are appended.
     *
     * @var array
     */
    protected $appends = [
        'display_name',
    ];

    /**
     * Set the username attribute and the slug.
     *
     * @param string $value
     */
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = $value;
        if (!$this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

    /**
     * Recursive routine to set a unique slug.
     *
     * @param string $username
     * @param mixed $extra
     */
    protected function setUniqueSlug($username, $extra)
    {
        $slug = str_slug($username . '-' . $extra);
        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($username, $extra + 1);
            return;
        }
        $this->attributes['slug'] = $slug;
    }

    public function getDisplayNameAttribute()
    {
        return ucwords($this->first_name. " " .$this->last_name);
    }
}
