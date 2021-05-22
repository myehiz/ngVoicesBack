<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.indexLanguage', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.addLanguage');
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
            'name' => 'required|string|min:2',
            'description' => 'nullable|string|min:5'
        ]);

        $newLanguage = new Language;
        $newLanguage->name = ucwords(Request('name'));
        $newLanguage->description = ucwords(Request('description'));
        $newLanguage->save();

        if (!$newLanguage) {
            return back()->with('toast_error', 'An error occured while adding a new language')->withInput();
        } else {
            return redirect()->route('languageIndex')->with('toast_success', 'New language added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        if (!$language) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this language.');
        } else {
            return view('dashboard.editLanguage', compact('language'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'id' => 'required|string',
            'name' => 'required|string|min:2',
            'slug' => 'required|string|max:5',
            'description' => 'nullable|string|min:5'
        ]);

        $updatelanguage = Language::find(Request('id'));

        if (!$updatelanguage) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this language.');
        } else {

            $updatelanguage->name = ucwords(Request('name'));
            $updatelanguage->slug = Str::upper(Request('slug'));
            $updatelanguage->description = ucwords(Request('description'));
            $updatelanguage->save();

            return redirect()->route('languageIndex')->with('toast_success', 'Language updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {

        if (!$language) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this language.');
        } else {
            $language->posts()->delete();
            $language->photos()->delete();
            $language->videos()->delete();
            $language->voices()->delete();
            $language->broadcasts()->delete();
            $language->categories()->delete();
            $language->delete();
            return redirect()->route('languageIndex')->with('toast_success', 'Language deleted succesfully.');
        }
    }

    public function restore($language)
    {

        $deleteLanguage = Language::onlyTrashed()->where('id', $language)->firstOrFail();

        if (!$deleteLanguage) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this language.');
        } else {
            $deleteLanguage->posts()->restore();
            $deleteLanguage->photos()->restore();
            $deleteLanguage->videos()->restore();
            $deleteLanguage->voices()->restore();
            $deleteLanguage->broadcasts()->restore();
            $deleteLanguage->categories()->restore();
            $deleteLanguage->restore();
            return redirect()->route('languageIndex')->with('toast_success', 'Language restored succesfully.');
        }
    }
}
