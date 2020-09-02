<?php

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
	$posts = \App\Models\Post::all();
	foreach ($posts as $post) {
		$comments = App\Models\Post::find($post->id)->comments;
		$post->comments = $comments;
	}

    return view('welcome')->withPosts($posts);
});


Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');
