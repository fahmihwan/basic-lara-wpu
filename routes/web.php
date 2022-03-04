<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest ');
Route::post('/register', [RegisterController::class, 'store']);

// <--! 17. SUDAH TIDAK KEPAKE SEMENJAK PLAYLIST DASHBOARD UI dan DashboardController juga ikut di hapus-->
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
