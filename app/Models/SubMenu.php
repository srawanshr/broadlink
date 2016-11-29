<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
	protected $fillable =  [ 'submenuable_id', 'submenuable_type', 'order', 'name', 'slug', 'url', 'icon' ];
	
    public function image()
    {
    	return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function submenuable()
    {
    	$this->morphTo();
    }
}
