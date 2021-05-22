<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Voice;
use Illuminate\Http\Request;

class VoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voices = Voice::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.indexVoice', compact('voices'));
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
            return view('dashboard.addVoice', compact('categories'));
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
            'content' => 'required|file|max:4000|mimetypes:application/octet stream',
            'is_draft' => 'nullable|boolean',
            'meta_description' => 'nullable|string|min:10'
        ]);

        $language_id = Category::find(Request('category_id'));
        $language_id = $language_id->language_id;
        $published_at = null;

        //$originName = $request->file('content')->getClientOriginalName();
        $fileName = uniqid('vn_');
        $extension = $request->file('content')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('content')->move(public_path('voiceNotes'), $fileName);

        $VoicePath = 'voiceNotes/' . $fileName;

        if (!Request('is_draft')) {
            $published_at = now()->format('Y-m-d h:m:s');
        }

        $newVoice = new Voice;
        $newVoice->user_id = auth()->user()->id;
        $newVoice->language_id = $language_id;
        $newVoice->category_id  = Request('category_id');
        $newVoice->title  = ucwords(Request('title'));
        $newVoice->content  = $VoicePath;
        $newVoice->meta_description  = Request('meta_description');
        $newVoice->is_draft  = (Request('is_draft') ?? "0");
        $newVoice->published_at  = $published_at;
        $newVoice->save();

        if (!$newVoice) {
            return back()->with('toast_error', 'An error occured while adding a new voice note')->withInput();
        } else {
            return redirect()->route('voiceIndex')->with('toast_success', 'New voice note added successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voice  $voice
     * @return \Illuminate\Http\Response
     */
    public function show(Voice $voice)
    {
        $voice = Voice::where('slug', 'LIKE', $voice)->firstOrFail();
        return view('dashboard.showVoice', compact('voice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voice  $voice
     * @return \Illuminate\Http\Response
     */
    public function edit(Voice $voice)
    {
        if (!$voice) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this voice note.');
        } else {
            $categories = Category::all();
            return view('dashboard.editVoice', compact('categories', 'voice'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voice  $voice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voice $voice)
    {
        $request->validate([
            'id' => 'required|string',
            'category_id' => 'required|string',
            'title' => 'required|string|min:5',
            'content' => 'nullable|file|max:4000|mimetypes:application/octet stream',
            'is_draft' => 'nullable|boolean',
            'meta_description' => 'nullable|string|min:10'
        ]);

        $getVoice = Voice::find(Request('id'));
        $VoicePath = $getVoice->content;

        if (Request('category_id')) {
            $language_id = Category::find(Request('category_id'));
            $language_id = $language_id->language_id;
            $published_at = null;
        }

        if ($request->hasFile('content')) {
            $fileName = uniqid('vn_');
            $extension = $request->file('content')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('content')->move(public_path('voiceNotes'), $fileName);

            $VoicePath = 'voiceNotes/' . $fileName;
        }

        if (!Request('is_draft')) {
            $published_at = now()->format('Y-m-d h:m:s');
        }

        $updateVoice = $getVoice;
        $updateVoice->user_id = auth()->user()->id;
        $updateVoice->language_id = $language_id;
        $updateVoice->category_id  = Request('category_id');
        $updateVoice->title  = ucwords(Request('title'));
        $updateVoice->content  = $VoicePath;
        $updateVoice->meta_description  = Request('meta_description');
        $updateVoice->is_draft  = (Request('is_draft') ?? "0");
        $updateVoice->published_at  = ($published_at ?? null);
        $updateVoice->save();

        if (!$updateVoice) {
            return back()->with('toast_error', 'An error occured while updating this voice note')->withInput();
        } else {
            return redirect()->route('voiceIndex')->with('toast_success', 'Voice note updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voice  $voice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voice $voice)
    {
        if (!$voice) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this voice note.');
        } else {
            $voice->delete();
            return redirect()->route('voiceIndex')->with('toast_success', 'Voice note deleted succesfully.');
        }
    }


    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Voice  $voice
     * @return \Illuminate\Http\Response
     */
    public function restore($voice)
    {
        $restoreVoice = Voice::onlyTrashed()->where('id', $voice)->firstOrFail();

        if (!$restoreVoice) {
            return back()->withInput->with('toast_error', 'Can not fetch the details of this voice note from bin.');
        } else {
            $restoreVoice->restore();
            return redirect()->route('voiceIndex')->with('toast_success', 'Voice note restored succesfully.');
        }
    }
}
