<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\EventController;
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
    return view('index');
});

Auth::routes();

Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/post/{post}', [PostController::class, 'show']);
Route::get('/post/{post}/edit', [PostController::class, 'edit']);
Route::patch('/post/{post}', [PostController::class, 'update']);
Route::delete('/post/{post}', [PostController::class, 'destroy']);

Route::get('/marketplace/create', [MarketplaceController::class, 'create']);
Route::post('/marketplace', [MarketplaceController::class, 'store']);
Route::get('/marketplace/{post}', [MarketplaceController::class, 'show']);
Route::get('/marketplace/{post}/edit', [MarketplaceController::class, 'edit']);
Route::patch('/marketplace/{post}', [MarketplaceController::class, 'update']);
Route::delete('/marketplace/{post}', [MarketplaceController::class, 'destroy']);
Route::get('/marketplace', [MarketplaceController::class, 'index']);


Route::get('/group', [GroupController::class, 'index']);
Route::get('/group/create', [GroupController::class, 'creategroup']);
Route::post('/group', [GroupController::class, 'storegroup']);
Route::get('/group/{group}', [GroupController::class, 'showgroup']);
Route::get('/group/post/create', [GroupController::class, 'createpost']);
Route::post('/group/post', [GroupController::class, 'storepost']);
Route::get('/group/post/{post}', [GroupController::class, 'showpost']);

Route::get('/event', [EventController::class, 'index']);
Route::get('/event/create', [EventController::class, 'createevent']);
Route::post('/event', [EventController::class, 'storeevent']);
Route::get('/event/{event}', [EventController::class, 'showevent']);
Route::get('/event/post/create', [EventController::class, 'createpost']);
Route::post('/event/post', [EventController::class, 'storepost']);
Route::get('/event/post/{post}', [EventController::class, 'showpost']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
