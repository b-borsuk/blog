<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'is_active',
        'is_top',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     *
     * @param  Builder  $query
     * @param  boolean $is
     * @return Builder
     */
    public function scopeActive($query, $is = true)
    {
        return $query->whereIsActive($is);
    }

    /**
     *
     * @return Relation
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
