<?php

namespace App\Models;

use App\Services\Parsedowner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model {

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slogan', 'meta_description', 'description_raw', 'description_html', 'order', 'is_active'
    ];

    protected $appends = [ 'group_id' ];

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

        if ( ! $this->exists)
        {
            $this->setUniqueSlug($value, '');
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
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

        if (static::withTrashed()->whereSlug($slug)->exists())
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
     * Scope a query to get active or non services.
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
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function banners()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function icon()
    {
        return $this->morphOne('App\Models\Icon', 'iconable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plans()
    {
        return $this->hasMany('App\Models\Plan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function group()
    {
        return $this->belongsToMany(Group::class, 'service_groups');
    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        if ( ! $this->banners->isEmpty())
        {
            foreach ($this->banners as $banner)
            {
                $banner->delete();
            }
        }

        if ( ! empty($this->icon))
        {
            $this->icon->delete();
        }

        return parent::delete($options);
    }

    /**
     * @return integer
     */
    public function getGroupIdAttribute()
    {
        return $this->group->count() == 0 ? '' : $this->group->first()->id;
    }
}
