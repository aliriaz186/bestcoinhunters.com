<?php

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

Route::get('/', "\App\Http\Controllers\UserController@welcome");

Route::get('/addcoin', function () {
    return view('addcoin');
});

Route::get('/admin', "\App\Http\Controllers\AdminController@home");
Route::get('/admin-login', "\App\Http\Controllers\AdminController@adminlogin");
Route::get('/coins', "\App\Http\Controllers\AdminController@coins");
Route::get('/promotion', "\App\Http\Controllers\AdminController@promotion");
Route::get('/promote-coin/{id}', "\App\Http\Controllers\AdminController@promoteCoin");
Route::get('/unpromote-coin/{id}', "\App\Http\Controllers\AdminController@unpromoteCoin");
Route::get('/banners', "\App\Http\Controllers\AdminController@banners");
Route::get('/approve-coin/{id}', "\App\Http\Controllers\AdminController@approveCoin");
Route::get('/decline-coin/{id}', "\App\Http\Controllers\AdminController@declineCoin");
Route::get('/slider', "\App\Http\Controllers\AdminController@slider");
Route::get('/logout-user', "\App\Http\Controllers\AdminController@logoutuser");
Route::get('/banner-get/{status}', "\App\Http\Controllers\AdminController@getBanner");
Route::get('/slide-get/{id}', "\App\Http\Controllers\AdminController@getSlide");
Route::get('/delete-slide/{id}', "\App\Http\Controllers\AdminController@deleteSlide");
Route::post('/login-admin', "\App\Http\Controllers\AdminController@adminloginPost");
Route::post('savebanners', "\App\Http\Controllers\AdminController@savebanners");
Route::post('save-coin', "\App\Http\Controllers\UserController@savecoin");
Route::post('uploadslide', "\App\Http\Controllers\AdminController@uploadslide");
Route::post('/search-coins', "\App\Http\Controllers\UserController@searchCoins");
Route::post('/upvote', "\App\Http\Controllers\UserController@upvote");
Route::get('/earn', "\App\Http\Controllers\UserController@earn");
Route::get('/contest', "\App\Http\Controllers\UserController@contest");
Route::get('/earn-page', "\App\Http\Controllers\AdminController@earnpage");
Route::get('/contest-page', "\App\Http\Controllers\AdminController@contestpage");
Route::post('/saveearnpage', "\App\Http\Controllers\AdminController@saveearnpage");
Route::post('/savecontestpage', "\App\Http\Controllers\AdminController@savecontestpage");
Route::get('/promote-page', "\App\Http\Controllers\AdminController@promotepage");
Route::get('/promote-stats', "\App\Http\Controllers\UserController@promotestats");
Route::post('/savepromotepage', "\App\Http\Controllers\AdminController@savepromotepage");
Route::get('/promote-file', "\App\Http\Controllers\AdminController@getPromoteFile");
Route::get('/contest-file', "\App\Http\Controllers\AdminController@getContestFile");
Route::get('/blog', "\App\Http\Controllers\UserController@blog");
Route::get('/blog-page', "\App\Http\Controllers\AdminController@blogpage");
Route::post('/saveblog', "\App\Http\Controllers\AdminController@saveblog");
Route::get('/view-blog-pic/{id}', "\App\Http\Controllers\UserController@viewBlogPic");
Route::get('/delete-blog/{id}', "\App\Http\Controllers\AdminController@deleteBlog");
Route::get('/coin-details/{id}', "\App\Http\Controllers\AdminController@coinDetails");
Route::post('/updatecoininfo', "\App\Http\Controllers\AdminController@updateCoinInfo");
Route::get('/coin/{id}', "\App\Http\Controllers\UserController@getCoin");
Route::get('/change-password', "\App\Http\Controllers\AdminController@changepassword");
Route::post('changepasswordpost', "\App\Http\Controllers\AdminController@changepasswordpost");
