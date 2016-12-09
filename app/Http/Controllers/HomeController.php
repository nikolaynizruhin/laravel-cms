<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->paginate(5);

        $categories = Category::all();

        $tags = Tag::all();

        $comments = Comment::all();

        return view('home', compact('posts', 'categories', 'tags', 'comments'));
    }
}
