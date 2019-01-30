<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    /**
     * Get the description record associated with the post.
     */
    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }

    /**
     * Get the relation record associated with the post.
     */
    public function relation()
    {
        return $this->hasOne('App\Models\Relation', 'to_id', 'id')->ofType(config('constants.relation.type.post'), $toType = null);
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Get the likes for the blog post.
     */
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    /**
     * Get the views for the blog post.
     */
    public function views()
    {
        return $this->hasMany('App\Models\View');
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', config('constatns.post.status.active'));
    }

    /**
     * Scope a query to only include posts of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', config('constatns.post.type.' . $type));
    }

    /**
     * Scope a query to only include posts of a given user_id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $user_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    /**
     * Scope a query to only include posts of a given description_id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $user_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDescription($query, $description_id)
    {
        return $query->where('description_id', $description_id);
    }

    /**
     * Scope a query to only include posts of a given category_id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $user_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfcategory($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }
}
