<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Routing\Router;
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

Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('home', [
        "name" => 'fahmi',
        "age" => '22'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/post/{slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'post categories',
        'categories' => Category::all()
    ]);
});


// <--! SUDAH TIDAK KEPAKE SEMENJAK PLAYLIST SEARCH & PAGINATION-->
// Route::get('/categories/{category:slug}', function (Category $category) {      
//     return view('posts', [
//         'title' => "Post by Category :  $category->name",
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });


// <--! SUDAH TIDAK KEPAKE SEMENJAK PLAYLIST SEARCH & PAGINATION-->
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post by Author : $author->name ",
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
