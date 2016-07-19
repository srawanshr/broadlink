<?php

namespace App\App\Models;

use App\Services\Parsedowner;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id', 'name', 'meta_description', 'description_raw', 'description_html', 'order'
    ];

    /**
     * The morph class name for this model.
     *
     * @var array
     */
    protected $morphClass = 'ProductCategory';

    /**
     * Set the title attribute and the slug.
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if (!$this->exists)
        {
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

        if (static::whereSlug($slug)->exists())
        {
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
