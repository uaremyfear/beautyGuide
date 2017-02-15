<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();
    	User::truncate();

    	$user = User::create([
    		'name' => 'admin',
    		'email' => 'admin@mail.com',
    		'password' => bcrypt('admin123')
    		]);

    	$roles = Role::all();

    	$user->roles()->sync($roles);
    	
    	User::reguard();
    }
}
