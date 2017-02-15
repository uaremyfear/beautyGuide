<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::unguard();
    	Role::truncate();

    	Role::create([
    		'role_name' => 'super_admin',
        	'slug' => 'Super Admin',
        	'Description' => 'Super Admin can do anything including create user'  
    		]);

    	Role::create([
    		'role_name' => 'admin',
        	'slug' => 'Admin',
        	'Description' => 'Super Admin can do anything including but cant create user'
    		]);

    	Role::reguard();
    }
}
