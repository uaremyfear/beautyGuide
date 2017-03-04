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
	return view('admin.index');
})->middleware('auth');
Route::get('/home', function(){
	return view('client.index');
});
Route::group(['prefix' => 'gotg' , 'middleware' => 'auth'], function () {
	Route::get('/', function () {
		return view('admin.index');
	});
	Route::resource('/category','CategoryController');
	Route::resource('/subcategory','SubcategoryController');
	Route::resource('/product','ProductController');
	Route::resource('/user','UserController');
	Route::get('/changepassword/user/{id}','UserController@changePassword');
	Route::post('/changepassword/user/{id}','UserController@updatePassword');
	Route::get('/changemypassword','PasswordController@showChangePasswordForm');
	Route::post('/changemypassword','PasswordController@updateChangePassword');
});

 Auth::routes();

// Route::post('login', 'Auth\LoginController@login');
// Route::get('login',  'Auth\LoginController@showLoginForm');
// Route::get('logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index');
