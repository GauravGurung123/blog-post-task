<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\TagController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog/{blog:slug}', [HomeController::class, 'showDetail'])->name('blog.detail');
Route::get('/blog/categories/{category:slug}', [HomeController::class, 'relatedCategory'])->name('blog.category');
Route::get('/blog/tags/{tag:slug}', [HomeController::class, 'relatedTag'])->name('blog.tag');

Route::get('/profile/edit/{profile}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
Route::patch('/profile/change/{profile}', [AdminProfileController::class, 'changePassword'])->name('profile.changePwd');

// Admin routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'admin',
    ], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::view('/view-all/user', 'dashboard.users.index')->name('view-all.user');
        Route::get('/profile/edit/{profile}', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/{profile}', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::patch('/profile/change/{profile}', [AdminProfileController::class, 'changePassword'])->name('profile.changePwd');

        Route::patch('/blogs/{id}', [BlogController::class, 'status'])->name('blogs.status');
        Route::resource('blogs', BlogController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
    
    }
);


