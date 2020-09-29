<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//=== AUTH WALL ===//
Route::middleware(['auth'])->group(function () {
    /*
     |-----------------------------------------------------------------|
     | Actions Handled By Resource Controller                          |
     |-----------------------------------------------------------------|
     | VERB       |  URI                  | ACTION   |  ROUTE NAME     |
     | -----------|-----------------------|----------|-----------------|
     | GET        | /posts                |  index   |  posts.index    |
     | GET        | /posts/create         |  create  |  posts.create   |
     | POST       | /posts                |  store   |  posts.store    |
     | GET        | /posts/{post}         |  show    |  posts.show     |
     | GET        | /posts/{post}/edit    |  edit    |  posts.edit     |
     | PUT/PATCH  | /posts/{post}         |  update  |  posts.update   |
     | DELETE     | /posts/{post}         |  destroy |  posts.destroy  |
     |-----------------------------------------------------------------|
     */

    Route::resource('posts', PostController::class)->except(['index', 'show']);
});

Route::resource('posts', PostController::class)->only(['index', 'show']);
