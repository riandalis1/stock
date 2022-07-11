<?php

// use App\Models\Post;
// use App\Models\User;
// use App\Http\Controllers\DashboardController;

use App\Models\Category; 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardStockController;
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

Route::get('/', function () {
    return view('home', [
        "active" => "home",
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "SR Semarang",
        "address" => "Semarang",
        "image" => "favicon.jpg",
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        "active" => "categories",
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'title' => "Post By Category : $category->name",
        "active" => "categories",
        'posts' => $category->posts->load('category','user'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// Bikin sendiri
Route::resource('/dashboard/stocks', DashboardStockController::class)->middleware('auth');
Route::resource('/dashboard/users', DashboardUserController::class)->middleware('auth')->middleware('admin');

// SALAH
// Route::get('/dashboard/users/{user}/change', [DashboardUserController::class, 'change'])->middleware('auth');
// Route::post('/dashboard/users/changePW', [DashboardUserController::class, 'changePW'])->middleware('auth');

// IMPORTANT
// DONT FORGET TO IMPORT CLASS - IMPORT CLASS