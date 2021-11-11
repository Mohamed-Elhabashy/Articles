<?php

use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('Home.index');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('Home.subscribe');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/sendmessage', [ContactController::class, 'sendmessage'])->name('contact.sendmessage');
