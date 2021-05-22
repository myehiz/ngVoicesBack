<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.indexPost', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if (!$categories) {
            return back()->with('toast_error', 'Could not fetch categories');
        } else {
            return view('dashboard.addPost', compact('categories'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|string',
            'title' => 'required|string|min:5',
            'page_image' => 'nullable|image|max:4500',
            'is_draft' => 'nullable|boolean',
            'content' => 'required|string|min:50',
            'meta_description' => 'nullable|string|min:10'
        ]);

        $language_id = Category::find(Request('category_id'));
        $language_id = $language_id->language_id;
        $imagePath = null;
        $published_at = null;

        if ($request->hasFile('page_image')) {

            $originName = $request->file('page_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('page_image')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('page_image')->move(public_path('images'), $fileName);

            $imagePath = 'images/postFeature/' . $fileName;
        }

        if (!Request('is_draft')) {
            $published_at = now()->format('Y-m-d h:m:s');
        }

        $newPost = new Post;
        $newPost->user_id = auth()->user()->id;
        $newPost->language_id = $language_id;
        $newPost->category_id  = Request('category_id');
        $newPost->title  = ucwords(Request('title'));
        $newPost->page_image  = $imagePath;
        $newPost->content  = Request('content');
        $newPost->meta_description  = Request('meta_description');
        $newPost->is_draft  = (Request('is_draft') ?? "0");
        $newPost->published_at  = $published_at;
        $newPost->save();

        if (!$newPost) {
            return back()->with('toast_error', 'An error occured while adding a new article')->withInput();
        } else {
            return redirect()->route('postIndex')->with('toast_success', 'New article added successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        $article = Post::where('slug', 'LIKE', $article)->firstOrFail();
        return view('dashboard.showPost', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $article)
    {
        if (!$article) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this article.');
        } else {
            $categories = Category::all();
            return view('dashboard.editPost', compact('categories', 'article'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'category_id' => 'required|string',
            'title' => 'required|string|min:5',
            'page_image' => 'nullable|image|max:4500',
            'is_draft' => 'nullable|boolean',
            'content' => 'required|string|min:50',
            'meta_description' => 'nullable|string|min:10'
        ]);

        $getPost = Post::find(Request('id'));
        $imagePath = $getPost->page_image;


        if (Request('category_id')) {
            $language_id = Category::find(Request('category_id'));
            $language_id = $language_id->language_id;
        }

        if ($request->hasFile('page_image')) {

            $originName = $request->file('page_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('page_image')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('page_image')->move(public_path('images'), $fileName);

            $imagePath = 'images/postFeature/' . $fileName;
        }

        if (!Request('is_draft')) {
            $published_at = now()->format('Y-m-d h:m:s');
        }

        $getPost->language_id = $language_id;
        $getPost->category_id  = Request('category_id');
        $getPost->title  = ucwords(Request('title'));
        $getPost->page_image  = $imagePath;
        $getPost->content  = Request('content');
        $getPost->meta_description  = Request('meta_description');
        $getPost->is_draft  = (Request('is_draft') ?? "0");
        $getPost->published_at  = ($published_at  ?? null);
        $getPost->save();

        if (!$getPost) {
            return back()->with('toast_error', 'An error occured while updating this article')->withInput();
        } else {
            return redirect()->route('postIndex')->with('toast_success', 'Article aupdated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $article)
    {
        if (!$article) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this article.');
        } else {
            $article->delete();
            return redirect()->route('postIndex')->with('toast_success', 'Article deleted succesfully.');
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function restore($article)
    {
        $restorePost = Post::onlyTrashed()->where('id', $article)->firstOrFail();

        if (!$restorePost) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this article from bin.');
        } else {
            $restorePost->restore();
            return redirect()->route('postIndex')->with('toast_success', 'Article restored succesfully.');
        }
    }
}
