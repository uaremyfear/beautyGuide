<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function () {
    static $password;

    return [
        'name' => 'admin',
        'email' => 'admin@mail.com',
        'password' => $password ?: $password = bcrypt('admin123'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function () {
  	
  	return [
        'role_name' => 'super_admin',
        'slug' => 'Super Admin',
        'Description' => 'Super Admin can do anything including create user'        
    ];
});
