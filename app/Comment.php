<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'body',
    ];

    /**
     * A comment has an owner.
     *
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A comment has a children comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * A comment has a parent comment.
     *
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * Use a custom collection for all comments.
     *
     * @param  array  $models
     * @return CommentCollection
     */
    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }
}
