<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('users.index');
});

Route::resource('users', UserController::class);

Route::get('lang/{locale}', function (String $locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang.change');


Route::resource('articles', ArticleController::class);
Route::get('/articles/{article}/audit', [ArticleController::class, 'audit'])->name('articles.audit');


Route::middleware([])->group(function(){
    Route::get('dashboard',function(){
        return view('layout.dashboard');
    });
});
