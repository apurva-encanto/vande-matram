<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('api')->group(
    function () {

        Route::get('/', [UserController::class, 'index']);
        Route::post('/user-login', [UserController::class, 'user_login']);
        Route::post('/user-register', [UserController::class, 'user_register']);
        Route::post('/agent-login', [UserController::class, 'agent_login']);
        Route::post('/forgot-password', [UserController::class, 'forgot_password']);
        Route::post('/change-password', [UserController::class, 'change_password']);
        Route::post('/otp-verify', [UserController::class, 'otp_verify']);
        Route::post('/select-favorite-topics', [UserController::class, 'selectFavoriteTopics']);
        Route::get('/categories', [UserController::class, 'getCategories']);
        Route::get('/breaking-news', [UserController::class, 'getBreakingNews']);
        Route::get('/news-{category}', [UserController::class, 'getNewsByCategory']);
        Route::post('/save-article-as-bookmark', [UserController::class, 'saveArticleAsBookmark']);
        Route::post('/remove-article-as-bookmark', [UserController::class, 'removeArticleAsBookmark']);
        Route::post('/get-bookmark-articles', [UserController::class, 'getBookmarkArticles']);
        Route::post('/notification-setting', [UserController::class, 'notification_setting']);
        Route::post('/get-article-details', [UserController::class, 'getArticleDetails']);
        Route::post('/change-current-password', [UserController::class, 'changeCurrentPassword']);





    }
);
