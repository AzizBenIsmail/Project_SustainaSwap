<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PusherController;

Route::get('/', [Controllers\ItemController::class, 'indexmain'])->name('indexmain');
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

Route::get('/chat', 'App\Http\Controllers\PusherController@index')->name('chatIndex');
Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/receive', 'App\Http\Controllers\PusherController@receive');
Route::get('/chat/{message_id}/delete', [Controllers\PusherController::class, 'destroy'])->name('pusher.destroy');
Route::get('/admin/chatAdmin', [Controllers\PusherController::class, 'indexAdmin'])->name('pusher.indexAdmin');
Route::delete('/delete-message/{id}', 'App\Http\Controllers\PusherController@delete')->name('deleteMessage');

Route::get('/admin_chat/create', 'App\Http\Controllers\AdminChatController@create')->name('adminChat.create');
Route::post('/admin_chat/store', 'App\Http\Controllers\AdminChatController@store')->name('adminChat.store');
Route::get('/admin_chat', 'App\Http\Controllers\AdminChatController@index')->name('adminChat.index');
Route::get('/admin_chat/{id}/edit', 'App\Http\Controllers\AdminChatController@edit')->name('adminChat.edit');
Route::put('/admin_chat/{id}/update', 'App\Http\Controllers\AdminChatController@update')->name('adminChat.update');
Route::delete('/admin_chat/{id}/destroy', 'App\Http\Controllers\AdminChatController@destroy')->name('adminChat.destroy');



Route::get('/showmain/{id}', [Controllers\ItemController::class, 'showmain'])->name('showmain');
//Route::resource('/products',Controllers\ItemController::class);

Route::resource('/items', Controllers\ItemController::class);
Route::resource('/admin/itemsAdmin', Controllers\ItemAdminController::class);
Route::get('/admin/itemsAdmin', [Controllers\ItemAdminController::class, 'index'])->name('itemsAdmin.index');
Route::get('/admin/itemsAdmin/create', [Controllers\ItemAdminController::class, 'create'])->name('itemsAdmin.create');
Route::post('/admin/itemsAdmin', [Controllers\ItemAdminController::class, 'store'])->name('itemsAdmin.store');
Route::get('/admin/itemsAdmin/{id}', [Controllers\ItemAdminController::class, 'show'])->name('itemsAdmin.show');
Route::get('/admin/itemsAdmin/{id}/edit', [Controllers\ItemAdminController::class, 'edit'])->name('itemsAdmin.edit');
Route::put('/admin/itemsAdmin/{id}', 'ItemAdminController@update')->name('itemsAdmin.update');
Route::delete('/admin/itemsAdmin/{id}', 'ItemAdminController@destroy')->name('itemsAdmin.destroy');


Route::resource('/admin/tradesAdmin', App\Http\Controllers\AdminTradeController::class);
Route::get('/admin/tradesAdmin', [Controllers\AdminTradeController::class, 'index'])->name('tradesAdmin.index');
Route::get('/admin/tradesAdmin/{id}', [Controllers\AdminTradeController::class, 'show'])->name('tradesAdmin.show');
Route::delete('/admin/tradesAdmin/{id}', 'TradeAdminController@destroy')->name('tradesAdmin.destroy');


Route::resource('Comment', Controllers\CommentController::class);
Route::resource('Complaint', Controllers\ComplaintController::class);
Route::resource('Conversation', Controllers\ConversationController::class);
Route::resource('Message', Controllers\MessageController::class);
Route::resource('Trade', Controllers\TradeController::class);
Route::get('/admin/post', [Controllers\PostController::class, 'allPost'])->name('posts.allPost');
Route::post('/admin/post', [Controllers\PostController::class, 'storeToAdmin'])->name('posts.storeToAdmin');
Route::get('/admin/post/{post}/edit', [Controllers\PostController::class, 'editToAdmin'])->name('posts.editToAdmin');
Route::put('/admin/post/{post}', [Controllers\PostController::class, 'updateToAdmin'])->name('posts.updateToAdmin');

Route::resource('posts', \App\Http\Controllers\PostController::class)->names([
    'index' => 'posts.index',
]);
//Route::get('/posts/create', [Controllers\PostController::class, 'create'])->name('posts.create');
//Route::post('/posts', [Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('posts.show');
Route::delete('/admin/posts/{post}',[Controllers\PostController::class, 'destroyAdmin'])->name('posts.destroyAdmin');

Route::resource('/comments', \App\Http\Controllers\CommentController::class)->names([
    'index' => 'comments.index',
]);
// Show the comment creation form
Route::get('/comments/create', [Controllers\CommentController::class, 'create'])->name('comments.create');

Route::resource('comments', Controllers\CommentController::class);
Route::post('/comments', [Controllers\CommentController::class, 'store'])->name('comments.store');
Route::post('/commentPost', [Controllers\CommentController::class, 'storePost'])->name('comments.storePost');
Route::delete('/commentDelete/{comment}', [Controllers\CommentController::class, 'delete'])->name('comments.delete');
Route::get('/admin/comment', [Controllers\CommentController::class, 'allComment'])->name('comments.allComment');

Route::resource('/trades', Controllers\TradeController::class);
Route::get('/trades/search/{search}', 'App\Http\Controllers\TradeController@search')->name('trades.search');
Route::resource('Post', Controllers\PostController::class);
Route::resource('admin/categories', Controllers\CategoryController::class);
Route::resource('avis', Controllers\AvisController::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
