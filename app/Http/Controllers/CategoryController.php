<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.indexCategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();

        if (!$languages) {
            return back()->with('toast_error', 'Could not fetch languages');
        } else {
            return view('dashboard.addCategory', compact('languages'));
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
            'language_id' => 'required|string',
            'name' => 'required|string|min:2',
            'description' => 'nullable|string|min:5'
        ]);

        $newCategory = new Category;
        $newCategory->language_id = Request('language_id');
        $newCategory->name = ucwords(Request('name'));
        $newCategory->description = ucwords(Request('description'));
        $newCategory->save();

        if (!$newCategory) {
            return back()->with('toast_error', 'An error occured while adding a new category')->withInput();
        } else {
            return redirect()->route('categoriesIndex')->with('toast_success', 'New category added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (!$category) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this category.');
        } else {
            $languages = Language::all();
            return view('dashboard.editCategory', compact('category', 'languages'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'id' => 'required|string',
            'language_id' => 'required|string',
            'name' => 'required|string|min:2',
            'slug' => 'nullable|string|min:2',
            'description' => 'nullable|string|min:5'
        ]);

        $updateCategory = Category::find(Request('id'));

        if (!$updateCategory) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this category.');
        } else {

            $updateCategory->language_id = Request('language_id');
            $updateCategory->name = ucwords(Request('name'));
            $updateCategory->slug = Request('slug');
            $updateCategory->description = ucwords(Request('description'));
            $updateCategory->save();

            return redirect()->route('categoriesIndex')->with('toast_success', 'Category updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!$category) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this category.');
        } else {
            $category->posts()->delete();
            $category->photos()->delete();
            $category->videos()->delete();
            $category->voices()->delete();
            $category->broadcasts()->delete();
            $category->delete();
            return redirect()->route('categoriesIndex')->with('toast_success', 'Category deleted succesfully.');
        }
    }

    public function restore($category)
    {

        $restoreCategory = Category::onlyTrashed()->where('id', $category)->firstOrFail();

        if (!$restoreCategory) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this category.');
        } else {
            $restoreCategory->posts()->restore();
            $restoreCategory->photos()->restore();
            $restoreCategory->videos()->restore();
            $restoreCategory->voices()->restore();
            $restoreCategory->broadcasts()->restore();
            $restoreCategory->restore();
            return redirect()->route('categoriesIndex')->with('toast_success', 'Category restored succesfully.');
        }
    }
}
