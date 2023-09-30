<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Template component/index');
});
Route::get('/about', function () {
    return view('Template component/about');
});
Route::get('/contact', function () {
    return view('Template component/contact');
});
Route::get('/faq', function () {
    return view('Template component/faq');
});
Route::get('/product-detail', function () {
    return view('Template component/product-detail');
});
Route::get('/sign-in', function () {
    return view('Sign/sign-in');
});
Route::get('/sign-up', function () {
    return view('Sign/sign-up');
});

//Route::resource('/products',Controllers\ItemController::class);
Route::resource('/items', Controllers\ItemController::class);
Route::resource('Comment', Controllers\CommentController::class);
Route::resource('Complaint', Controllers\ComplaintController::class);
Route::resource('Conversation', Controllers\ConversationController::class);
Route::resource('Message', Controllers\MessageController::class);
Route::resource('Trade', Controllers\TradeController::class);
Route::resource('Post', Controllers\PostController::class);
