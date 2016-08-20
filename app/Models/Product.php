<?php

namespace App\Models;

use App\Services\Parsedowner;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id', 'name', 'description_raw', 'description_html', 'price', 'order', 'is_active'
    ];

    /**
     * The attributes that should be typecast into boolean.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * The morph class name for this model.
     *
     * @var array
     */
    protected $morphClass = 'Product';

    /**
     * Set the title attribute and the slug.
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if (!$this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

    /**
     * Recursive routine to set a unique slug.
     *
     * @param $name
     * @param mixed $extra
     * @internal param string $title
     */
    protected function setUniqueSlug($name, $extra)
    {
        $slug = str_slug($name . '-' . $extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($name, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Set the HTML content automatically when the raw description is set.
     *
     * @param string $value
     */
    public function setDescriptionRawAttribute($value)
    {
        $markdown = new Parsedowner();
        $this->attributes['description_raw'] = $value;
        $this->attributes['description_html'] = $markdown->toHTML($value);
    }

    /**
     * Set the order attribute.
     *
     * @param string $value
     */
    public function setOrderAttribute($value)
    {
        if ( ! $this->exists && empty($value))
            $this->attributes['order'] = static::max('order') + 1;
        else
            $this->attributes['order'] = $value;
    }

    /**
     * Append service id to JSON form
     * @return string
     */
    public function getServiceIdAttribute()
    {
        return $this->plan->service->id;
    }

    /**
     * Scope a query to active or non product.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param bool $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query, $type = true)
    {
        return $query->whereIsActive($type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
