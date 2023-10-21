<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PusherController;


### Start Guest Routes ###

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
### End Guest Routes ###

Route::get('/chat', 'App\Http\Controllers\PusherController@index');
Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/receive', 'App\Http\Controllers\PusherController@receive');
Route::get('/chat/{message}/delete', [Controllers\PusherController::class, 'destroy'])->name('pusher.index');
Route::get('/showmain/{id}', [Controllers\ItemController::class, 'showmain'])->name('showmain');
//Route::resource('/products',Controllers\ItemController::class);

//Route::resource('/items', Controllers\ItemController::class);
Route::get('/items', [Controllers\ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [Controllers\ItemController::class, 'create'])->name('items.create');
Route::post('/items', [Controllers\ItemController::class,'store'])->name('items.store');
Route::get('/items/{item}', [Controllers\ItemController::class,'show'])->name('items.show');
Route::get('/items/{item}/edit', [Controllers\ItemController::class,'edit'])->name('items.edit');
Route::put('/items/{item}', [Controllers\ItemController::class,'update'])->name('items.update');
Route::delete('/items/{item}', [Controllers\ItemController::class,'destroy'])->name('items.destroy');
Route::get('/items/main', [Controllers\ItemController::class,'indexmain'])->name('items.indexmain');
Route::get('/items/{id}/showmain',[Controllers\ItemController::class,'showmain'])->name('items.showmain');

//Route::resource('/admin/itemsAdmin', Controllers\ItemAdminController::class);
Route::get('/admin/itemsAdmin', [Controllers\ItemAdminController::class, 'index'])->name('itemsAdmin.index');
Route::get('/admin/itemsAdmin/create', [Controllers\ItemAdminController::class, 'create'])->name('itemsAdmin.create');
Route::post('/admin/itemsAdmin', [Controllers\ItemAdminController::class, 'store'])->name('itemsAdmin.store');
Route::get('/admin/itemsAdmin/{id}', [Controllers\ItemAdminController::class, 'show'])->name('itemsAdmin.show');
Route::get('/admin/itemsAdmin/{id}/edit', [Controllers\ItemAdminController::class, 'edit'])->name('itemsAdmin.edit');
Route::put('/admin/itemsAdmin/{id}', [Controllers\ItemAdminController::class, 'update'])->name('itemsAdmin.update');
Route::delete('/admin/itemsAdmin/{id}', 'ItemAdminController@destroy')->name('itemsAdmin.destroy');
Route::resource('/admin/tradesAdmin', App\Http\Controllers\AdminTradeController::class);
Route::get('/admin/tradesAdmin', [Controllers\AdminTradeController::class, 'index'])->name('tradesAdmin.index');
//Route::get('/admin/tradesAdmin/{id}', [Controllers\AdminTradeController::class, 'show'])->name('tradesAdmin.show');
//Route::delete('/admin/tradesAdmin/{id}', 'TradeAdminController@destroy')->name('tradesAdmin.destroy');


Route::resource('Comment', Controllers\CommentController::class);
//Route::resource('Complaint', Controllers\ComplaintsController::class);
Route::resource('Conversation', Controllers\ConversationController::class);
Route::resource('Message', Controllers\MessageController::class);
Route::resource('Trade', Controllers\TradeController::class);


Route::get('/posts/create', [Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [Controllers\PostController::class, 'store'])->name('posts.store');

Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('posts.show');



### Start Admin Routes ###
// The Prefix is added after login based on user role - Auth LoginController
Route::group(['prefix'=>'admin','middleware'=>['admin','auth']], function(){
    //dashboard
    Route::get('/', [Controllers\AdminController::class,'index'])->name('admin-dashboard');;
//Complaints routes
Route::get('/complaints', [Controllers\ComplaintsController::class, 'index'])->name('complaints.index');
Route::post('/complaints', [Controllers\ComplaintsController::class, 'store'])->name('complaints.store');
Route::put('/complaints/{complaint}', [Controllers\ComplaintsController::class, 'update'])->name('complaints.update');
Route::delete('/complaints/{complaintId}', [Controllers\ComplaintsController::class, 'destroy'])->name('complaints.delete');


Route::get('/post', [Controllers\PostController::class, 'allPost'])->name('posts.allPost');
Route::post('/post', [Controllers\PostController::class, 'storeToAdmin'])->name('posts.storeToAdmin');
Route::get('/post/{post}/edit', [Controllers\PostController::class, 'editToAdmin'])->name('posts.editToAdmin');
Route::put('/post/{post}', [Controllers\PostController::class, 'updateToAdmin'])->name('posts.updateToAdmin');
Route::delete('/posts/{post}',[Controllers\PostController::class, 'destroyAdmin'])->name('posts.destroyAdmin');

Route::delete('/commentDelete/{comment}', [Controllers\CommentController::class, 'destroyByAdmin'])->name('comments.destroyByAdmin');
Route::post('/comments', [Controllers\CommentController::class, 'storeFromAdmin'])->name('comments.storeFromAdmin');
Route::get('/comment/{comment}/edit', [Controllers\CommentController::class, 'editFromAdmin'])->name('comments.editFromAdmin');
Route::put('/comment/{comment}', [Controllers\CommentController::class, 'updateFromAdmin'])->name('comments.updateFromAdmin');
Route::get('/comment', [Controllers\CommentController::class, 'allComment'])->name('comments.allComment');


});
### End Admin Routes ###

Route::resource('posts', \App\Http\Controllers\PostController::class)->names([
    'index' => 'posts.index',
]);

// Route::resource('/comments', \App\Http\Controllers\CommentController::class)->names([
//     'index' => 'comments.index',
// ]);
// Show the comment creation form
Route::get('/comments/create', [Controllers\CommentController::class, 'create'])->name('comments.create');

Route::resource('comments', Controllers\CommentController::class);
Route::post('/comments', [Controllers\CommentController::class, 'store'])->name('comments.store');
Route::post('/commentPost', [Controllers\CommentController::class, 'storePost'])->name('comments.storePost');
Route::delete('/commentDelete/{comment}', [Controllers\CommentController::class, 'delete'])->name('comments.delete');

Route::delete('/commentDelete/{comment}', [Controllers\CommentController::class, 'delete'])->name('comments.delete');




Route::resource('/trades', Controllers\TradeController::class);
Route::get('/trades/search/{search}', 'App\Http\Controllers\TradeController@search')->name('trades.search');
Route::get('/calendar', [Controllers\TradeController::class, 'calendar'])->name('trades.calendar');


Route::resource('admin/categories', Controllers\CategoryController::class);
Route::resource('avis', Controllers\AvisController::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


