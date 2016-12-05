<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
     * Display the specified posts by category.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags|max:255',
        ]);

        Category::create(['name' => $request->name]);

        return redirect('/home');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/home');
    }
}
