<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'excerpt',
        'body',
    ];

    /**
     * Get the user that owns the post.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that owns the post.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    /**
     * The tags that belong to post.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
