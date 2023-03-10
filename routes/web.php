<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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
    return view('posts', [
        'posts' => Post::latest()->with('category', 'author')->get(),
        'categories' => Category::all(),
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get(
    '/categories/{category:slug}',
    fn (Category $category) => view(
        'posts',
        [
            'posts' => $category->posts->load('category', 'author'),
            'categories' => Category::all(),
            'currentCategory' => $category,
        ]
    )
)->name('category');

Route::get(
    '/authors/{author:username}',
    fn (User $author) => view('posts', ['posts' => $author->posts->load('category', 'author'), 'categories' => Category::all()])
);
