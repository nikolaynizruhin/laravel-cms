<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateBlogPost;
use App\Http\Requests\StoreBlogPost;

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

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  StoreBlogPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $post = Auth::user()->posts()->create($request->all());

        $tags = $request->tags;

        if ($tags) $post->tags()->attach($tags);

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
        return view('posts.show', [
            'post' => $post,
            'tags' => $post->tags,
            'tagsAll' => Tag::all(),
            'categories' => Category::all(),
            'comments' => $post->getThreadedComments()
        ]);
    }

    /**
     * Add a comment to the post.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addComment(Post $post)
    {
        $post->addComment([
            'body' => request('body'),
            'parent_id' => request('parent_id', null),
        ]);

        return back();
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
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

        $tags = $request->tags;

        if ($tags) $post->tags()->sync($tags);

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
