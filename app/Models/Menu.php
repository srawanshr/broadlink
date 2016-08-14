<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [ 'name', 'slug', 'type', 'url', 'icon', 'order' ];

    protected $morphClass = 'Menu';

    public function image()
    {
    	return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function subMenus()
    {
    	return $this->morphMany('App\Models\SubMenu', 'submenuable');
    }
}