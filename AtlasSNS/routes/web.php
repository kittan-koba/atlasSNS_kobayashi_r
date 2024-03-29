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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

// middleware
Route::get('/', function () {

})->middleware('web');


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// Route::get('/register', function () {
//     session()->put(['username' => $username]);
//     return session()->get('username');
// });

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');
// Route::get('/added', function () {
//     session()->put([]);
// });
Route::get('/logout', 'Auth\LoginController@logout');

//ログイン中のページ
Route::get('/top', 'PostsController@index');
// Route::post('/top','PostsController@index');
// Route::get('/top','PostsController@create');
Route::post('/top', 'PostsController@create');
Route::post('/update', 'PostsController@update');
Route::get('/post/{id}/delete', 'PostsController@delete');

Route::post('/updataprofile', 'UsersController@userprofile');
Route::get('/userprofile', 'UsersController@useredit');
Route::get('/profile/{id}', 'UsersController@profile');

Route::get('/search', 'UsersController@index');
// Route::post('/search','UsersController@search');

Route::get('/follow-list', 'FollowsController@followlist');
Route::get('/follower-list', 'FollowsController@followerlist');

// Route::post('/follow', 'UsersController@follow')->name('follow');
Route::post('users/{id}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');

Route::get('/home', function () {
    return redirect('/top'); // /homeにアクセスされたら/topにリダイレクト
});
