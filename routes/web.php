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
	return redirect()->to('/gotg/product');
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
Route::get('/delivery','HomeController@delivery');


Route::group(['prefix' => 'gotg' , 'middleware' => 'auth'], function () {
	
	Route::resource('/category','CategoryController');
	Route::resource('/subcategory','SubcategoryController');
	Route::resource('/product','ProductController');
	Route::resource('/user','UserController');
	Route::resource('/delivery','DeliveryController');
	Route::get('/changepassword/user/{id}','UserController@changePassword');
	Route::post('/changepassword/user/{id}','UserController@updatePassword');
	Route::get('/changemypassword','PasswordController@showChangePasswordForm');
	Route::post('/changemypassword','PasswordController@updateChangePassword');

	Route::get('/feature','FeatureController@showFeature');
	Route::post('/feature','FeatureController@storeFeature');	
	Route::get('/bestseller','FeatureController@showBest');
	Route::post('/bestseller','FeatureController@storeBest');

	Route::get('/banner','FeatureController@editBanner');
	Route::post('/banner','FeatureController@updateBanner');
	
});

 Auth::routes();

// Route::post('login', 'Auth\LoginController@login');
// Route::get('login',  'Auth\LoginController@showLoginForm');
// Route::get('logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index');
