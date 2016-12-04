<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display the specified posts by tag.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate(5);

        return view('posts.index', compact('posts'));
    }
}
