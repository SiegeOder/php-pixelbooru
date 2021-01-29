<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignOutController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('signup', SignUpController::class)->only(['index', 'store']);
Route::resource('signin', SignInController::class)->only(['index', 'store']);
Route::resource('signout', SignOutController::class)->only(['store']);
Route::resource('profiles', ProfileController::class)->only(['index', 'show', 'edit', 'update']);
Route::resource('posts', PostController::class)->only(['index', 'create', 'show', 'store']);
Route::resource('comments', CommentController::class)->only(['store']);
