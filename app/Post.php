<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

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

    /**
     * A post can have many comments.
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Load a threaded set of comments for the post.
     *
     * @return \App\CommentCollection
     */
    public function getThreadedComments()
    {
        return $this->comments()->with('owner')->get()->threaded();
    }

    /**
     * Add a comment to the post.
     *
     * @param array $attributes
     * @return Model
     */
    public function addComment(array $attributes)
    {
        $comment = (new Comment)->forceFill($attributes);

        $comment->user_id = auth()->id();

        return $this->comments()->save($comment);
    }
}
