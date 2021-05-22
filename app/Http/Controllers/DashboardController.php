<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function changePassword()
    {
        return view('dashboard.changePassword');
    }

    public function dashboard()
    {
        return view('dashboard.home');
    }

    public function storeCkeditorImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|max:4500'
        ]);

        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images/postsBody'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/postsBody/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

        return view('dashboard.home');
    }

    public function updateUserPassword(Request $request)
    {

        $request->validate([
            'password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $newPass = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        if (!$newPass) {
            return back()->with('toast_error', 'An error occured while changing password')->withInput();
        } else {
            return redirect()->route('dashboard')->with('toast_success', 'Password changed successfully');
        }
    }
}
