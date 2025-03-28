<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('main.main_page');
})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Route::resource('section', SectionController::class);

Route::resource('Blog', BlogController::class);

Route::resource('Comment', CommentController::class);

Route::resource('users', UserController::class);


Route::get('/test222', function () {
    return "Hello from feature branch!";
});

Route::get('/{page}', [App\Http\Controllers\AdminController::class,'index'])->name('home');

