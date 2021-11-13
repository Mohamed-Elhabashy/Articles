<?php

use App\Http\Controllers\Admin\DArticleController;
use App\Http\Controllers\Admin\DCategoryController;
use App\Http\Controllers\Admin\DMessageController;
use App\Http\Controllers\Admin\HomeDashboardController;
use App\Http\Controllers\Admin\MailSubscribeController;
use App\Http\Controllers\AuthController;
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
Route::get('/dashboard/login', [AuthController::class, 'login'])->name('login');
Route::post('/dashboard/SubmitLogin', [AuthController::class, 'SubmitLogin'])->name('submit.login');

Route::get('/', [HomeController::class, 'index'])->name('Home.index');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('Home.subscribe');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/sendmessage', [ContactController::class, 'sendmessage'])->name('contact.sendmessage');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [HomeDashboardController::class, 'index'])->name('HomeDashboard.index');

    Route::get('/dashboard/category', [DCategoryController::class, 'index'])->name('DCategory.index');
    Route::get('/dashboard/category/create', [DCategoryController::class, 'create'])->name('DCategory.create');
    Route::post('/dashboard/category/store', [DCategoryController::class, 'store'])->name('DCategory.store');
    Route::get('/dashboard/category/edit/{id}', [DCategoryController::class, 'edit'])->name('DCategory.edit');
    Route::post('/dashboard/category/update', [DCategoryController::class, 'update'])->name('DCategory.update');
    Route::get('/dashboard/category/delete/{id}', [DCategoryController::class, 'delete'])->name('DCategory.delete');

    Route::get('/dashboard/article/create', [DArticleController::class, 'create'])->name('DArticle.create');
    Route::post('/dashboard/article/store', [DArticleController::class, 'store'])->name('DArticle.store');
    Route::get('/dashboard/article/edit/{id}', [DArticleController::class, 'edit'])->name('DArticle.edit');
    Route::post('/dashboard/article/update', [DArticleController::class, 'update'])->name('DArticle.update');
    Route::get('/dashboard/category/{id}/article', [DArticleController::class, 'ListArticle'])->name('DArticle.ListArticle');
    Route::get('/dashboard/article/delete/{id}', [DArticleController::class, 'delete'])->name('DArticle.delete');

    Route::get('/dashboard/message', [DMessageController::class, 'index'])->name('DMessage.index');
    Route::get('/dashboard/delete/{id}', [DMessageController::class, 'delete'])->name('DMessage.delete');

    Route::get('/dashboard/sendmail', [MailSubscribeController::class, 'index'])->name('DMail.index');
    Route::get('/dashboard/sendmail/delete/{id}', [MailSubscribeController::class, 'delete'])->name('DMail.delete');
    Route::get('/dashboard/sendmail/subscribes', [MailSubscribeController::class, 'SendMail'])->name('DMail.send');
    Route::post('/dashboard/sendmail/SendToSubscribes/', [MailSubscribeController::class, 'SubmitSendMail'])->name('DMail.SubmitSendMail');
});
