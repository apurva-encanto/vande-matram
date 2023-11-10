<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\JournalistController;

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

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/contact-us', [MainController::class, 'contact_us']);
Route::get('/about-us', [MainController::class, 'about_us']);



Route::get('/news-{categoryName}/{articleSlug}', [MainController::class, 'getSingleArticle']);
Route::get('/news-{categoryName}', [MainController::class, 'getArticleByCategory']);


Route::get('/admin-login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin-logincheck', [LoginController::class, 'logincheck'])->name('admin.logincheck');

Route::middleware(['auth', 'user-access:agent'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('article')->group(function () {
        Route::get('/add', [ArticleController::class, 'addAgentArticle'])->name('agent.article.add');
        Route::get('/list', [ArticleController::class, 'listAgentArticle'])->name('agent.article.list');
        Route::post('/create', [ArticleController::class, 'StoreAgentArticle'])->name('agent.article.create');
        Route::get('/edit/{id}', [ArticleController::class, 'editAgentArticle'])->name('agent.article.edit');
        Route::post('/update/{id}', [ArticleController::class, 'updateAgentArticle'])->name('agent.article.update');
        Route::delete('/delete/{id}', [ArticleController::class, 'deleteAgentArticle'])->name('agent.article.delete');
    });
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::prefix('admin')->middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::prefix('article')->group(function () {
        Route::get('/add', [ArticleController::class, 'addArticle'])->name('admin.article.add');
        Route::get('/pending', [ArticleController::class, 'pendingArticle'])->name('admin.article.pending');
        Route::post('/create', [ArticleController::class, 'storeArticle'])->name('admin.article.create');
        Route::get('/list', [ArticleController::class, 'listArticle'])->name('admin.article.list');
        Route::post('/ckeditor/upload', [ArticleController::class, 'upload'])->name('ckeditor.upload');
        Route::get('/edit/{id}', [ArticleController::class, 'editArticle'])->name('admin.article.edit');
        Route::post('/update/{id}', [ArticleController::class, 'updateArticle'])->name('admin.article.update');
        Route::delete('/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('admin.article.delete');
    });


    Route::prefix('category')->group(function () {
        Route::get('/list', [CategoryController::class, 'listCategory'])->name('admin.category.list');
        Route::get('/add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
        Route::post('/create', [CategoryController::class, 'storeCategory'])->name('admin.category.create');
        Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'updateCategory'])->name('admin.category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
    });
    Route::prefix('journalist')->group(function () {

        Route::get('/add', [JournalistController::class, 'addJournalist'])->name('admin.journalist.add');
        Route::get('/pending', [JournalistController::class, 'pendingJournalist'])->name('admin.journalist.pending');
        Route::post('/create', [JournalistController::class, 'storeJournalist'])->name('admin.journalist.create');
        Route::get('/list', [JournalistController::class, 'listJournalist'])->name('admin.journalist.list');
        Route::get('/edit/{id}', [JournalistController::class, 'editJournalist'])->name('admin.journalist.edit');
        Route::post('/update/{id}', [JournalistController::class, 'updateJournalist'])->name('admin.journalist.update');
        Route::delete('/delete/{id}', [JournalistController::class, 'deleteJournalist'])->name('admin.journalist.delete');
    });
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::prefix('manager')->middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::prefix('agent')->group(function () {
        Route::get('/add', [JournalistController::class, 'addAgent'])->name('manager.agent.add');
        Route::post('/create', [JournalistController::class, 'createAgent'])->name('manager.agent.create');
        Route::get('/list', [JournalistController::class, 'listAgent'])->name('manager.agent.list');
        Route::get('/edit/{id}', [JournalistController::class, 'editAgent'])->name('manager.agent.edit');
        Route::post('/update/{id}', [JournalistController::class, 'updateAgent'])->name('manager.agent.update');
        Route::delete('/delete/{id}', [JournalistController::class, 'deleteAgent'])->name('manager.agent.delete');
    });

    Route::prefix('article')->group(function () {
        Route::get('/add', [ArticleController::class, 'addManagerArticle'])->name('manager.article.add');
        Route::get('/pending', [ArticleController::class, 'pendingManagerArticle'])->name('manager.article.pending');
        Route::get('/list', [ArticleController::class, 'listManagerArticle'])->name('manager.article.list');
        Route::post('/create', [ArticleController::class, 'StoreManagerArticle'])->name('manager.article.create');
        Route::get('/edit/{id}', [ArticleController::class, 'editManagerArticle'])->name('manager.article.edit');
        Route::post('/update/{id}', [ArticleController::class, 'updateManagerArticle'])->name('manager.article.update');
        Route::delete('/delete/{id}', [ArticleController::class, 'deleteManagerArticle'])->name('manager.article.delete');
    });
});
