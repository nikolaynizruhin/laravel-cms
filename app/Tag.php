<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The posts that belong to tag.
     *
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
