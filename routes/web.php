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
    return view('welcome');
});


Route::get('update', function () {
    return view('/post.update');
});

Route::get('message', function () {
    return view('/message.index');
});

Route::get('/todo', ['middleware' => 'auth', function() {
    // 只有認證過的使用者能進來這裡...
}]);
Route::get('post', ['middleware' => 'auth', function() {
    // 只有認證過的使用者能進來這裡...
}]);

Route::post('post','PostController@upload');  

Route::get('todo', 'TodoController@index');
Route::post('todo', 'TodoController@update');
Route::delete('todo/{todo}', 'TodoController@destory');

Route::get('post', 'PostController@index');
//Route::post('post', 'PostController@update');
Route::delete('post/{post}', 'PostController@destory');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('s3-image-upload','PostController@imageUpload');

Route::post('s3-image-upload','PostController@imageUploadPost');

Route::get('update', 'PostController@index2');
Route::put('update/{id}','PostController@updatePost');
//Route::post('update','PostController@updatePost');
Route::post('update','PostController@updatePhoto');
//Route::put('image-update/{id}', 'S3ImageController@updateimage');

Route::get('message', 'MessageController@index');
Route::post('message', 'MessageController@update');
Route::delete('message/{message}', 'MessageController@destory');

