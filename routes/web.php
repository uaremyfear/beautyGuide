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
	return redirect()->to('/gotg');
})->middleware('auth');

Route::get('/home', function(){
	return view('client.index');
});


// \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//     var_dump($query->sql);
//     var_dump($query->bindings);
//     var_dump($query->time);
// });

Route::get('/', 'HomeController@index');
Route::get('/product/{id}','HomeController@showProduct');
Route::get('/shop','HomeController@shop');
Route::get('/about','HomeController@about');
Route::get('/contact','HomeController@contact');


Route::group(['prefix' => 'gotg' , 'middleware' => 'auth'], function () {
	
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
