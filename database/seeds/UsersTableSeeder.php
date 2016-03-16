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
       		'first_name' => 'Guest',
        		'last_name' => '',
        		'pin' => NULL,
        		'status' => 'active',
        		'team_id' => 1,
        		'customer_id' => 1
        ]);
        
       User::create([
       		'first_name' => 'John',
        		'last_name' => 'Doe',
        		'pin' => '1234',
        		'status' => 'active',
        		'team_id' => 2,
        		'customer_id' => 2
        ]);
        
        User::create([
       		'first_name' => 'Test',
        		'last_name' => 'User',
        		'pin' => '0000',
        		'status' => 'active',
        		'team_id' => 2,
        		'customer_id' => 2
        ]);
        
        User::create([
       		'first_name' => 'Banned',
        		'last_name' => 'User',
        		'pin' => '5555',
        		'status' => 'inactive',
        		'team_id' => 1,
        		'customer_id' => 1
        ]);
    }
}
