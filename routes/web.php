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

// Route::get('/', function () {
// 	return redirect()->to('/starwars');
// });

Route::get('/','FrontendController@index');

Route::get('/home', function(){
	return redirect()->to('/starwars/post');
});


// \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//     var_dump($query->sql);
//     var_dump($query->bindings);
//     var_dump($query->time);
// });

	

Route::group(['prefix' => 'starwars' , 'middleware' => 'auth'], function () {	
	Route::resource('/category','CategoryController');	
	Route::resource('/user','UserController');
	Route::resource('/menu','MenuController');
	Route::get('/changepassword/user/{id}','UserController@changePassword');
	Route::post('/changepassword/user/{id}','UserController@updatePassword');
	Route::get('/changemypassword','PasswordController@showChangePasswordForm');
	Route::post('/changemypassword','PasswordController@updateChangePassword');
	Route::resource('/post','PostController');
	Route::resource('/author','AuthorController');

	Route::resource('/article/{post_id}/subcontent','SubContentController');
});

Route::get('/{category}/{id}',function ($category,$id)
{
	dd($category . $id);
});	

Auth::routes();

// Route::post('login', 'Auth\LoginController@login');
// Route::get('login',  'Auth\LoginController@showLoginForm');
// Route::get('logout', 'Auth\LoginController@logout');

// Route::get('/home', 'HomeController@index');
