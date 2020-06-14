<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'price',
        'description',

    ];

    protected $dates = [
        'created_at',
        'deleted_at',
    ];

    /**
     * Get the options for generating the slug
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
