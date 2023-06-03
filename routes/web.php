<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('auth')->group(function () {
Route::get('/add-news', [NewsController::class, 'create']);
Route::post('/store-news', [NewsController::class, 'store']);
});

Route::get('/add-category', [CategoryController::class, 'create']);
Route::post('/store-category', [CategoryController::class, 'store']);
// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/myaccount', [UserController::class, 'myaccount'])->middleware('auth');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/', [NewsController::class, 'index']);
Route::get('/news/category/{name}', [NewsController::class, 'newsList']);
Route::get('/news/{news}', [NewsController::class, 'show']);
Route::resource('news',NewsController::class);

Route::get('/plans', [PlanController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/plans/{slug}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('/subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});