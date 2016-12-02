<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Http\Requests\UpdateBlogPost;
use App\Http\Requests\StoreBlogPost;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new post controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', ['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  StoreBlogPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        Auth::user()->posts()->create($request->all());

        return redirect('/home');
    }

    /**
     * Display the specified post.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  UpdateBlogPost  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogPost $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        return redirect('/home');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/home');
    }
}
