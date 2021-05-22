<?php

use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.welcome');
})->name('index');

Route::get('homeForm', [HomeController::class, 'homeForm'])->name('homeForm');
Route::get('/{lang}', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('mydashboard');

Route::group(
    [
        'prefix' => 'dashboard',
        //'as' => 'home',
        //'namespace' => 'home',
        'middleware' => ['auth']
    ],
    function () {
        Route::get('home', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::post('storeCkeditorImage', [DashboardController::class, 'storeCkeditorImage'])->name('storeCkeditorImage');
        Route::get('change-password', [DashboardController::class, 'changePassword'])->name('changePassword');
        Route::get('updateUserPassword', [DashboardController::class, 'updateUserPassword'])->name('updateUserPassword');

        Route::get('languages', [LanguageController::class, 'index'])->name('languageIndex');
        Route::get('add-language', [LanguageController::class, 'create'])->name('languageAdd');
        Route::get('edit-language/{language}', [LanguageController::class, 'edit'])->name('editLanguage');
        Route::post('storeLanguage', [LanguageController::class, 'store'])->name('storeLanguage');
        Route::post('updateLanguage', [LanguageController::class, 'update'])->name('updateLanguage');
        Route::get('delete-language/{language}', [LanguageController::class, 'destroy'])->name('deleteLanguage');
        Route::get('restore-language/{language}', [LanguageController::class, 'restore'])->name('restoreLanguage');

        Route::get('articles', [PostController::class, 'index'])->name('postIndex');
        Route::get('add-article', [PostController::class, 'create'])->name('postAdd');
        Route::post('storeArticle', [PostController::class, 'store'])->name('storeArticle');
        Route::get('article/{article}', [PostController::class, 'show'])->name('showArticle');
        Route::get('edit-article/{article}', [PostController::class, 'edit'])->name('editArticle');
        Route::post('updateArticle', [PostController::class, 'update'])->name('updateArticle');
        Route::get('delete-article/{article}', [PostController::class, 'destroy'])->name('deleteArticle');
        Route::get('restore-article/{article}', [PostController::class, 'restore'])->name('restoreArticle');

        Route::get('voice-notes', [VoiceController::class, 'index'])->name('voiceIndex');
        Route::get('add-voice-note', [VoiceController::class, 'create'])->name('voiceAdd');
        Route::post('storeVoice', [VoiceController::class, 'store'])->name('storeVoice');
        Route::get('voice-note/{voice}', [VoiceController::class, 'show'])->name('showVoice');
        Route::get('edit-voice-note/{voice}', [VoiceController::class, 'edit'])->name('editVoice');
        Route::post('updateVoiceNote', [VoiceController::class, 'update'])->name('updateVoice');
        Route::get('delete-voice-note/{voice}', [VoiceController::class, 'destroy'])->name('deleteVoice');
        Route::get('restore-voice-note/{voice}', [VoiceController::class, 'restore'])->name('restoreVoice');


        Route::get('videos', [VideoController::class, 'index'])->name('videoIndex');
        Route::get('add-video', [VideoController::class, 'create'])->name('videoAdd');
        Route::post('storeVideo', [VideoController::class, 'store'])->name('storeVideo');
        Route::get('video/{video}', [VideoController::class, 'show'])->name('showVideo');
        Route::get('edit-video/{video}', [VideoController::class, 'edit'])->name('editVideo');
        Route::post('updateVideo', [VideoController::class, 'update'])->name('updateVideo');
        Route::get('delete-video/{video}', [VideoController::class, 'destroy'])->name('deleteVideo');
        Route::get('restore-video/{video}', [VideoController::class, 'restore'])->name('restoreVideo');


        Route::get('posters', [PhotoController::class, 'index'])->name('photoIndex');
        Route::get('add-poster', [PhotoController::class, 'create'])->name('photoAdd');
        Route::post('storePoster', [PhotoController::class, 'store'])->name('storePhoto');
        Route::get('poster/{photo}', [PhotoController::class, 'show'])->name('showPhoto');
        Route::get('edit-poster/{photo}', [PhotoController::class, 'edit'])->name('editPhoto');
        Route::post('updatePhoto', [PhotoController::class, 'update'])->name('updatePhoto');
        Route::get('delete-poster/{photo}', [PhotoController::class, 'destroy'])->name('deletePhoto');
        Route::get('restore-poster/{photo}', [PhotoController::class, 'restore'])->name('restorePhoto');


        Route::get('broadcasts', [BroadcastController::class, 'index'])->name('broadcastIndex');
        Route::get('add-broadcast', [BroadcastController::class, 'create'])->name('broadcastAdd');
        Route::post('storeBroadcast', [BroadcastController::class, 'store'])->name('storeBroadcast');
        Route::get('broadcast/{broadcast}', [BroadcastController::class, 'show'])->name('showBroadcast');
        Route::get('edit-broadcast/{broadcast}', [BroadcastController::class, 'edit'])->name('editBroadcast');
        Route::post('updateBroadcast', [BroadcastController::class, 'update'])->name('updateBroadcast');
        Route::get('delete-broadcast/{broadcast}', [BroadcastController::class, 'destroy'])->name('deleteBroadcast');
        Route::get('restore-broadcast/{broadcast}', [BroadcastController::class, 'restore'])->name('restoreBroadcast');


        Route::get('comments', [CommentController::class, 'index'])->name('commentIndex');
        Route::get('add-comment', [CommentController::class, 'create'])->name('commentAdd');
        Route::post('storeComment', [CommentController::class, 'store'])->name('storeComment');
        Route::get('comment/{comment}', [CommentController::class, 'show'])->name('showComment');
        Route::get('edit-comment/{comment}', [CommentController::class, 'edit'])->name('editComment');
        Route::post('updateComment', [CommentController::class, 'update'])->name('updateComment');
        Route::get('delete-comment/{comment}', [CommentController::class, 'destroy'])->name('deleteComment');
        Route::get('restore-comment/{comment}', [CommentController::class, 'restore'])->name('restoreComment');


        Route::get('categories', [CategoryController::class, 'index'])->name('categoriesIndex');
        Route::get('add-category', [CategoryController::class, 'create'])->name('categoriesAdd');
        Route::post('storeCategory', [CategoryController::class, 'store'])->name('storeCategory');
        Route::get('edit-category/{category}', [CategoryController::class, 'edit'])->name('editCategory');
        Route::post('updateCategory', [CategoryController::class, 'update'])->name('updateCategory');
        Route::get('delete-category/{category}', [CategoryController::class, 'destroy'])->name('deleteCategory');
        Route::get('restore-category/{category}', [CategoryController::class, 'restore'])->name('restoreCategory');
    }
);

require __DIR__ . '/auth.php';
