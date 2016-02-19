<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       		'first_name' => '',
        		'last_name' => 'Guest',
        		'pin' => NULL,
        		'status' => 'active',
        		'team_id' => 1
        ]);
        
       User::create([
       		'first_name' => 'Pan',
        		'last_name' => 'Test',
        		'pin' => 1234,
        		'status' => 'active',
        		'team_id' => 1
        ]);
    }
}
