<?php

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
    return view('Home');
});
//Route::get('/','HomeController@index');//根路由指向师徒home.blade.php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//添加
Route::resource('post','PostController');

Route::resource('jobinfo','JobinfoController');

Route::resource('book','BookController');

Route::resource('comment','CommentController');

Route::resource('users', 'UsersController');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

Route::get('book/addToWishList/{bookId}', ['uses' => 'BookController@addBookToWishList', 'as' => 'books.add_to_wish_list']);

Route::get('releasedBook/addToWishList/{bookId}', ['uses' => 'BookController@addReleasedBookToWishList', 'as' => 'released_books.add_to_wish_list']);

Route::any('internship/index',['uses'=>'InternshipController@index']);
Route::any('internship/create',['uses'=>'InternshipController@create']);
Route::any('internship/mycreate',['uses'=>'InternshipController@mycreate']);
Route::post('internship/save',['uses'=>'InternshipController@save']);
Route::any('internship/update/{id}',['uses'=>'InternshipController@update']);
Route::any('internship/detail/{id}',['uses'=>'InternshipController@detail']);
Route::any('internship/destroy/{id}',['uses'=>'InternshipController@destroy']);