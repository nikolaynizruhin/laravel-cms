<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Create a new tag controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display the specified posts by tag.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate(5);

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags|max:255',
        ]);

        Tag::create(['name' => $request->name]);

        return redirect('/home');
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect('/home');
    }
}
