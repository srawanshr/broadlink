<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_category_id', 'name', 'meta_description', 'description_raw', 'description_html', 'price', 'order', 'is_active'
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
    protected $morphClass = 'Service';

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

        if (static::withTrashed()->whereSlug($slug)->exists()) {
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
     * Scope a query to draft or non pages.
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
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id');
    }
}
