<?php

use Illuminate\Database\Seeder;
use App\Day;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::unguard();
    	Day::truncate();

    	Day::create([
    		'name' => 'Monday',    		
    		]);

    	Day::create([
    		'name' => 'Thuesday',    		
    		]);

    	Day::create([
    		'name' => 'Wednesday',    		
    		]);

    	Day::create([
    		'name' => 'Thursday',    		
    		]);

    	Day::create([
    		'name' => 'Friday',    		
    		]);

    	Day::create([
    		'name' => 'Saturday',    		
    		]);

    	Day::create([
    		'name' => 'Sunday',    		
    		]);

    	Day::reguard();
    }
}
